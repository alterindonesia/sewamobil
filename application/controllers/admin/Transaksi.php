<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller
{   
    private $dirview = 'transaksi';
    private $url = 'transaksi';
    
    function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('login_admin'))
            redirect(base_url('admin/login'));
    }

    public function index(){

        $judul_1 = 'Transaksi';
        $judul_2 = 'Data';
        $menu = $this->Menus->generateMenu();

        $this->db->select('transaksi.id as id_transaksi, kendaraan.type, user.nama as nama_user, kendaraan.id as id_kendaraan, merk.nama as nama_merk, transaksi.harga_layanan, transaksi.layanan, transaksi.tgl_mulai, transaksi.tgl_akhir, transaksi.tgl_transaksi, transaksi.jam_mulai, transaksi.jumlah_hari, transaksi.total_bayar, transaksi.status_pembayaran, transaksi.status_booking, transaksi.bank_tujuan, transaksi.tgl_konfirmasi, transaksi.kode_booking');
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

    public function tambah(){

        $judul_1 = 'Tambah Kendaraan';
        $menu = $this->Menus->generateMenu();

        if ($_POST) {
            $upload = $this->do_upload();
            $file = $upload['name'];

            $data = array(
                'id_merk'=> $this->input->post('id_merk'),
                'type'=> $this->input->post('type'),
                'transmisi'=>$this->input->post('transmisi'),
                'jumlah_kursi'=>$this->input->post('jumlah_kursi'),
                'plat_nomor'=> $this->input->post('plat_nomor'),
                'kategori_plat'=> $this->input->post('kategori_plat'),
                'bahan_bakar'=> $this->input->post('bahan_bakar'),
                'harga_include_driver'=>$this->input->post('harga_include_driver'),
                'harga_exclude_driver'=> $this->input->post('harga_exclude_driver'),
                'file'=> $file,
                'status'=> "Aktif"
            );

            $this->db->insert('kendaraan',$data);
            redirect(base_url('admin/kendaraan'));
        } else{
            
            $merk = $this->db->get('merk')->result();

            $this->load->view('admin/'.$this->dirview.'/v_tambah',array(
                'merk'=>$merk,
                'menu'=>$menu,
                'judul_1'=>$judul_1,
                // 'judul_2'=>$judul_2,
            ));
        }
    }

    public function update($id){

        $judul_1 = 'Transaksi';
        $judul_2 = 'Data';
        $menu = $this->Menus->generateMenu();

        if ($_POST) {
            $data = array(
                'status_pembayaran'=> $this->input->post('status_pembayaran'),
            );

            $this->db->where('id',$id);
            $this->db->update('transaksi',$data);
            redirect(base_url('admin/transaksi'));
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

    public function do_upload()
    {
        $config['upload_path'] = 'assets/uploads/files/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        // var_dump("");
        $this->load->library('upload', $config);
        // $this->upload->initialize($config);

        if (!$this->upload->do_upload())
        {
            return array('status'=>false,'name'=>$this->upload->display_errors());
        }
        else {
            $data = array('upload_data' => $this->upload->data());
            return array('status'=>false,'name'=>$data['upload_data']['file_name']);
        }
    }

    public function upload(){
        $config['upload_path'] = 'assets/uploads/files/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        // $config['max_size'] = '2000';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file'))
        {
            $data = array('status'=>false,'msg'=>$this->upload->display_errors());
        }
        else
        {
            $data = array('status'=>true,'msg'=>'Gambar Berhasil di Upload','filename'=>$this->upload->data('file_name'));
        }
        echo json_encode($data);
    }

}