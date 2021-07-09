<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {


	function __construct(){
		parent::__construct();
	}

	public function index()
	{
		// $session = $this->session->userdata('id');
		// print_r($session);die();
		
		if($this->input->get('key')!= null ){
			$this->db->like('nama_produk',$this->input->get('key'));
		}
		
		$this->db->where('id_merk',1);
		$data['toyota']=$this->db->get('kendaraan')->result();

		$this->db->where('id_merk',2);
		$data['daihatsu']=$this->db->get('kendaraan')->result();

		$this->db->where('id_merk',3);
		$data['honda']=$this->db->get('kendaraan')->result();

		$this->db->where('id_merk',4);
		$data['nissan']=$this->db->get('kendaraan')->result();

		$this->db->join("merk","kendaraan.id_merk = merk.id");
		$data["kendaraan"]=$this->db->get('kendaraan')->result();

		$data["merk"]=$this->db->get("merk")->result();
		
		// $this->db->limit(8);
		// $this->db->order_by ('id_produk','desc');
		// $this->db->join('merk','kendaraan.id_merk = merk.id');
		// $data['pro']=$this->db->get('produk');
		$this->load->view('front/v_index',$data);
	}
	
	public function contactus ()
	{
		if ($_POST){
			$this->db->insert('komentar',$_POST);
			redirect (base_url('index/contactus/'));
		}
		else{
		$this->load->view("user/contactus");
		}
	}

	public function addcart()
	{
		$row = $this->db->get_where("kendaraan",array('id_kendaraan'=>$this->input->post('id')))->row();
		//print_r($row);die();
		$data=array(
			'id'=>$this->input->post('id'),
			'qty'=>$this->input->post('jumlah'),
			'price'=>$row->harga,
			'name'=>$row->nama_produk,
			'options'=>array('keterangan'=>$this->input->post('keterangan'),
							'keterangan_minus'=>$this->input->post('keterangan_minus'),
							'besar_minus'=>$this->input->post('besar_minus'),
							'image'=>$row->gambar
							)
		);
		
		$this->cart->insert($data);
		redirect(base_url('index/order'));
		//print_r($this->cart->contents());die();
	}
	
	public function pesan()
	{
		// if($this->input->post()){
		if($_POST){
			$kendaraan = $this->db->get_where("kendaraan",array('id'=>$this->input->post('id')))->row();
			$row = $this->input->post('id',true);
			// print_r($row);die();

			$jam_mulai = $this->input->post('jam_mulai',true);
			$tgl_mulai = $this->input->post('tgl_mulai',true).$jam_mulai;
			$tgl_akhir = $this->input->post('tgl_akhir',true).$jam_mulai;

			// menghitung waktu sewa
			$diff = abs($tgl_akhir-$tgl_mulai);
			$years = floor($diff / (365*60*60*24));
			$months = floor(($diff - $years * 365*60*60*24)
	                               / (30*60*60*24));
			$days = floor(($diff - $years * 365*60*60*24 - 
	             $months*30*60*60*24)/ (60*60*24));
			$hours = floor(($diff - $years * 365*60*60*24 
	       - $months*30*60*60*24 - $days*60*60*24)
	                                   / (60*60));
			$minutes = floor(($diff - $years * 365*60*60*24 
	         - $months*30*60*60*24 - $days*60*60*24 
	                          - $hours*60*60)/ 60);
			// akhir menghitung waktu sewa

			$layanan = $this->input->post('layanan');

			if ($layanan == "Dengan Driver") {
				$harga_layanan = $kendaraan->harga_include_driver;
			} else{
				$harga_layanan = $kendaraan->harga_exclude_driver;
			}

			$kode_booking = date('Ymd').(rand(001,999));
			$data=array(
				'kode_booking'=>$kode_booking,
				'tgl_transaksi'=>date('Y-m-d H:i:s'),
				'harga_layanan'=>$harga_layanan,
				'layanan'=>$layanan,
				'tgl_mulai'=>$tgl_mulai,
				'tgl_akhir'=>$tgl_akhir,
				'jam_mulai'=>$jam_mulai,
			);
			
			$this->db->insert('transaksi',$data);
			// print_r($this->cart->contents());die();
			redirect(base_url('index/order'));
		}	
		// } else{
		// 	echo "Error";
		// }
		
	}
	
	public function destroy() {
		$this->cart->destroy();
		redirect (base_url('index/product'));
	}
	
	public function order() {
		if(!$this->session->userdata('login_user')){
			redirect(base_url('login'));
		}
		//print_r ($this->cart->contents());
		if($_POST){
			// $this->db->insert('pembeli',$_POST);
			$this->db->insert('transaksi',array(
				'id_pembeli' =>$this->input->post('id_pembeli'),
				'id_kota'	 =>$this->input->post('id_kota'),
				'alamat' 	 =>$this->input->post('alamat')
			));
			
			//insert_id untuk mengambil id yang baru dilempar
			$id_transaksi=$this->db->insert_id();
			
			$berto=0; $harto=0;
			foreach ($this->cart->contents() as $items):
			$this->db->insert('transaksi_detail',array(
				//tanda -> menunjukkan OOP dan tanda => digunakan untuk memasukkan sebuah nilai ke OOP.
				'id_transaksi'=>$id_transaksi,
				'id_produk'=>$items['id'],
				'harga'=> $items['price'],
				'keterangan_minus'=> $items['options']['keterangan_minus'],
				'besar_minus'=> $items['options']['besar_minus'],
				'jumlah_produk'=> $items['qty'],
				'harga_total'=> ($items['price'] * $items['qty']),
				// 'berat_total'=> ($items['options']['berat'] * $items ['qty']),
				'keterangan'=> $items['options']['keterangan']
			));
			
				$berto=($berto + ($items['qty'] * $items['options']['berat']));
				$harto=($harto + ($items['qty'] * $items['price']));
				
			//hapus isi session ketika data masuk ke dalam database
			$data = array(
				'rowid' => $items['rowid'],
				'qty' => 0
				);
			$this->cart->update($data);
			endforeach;
			
			$row = $this->db->get_where("kota",array('id_kota'=>$this->input->post('id_kota')))->row();
			$this->db->where('id_transaksi',$id_transaksi);
			$this->db->update('transaksi',array(
				'total_bayar'=>$harto + ($row->harga * round($berto))));
				
			redirect('index/invoice/'.$id_transaksi);
		}
		else{
			$data['city']=$this->db->get('kota');
			$this->load->view('front/v_checkout',$data);
		}	
	}
		public function hapus(){
			$id=$this->input->post('id',true);
			$data = array(
					'rowid' => $id,
					'qty' => 0
					);
				$this->cart->update($data);
				redirect(base_url('index/order'));
	}
	public function invoice($id){
			$this->db->join('pembeli','transaksi.id_pembeli=pembeli.id_pembeli');
			$data['pembeli']=$this->db->get_where('transaksi',array('id_transaksi'=>$id))->row();
			$this->db->join('transaksi_detail','transaksi_detail.id_produk=produk.id_produk');
			$data['produk']=$this->db->get_where('produk',array('transaksi_detail.id_transaksi'=>$id));
			$this->db->join('transaksi','transaksi.id_kota=kota.id_kota');
			$data['kota']=$this->db->get_where('kota',array('transaksi.id_transaksi'=>$id))->row();
			$this->load->view("front/v_invoice",$data);
	}

	public function pesanan(){

			$data['konfirmasi'] = $this->db->get('konfirmasi');

			$pembeli = $this->session->userdata('id_pembeli');

			$this->db->order_by('id_transaksi','desc');
			$this->db->join('konfirmasi','konfirmasi.id_transaksii = transaksi.id_transaksi','LEFT');
			$this->db->where('id_pembeli',$pembeli);
			$data['pesanan']=$this->db->get('transaksi');
			$this->load->view("front/v_pesanan",$data);
	}

	public function registrasi()
	{	
		if ($this->input->post()) { #Check post data available
        $data = array(
				'nama'  	=> $this->input->post('nama',true),
				'email' 	=> $this->input->post('email',true),
				'password' 	=> $this->input->post('password',true),
				'no_telpon' => $this->input->post('no_telpon',true),
				'alamat'   => $this->input->post('alamat',true)	
				);
		$this->db->insert('user',$data);
		$this->session->set_flashdata('info', "<script>alert('Registrasi berhasil');</script>");
		redirect(base_url('login'));

    	}else{
		$data['city']=$this->db->get('kota');
		$this->load->view('front/v_registrasi',$data);
		}
	}

	public function saveregistrasi()
	{
		
	}
	
		
}