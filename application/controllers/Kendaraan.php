<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kendaraan extends CI_Controller {


	function __construct(){
		parent::__construct();
	}

	public function index()
	{
		if($this->input->get('key')!= null ){
			$this->db->or_like('type',$this->input->get('key'));
			$this->db->or_like('nama',$this->input->get('key'));
		}
		

		$this->db->select('kendaraan.type, kendaraan.deskripsi, kendaraan.transmisi, kendaraan.bahan_bakar, kendaraan.kategori_plat, kendaraan.jumlah_kursi, kendaraan.id as id_kendaraan, kendaraan.file, kendaraan.harga_include_driver, kendaraan.harga_exclude_driver, merk.nama as nama_merk');
		$this->db->join('merk','merk.id = kendaraan.id_merk',"LEFT");
		$data['kendaraan']=$this->db->get('kendaraan')->result();

		$data['merk'] = $this->db->get('merk')->result();

		$this->load->view('front/v_searching',$data);
	}

	public function detail($id)
	{
		if($_POST){
			$kendaraan = $this->db->get_where("kendaraan",array('id'=>$this->input->post('id_kendaraan')))->row();
			$row = $this->input->post('id_kendaraan',true);
			// print_r($row);die();

			$tgl_mulai = $this->input->post('tgl_mulai',true);
			$tgl_akhir = $this->input->post('tgl_akhir',true);

			$jam_mulai = $this->input->post('jam_mulai',true);
			$tgl_1 = strtotime("$tgl_mulai"." "."$jam_mulai");
			$tgl_2 = strtotime("$tgl_akhir"." "."$jam_mulai");

			// menghitung waktu sewa
			$diff = abs($tgl_2-$tgl_1);
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

			// print_r($days);die();

			$layanan = $this->input->post('layanan');

			if ($layanan == "Dengan Driver") {
				$harga_layanan = $kendaraan->harga_include_driver;
			} else{
				$harga_layanan = $kendaraan->harga_exclude_driver;
			}

			$kode_booking = date('Ymd').(rand(001,999));
			$data=array(
				'id_kendaraan'=>$this->input->post('id_kendaraan'),
				'kode_booking'=>$kode_booking,
				'tgl_transaksi'=>date('Y-m-d H:i:s'),
				'harga_layanan'=>$harga_layanan,
				'total_bayar'=>$harga_layanan * $days,
				'layanan'=>$layanan,
				'tgl_mulai'=>$tgl_mulai,
				'tgl_akhir'=>$tgl_akhir,
				'jam_mulai'=>$jam_mulai,
			);
			
			$this->db->insert('transaksi',$data);
			// print_r($this->cart->contents());die();
			redirect(base_url('kendaraan/order'));
		} else {
		$this->db->select('kendaraan.type, kendaraan.deskripsi, kendaraan.transmisi, kendaraan.bahan_bakar, kendaraan.kategori_plat, kendaraan.jumlah_kursi, kendaraan.id as id_kendaraan, kendaraan.file, kendaraan.harga_include_driver, kendaraan.harga_exclude_driver, merk.nama as nama_merk');
		$this->db->join('merk','kendaraan.id_merk = merk.id');
		$data["detail"] = $this->db->get_where('kendaraan',array ('kendaraan.id'=>$id))->row();

		$this->load->view('front/v_detail',$data);
		}
	}

	public function booking($id)
	{	
		if(!$this->session->userdata('login_user')){
			redirect(base_url('login'));
		}

		$kode_unik = rand(001,999);
		

		if($_POST){

			$kendaraan = $this->db->get_where("kendaraan",array('id'=>$this->input->post('id_kendaraan')))->row();
			$row = $this->input->post('id_kendaraan',true);
			// print_r($row);die();

			$tgl_mulai = $this->input->get('tgl_mulai',true);
			$tgl_akhir = $this->input->get('tgl_akhir',true);

			$jam_mulai = $this->input->post('jam_mulai',true);
			$tgl_1 = strtotime("$tgl_mulai"." "."$jam_mulai");
			$tgl_2 = strtotime("$tgl_akhir"." "."$jam_mulai");

			// menghitung waktu sewa
			$diff = abs($tgl_2-$tgl_1);
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

			// print_r($days);die();

			$layanan = $this->input->post('layanan');

			if ($layanan == "Dengan Driver") {
				$harga_layanan = $kendaraan->harga_include_driver;
			} else{
				$harga_layanan = $kendaraan->harga_exclude_driver;
			}

			$kode_booking = date('Ymd').(rand(001,999));
			$data=array(
				// 'id'=>$id_transaksi,
				'id_kendaraan'=>$this->input->post('id_kendaraan'),
				'id_user'=>$this->session->userdata('id_user'),
				'kode_booking'=>$kode_booking,
				'tgl_transaksi'=>date('Y-m-d H:i:s'),
				'harga_layanan'=>$harga_layanan,
				'total_bayar'=>($harga_layanan * $days)+$kode_unik,
				'layanan'=>$layanan,
				'tgl_mulai'=>$tgl_mulai,
				'tgl_akhir'=>$tgl_akhir,
				'jam_mulai'=>$jam_mulai,
				'jumlah_hari'=>$days,
				'bank_tujuan'=>$this->input->post('bank'),
				'status_pembayaran'=>"Menunggu Pembayaran",
				'status_booking'=>"Pending"
			);
			
			$this->db->insert('transaksi',$data);
			$id_transaksi=$this->db->insert_id();
			// var_dump($id_transaksi);die();
			// print_r($this->cart->contents());die();
			redirect(base_url('pesanan/invoice/'.$id_transaksi));
		} else {

		$tgl_mulai = $this->input->get('tgl_mulai',true);
		$tgl_akhir = $this->input->get('tgl_akhir',true);

		$jam_mulai = $this->input->post('jam_mulai',true);
		$tgl_1 = strtotime("$tgl_mulai"." "."$jam_mulai");
		$tgl_2 = strtotime("$tgl_akhir"." "."$jam_mulai");

		// menghitung waktu sewa
		$diff = abs($tgl_2-$tgl_1);
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

		$data['jumlah_hari'] = $days;
		$data['kode_unik'] = $kode_unik;

		$data['tgl_mulai'] = $this->input->get('tgl_mulai',true)." ".$this->input->get('jam_mulai',true);
		$data['tgl_akhir'] = $this->input->get('tgl_akhir',true)." ".$this->input->get('jam_mulai',true);
		$data['jam_mulai'] = $this->input->get('jam_mulai',true);

		$this->db->select('kendaraan.type, kendaraan.deskripsi, kendaraan.transmisi, kendaraan.bahan_bakar, kendaraan.kategori_plat, kendaraan.jumlah_kursi, kendaraan.id as id_kendaraan, kendaraan.file, kendaraan.harga_include_driver, kendaraan.harga_exclude_driver, merk.nama as nama_merk');
		$this->db->join('merk','kendaraan.id_merk = merk.id');
		$data["detail"] = $this->db->get_where('kendaraan',array ('kendaraan.id'=>$id))->row();

		$this->load->view('front/v_booking',$data);
		}
	}

	public function cari(){
		if(!$this->session->userdata('login_user')){
			redirect(base_url('login'));
		}
		
		if($_GET){			
			$data['params']   = $_SERVER['QUERY_STRING'];
			$data['merk'] = $this->db->get('merk')->result();

			$tgl_mulai = $this->input->get('tgl_mulai',true);
			$tgl_akhir = $this->input->get('tgl_akhir',true);
		
			// ambil semua mobil yang sudah dibooking di tanggal yang dipilih
			$this->db->select('id_kendaraan')
					->from('transaksi')
					->where("tgl_mulai <= '$tgl_akhir' and tgl_mulai <= '$tgl_akhir'")
				  	->where("tgl_akhir >= '$tgl_mulai' and tgl_akhir >= '$tgl_mulai'")
				    // ->where('tgl_akhir <=', $tgl_mulai)
				    // ->where('tgl_akhir >=', $tgl_akhir)
					// ->where('tgl_mulai between "'.$tgl_mulai.'" and "'.$tgl_akhir.'"')
					// ->where('tgl_akhir between "'.$tgl_mulai.'" and "'.$tgl_akhir.'"')
				    ->where_not_in('status_pembayaran',"Batal");
					$where_clause = $this->db->get_compiled_select();
			// akhir ambil semua mobil yang sudah dibooking di tanggal yang dipilih		

			// filter data mobil yang tersedia pada tanggal yang dipilih 
			$this->db->select('kendaraan.type, kendaraan.deskripsi, kendaraan.transmisi, kendaraan.bahan_bakar, kendaraan.kategori_plat, kendaraan.jumlah_kursi, kendaraan.id as id_kendaraan, kendaraan.file, kendaraan.harga_include_driver, kendaraan.harga_exclude_driver, merk.nama as nama_merk');
			$this->db->join('merk','merk.id = kendaraan.id_merk',"LEFT");
			$this->db->where("kendaraan.id NOT IN ($where_clause)", NULL, FALSE);
			$data['kendaraan']=$this->db->get('kendaraan')->result();
			// akhir filter data mobil yang tersedia pada tanggal yang dipilih

			$this->load->view('front/v_hasil_pencarian',$data);

		} else {
			$data['id_user'] = $this->session->userdata('id');
			$this->load->view('front/v_pencarian',$data);
		}
	}

	public function cari_by_merk(){
		if($_GET){			
			$data['params']   = $_SERVER['QUERY_STRING'];
			$data['merk'] = $this->db->get('merk')->result();

			$tgl_mulai = $this->input->get('tgl_mulai',true);
			$tgl_akhir = $this->input->get('tgl_akhir',true);
			$merk = $this->input->get('merk');
			// print_r($merk);die();
		
			// ambil semua mobil yang sudah dibooking di tanggal yang dipilih
			$this->db->select('id_kendaraan')
					->from('transaksi')
					->where("tgl_mulai <= '$tgl_akhir' and tgl_mulai <= '$tgl_akhir'")
				  	->where("tgl_akhir >= '$tgl_mulai' and tgl_akhir >= '$tgl_mulai'")
				    // ->where('tgl_akhir <=', $tgl_mulai)
				    // ->where('tgl_akhir >=', $tgl_akhir)
					// ->where('tgl_mulai between "'.$tgl_mulai.'" and "'.$tgl_akhir.'"')
					// ->where('tgl_akhir between "'.$tgl_mulai.'" and "'.$tgl_akhir.'"')
				    ->where_not_in('status_pembayaran',"Batal");
					$where_clause = $this->db->get_compiled_select();
			// akhir ambil semua mobil yang sudah dibooking di tanggal yang dipilih		

			// filter data mobil yang tersedia pada tanggal yang dipilih 
			$this->db->select('kendaraan.type, kendaraan.deskripsi, kendaraan.transmisi, kendaraan.bahan_bakar, kendaraan.kategori_plat, kendaraan.jumlah_kursi, kendaraan.id as id_kendaraan, kendaraan.file, kendaraan.harga_include_driver, kendaraan.harga_exclude_driver, merk.nama as nama_merk');
			$this->db->join('merk','merk.id = kendaraan.id_merk',"LEFT");
			$this->db->where("kendaraan.id NOT IN ($where_clause)", NULL, FALSE);
			$this->db->where('kendaraan.id_merk', $merk);
			$data['kendaraan']=$this->db->get('kendaraan')->result();
			// akhir filter data mobil yang tersedia pada tanggal yang dipilih

			$this->load->view('front/v_hasil_pencarian',$data);

		} else {
			$data['id_user'] = $this->session->userdata('id');
			$this->load->view('front/v_pencarian',$data);
		}
	}

	public function merk($id){

			$data['merk'] = $this->db->get('merk')->result();

			$this->db->select('kendaraan.type, kendaraan.deskripsi, kendaraan.transmisi, kendaraan.bahan_bakar, kendaraan.kategori_plat, kendaraan.jumlah_kursi, kendaraan.id as id_kendaraan, kendaraan.file, kendaraan.harga_include_driver, kendaraan.harga_exclude_driver, merk.nama as nama_merk');
			$this->db->join('merk','merk.id = kendaraan.id_merk',"LEFT");
			$this->db->where('kendaraan.id_merk', $id);
			$data['kendaraan']=$this->db->get('kendaraan')->result();

			$this->load->view('front/v_searching',$data);
	}

	public function order($id) {
		if(!$this->session->userdata('login_user')){
			redirect(base_url('login'));
		}
		//print_r ($this->cart->contents());
		if($_POST){
			// $this->db->insert('pembeli',$_POST);
			$this->db->insert('transaksi',array(
				'id_user' =>$this->input->post('id_user'),
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
			// $this->db->get('transaksi');
			$this->load->view('front/v_checkout',$data);
		}	
	}

	public function pesanan(){

			$data['konfirmasi'] = $this->db->get('konfirmasi');

			$id_user = $this->session->userdata('id_user');

			$this->db->select('transaksi.id as id_transaksi, transaksi.kode_booking, transaksi.status_pembayaran, transaksi.tgl_konfirmasi, transaksi.tgl_transaksi, transaksi.total_bayar');
			$this->db->order_by('transaksi.id','desc');
			$this->db->join('konfirmasi','konfirmasi.id_transaksii = transaksi.id','LEFT');
			$this->db->where('id_user',$id_user);
			$data['pesanan']=$this->db->get('transaksi')->result();
			$this->load->view("front/v_pesanan",$data);
	}

		
}