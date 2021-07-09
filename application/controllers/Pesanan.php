<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {


	function __construct(){
		parent::__construct();
	}

	public function index(){

			$data['konfirmasi'] = $this->db->get('konfirmasi');

			$id_user = $this->session->userdata('id_user');

			$this->db->select('transaksi.id as id_transaksi, transaksi.kode_booking, transaksi.status_pembayaran, transaksi.tgl_konfirmasi, transaksi.tgl_transaksi, transaksi.total_bayar, transaksi.tgl_mulai, transaksi.tgl_akhir, transaksi.jam_mulai');
			$this->db->order_by('transaksi.id','desc');
			$this->db->join('konfirmasi','konfirmasi.id_transaksii = transaksi.id','LEFT');
			$this->db->where('id_user',$id_user);
			$data['pesanan']=$this->db->get('transaksi')->result();
			$this->load->view("front/v_pesanan",$data);
	}

	public function invoice($id){

			$this->db->select('kendaraan.type, merk.nama as nama_merk, transaksi.tgl_mulai, transaksi.tgl_akhir, transaksi.jumlah_hari, transaksi.total_bayar, transaksi.harga_layanan, transaksi.status_pembayaran, transaksi.kode_booking, kendaraan.file, transaksi.id as id_transaksi, kendaraan.transmisi, kendaraan.bahan_bakar, kendaraan.jumlah_kursi, kendaraan.kategori_plat, transaksi.layanan, transaksi.jam_mulai, transaksi.bank_tujuan');
			$this->db->join('kendaraan','transaksi.id_kendaraan = kendaraan.id');
			$this->db->join('merk','merk.id = kendaraan.id_merk');
			$data['row']=$this->db->get_where('transaksi',array('transaksi.id'=>$id))->row();

			$this->load->view("front/v_invoice",$data);
	}
	
		
}