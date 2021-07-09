<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfirmasi extends CI_Controller {


	function __construct(){
		parent::__construct();
	}

	public function index($id=null)
	{
		// $this->db->where('id_transaksi',$id);
		$data['row'] = $this->db->get_where('transaksi',array('id'=>$id))->row();

		// $data['transaksi'] = $this->db->get_where('transaksi',array('id_transaksi'=>$id))->row();


		if ($_POST){
			$data = array(
				'tgl_konfirmasi'  	=> $this->input->post('tgl_konfirmasi'),
				'bank_tujuan'		=> $this->input->post('bank_tujuan'),
				'status_pembayaran'		=> "Verifikasi Pembayaran",
				);

			$this->db->where('id', $id);
			$this->db->update('transaksi', $data);
			redirect (base_url('pesanan'));
		} else {
			$this->load->view('front/v_konfirmasi',$data);
		}
	}	
		
}