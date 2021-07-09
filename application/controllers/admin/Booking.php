<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller
{   
    private $dirview = 'booking';
    private $url = 'booking';
    
    function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('login_admin'))
            redirect(base_url('admin/login'));
    }

    public function index(){

        $judul_1 = 'Booking';
        $judul_2 = 'Data';
        $menu = $this->Menus->generateMenu();

        $this->db->select('transaksi.id as id_transaksi, kendaraan.type, transaksi.id_user, user.nama as nama_user, kendaraan.id as id_kendaraan, merk.nama as nama_merk, transaksi.harga_layanan, transaksi.layanan, transaksi.tgl_mulai, transaksi.tgl_akhir, transaksi.tgl_transaksi, transaksi.jam_mulai, transaksi.jumlah_hari, transaksi.total_bayar, transaksi.status_pembayaran, transaksi.status_booking, transaksi.bank_tujuan, transaksi.tgl_konfirmasi, transaksi.kode_booking, user.status_verifikasi');
        $this->db->order_by('transaksi.id','DESC');
        $this->db->join('kendaraan','kendaraan.id = transaksi.id_kendaraan');
        $this->db->join('merk','merk.id = kendaraan.id_merk');
        $this->db->join('user','user.id = transaksi.id_user');
        $data = $this->db->get('transaksi')->result();

        $this->load->view('admin/'.$this->dirview.'/v_index',array(
            'data'=>$data,
            'menu'=>$menu,
            'judul_1'=>$judul_1,
            // 'judul_2'=>$judul_2,
        ));
    }

    public function update($id){

        $judul_1 = 'Update Booking';
        $judul_2 = 'Data';
        $menu = $this->Menus->generateMenu();

        if ($_POST) {
            $data = array(
                'status_pembayaran'=> $this->input->post('status_pembayaran'),
            );

            $this->db->where('id',$id);
            $this->db->update('transaksi',$data);
            redirect(base_url('admin/booking'));
        } else{
            
            $this->db->select('kendaraan.plat_nomor, transaksi.id as id_transaksi, kendaraan.type, user.nama as nama_user, kendaraan.id as id_kendaraan, merk.nama as nama_merk, transaksi.harga_layanan, transaksi.layanan, transaksi.tgl_mulai, transaksi.tgl_akhir, transaksi.tgl_transaksi, transaksi.jam_mulai, transaksi.jumlah_hari, transaksi.total_bayar, transaksi.status_pembayaran, transaksi.status_booking, transaksi.bank_tujuan, transaksi.tgl_konfirmasi, transaksi.kode_booking');
            $this->db->join('kendaraan','kendaraan.id = transaksi.id_kendaraan');
            $this->db->join('merk','merk.id = kendaraan.id_merk');
            $this->db->join('user','user.id = transaksi.id_user');
            $this->db->where('transaksi.id',$id);
            $row = $this->db->get('transaksi')->row();

            $this->load->view('admin/'.$this->dirview.'/v_update',array(
                'row'=>$row,
                'menu'=>$menu,
                'judul_1'=>$judul_1,
                // 'judul_2'=>$judul_2,
            ));
        }
    }

    public function detail($id){

        $judul_1 = 'Detail Booking';
        $judul_2 = 'Data';
        $menu = $this->Menus->generateMenu();

        $this->db->select('kendaraan.plat_nomor, transaksi.id as id_transaksi, kendaraan.type, user.nama as nama_user, kendaraan.id as id_kendaraan, merk.nama as nama_merk, transaksi.harga_layanan, transaksi.layanan, transaksi.tgl_mulai, transaksi.tgl_akhir, transaksi.tgl_transaksi, transaksi.jam_mulai, transaksi.jumlah_hari, transaksi.total_bayar, transaksi.status_pembayaran, transaksi.status_booking, transaksi.bank_tujuan, transaksi.tgl_konfirmasi, transaksi.kode_booking');
        $this->db->join('kendaraan','kendaraan.id = transaksi.id_kendaraan');
        $this->db->join('merk','merk.id = kendaraan.id_merk');
        $this->db->join('user','user.id = transaksi.id_user');
        $this->db->where('transaksi.id',$id);
        $row = $this->db->get('transaksi')->row();

        $this->load->view('admin/'.$this->dirview.'/v_detail',array(
            'row'=>$row,
            'menu'=>$menu,
            'judul_1'=>$judul_1,
            // 'judul_2'=>$judul_2,
        ));
    }
}