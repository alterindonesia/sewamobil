<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kendaraan extends CI_Controller
{   
    private $dirview = 'kendaraan';
    private $url = 'kendaraan';
    
    function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('login_admin'))
            redirect(base_url('admin/login'));
    }

    public function index(){

        $judul_1 = 'Kendaraan';
        $judul_2 = 'Data';
        $menu = $this->Menus->generateMenu();

        $this->db->select('kendaraan.type, kendaraan.id as id_kendaraan, merk.nama as nama_merk, kendaraan.plat_nomor, kendaraan.bahan_bakar, kendaraan.harga_include_driver, kendaraan.harga_exclude_driver');
        $this->db->order_by('tgl_input','DESC');
        $this->db->join('merk','merk.id = kendaraan.id_merk');
        $data = $this->db->get('kendaraan')->result();

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

    public function ubah($id){

        $judul_1 = 'Ubah Data Kendaraan';
        $menu = $this->Menus->generateMenu();

        if ($_POST) {

            $upload = $this->do_upload();
            $file = $upload['name'];
            
            // $gambar = $this->input->post('gambar',true);
            // var_dump($file);die();
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
                    'status'=> "Aktif",
                    
                );

                if(!empty($_FILES['userfile']['name'])){
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
                    'status'=> "Aktif",
                    'file'=>$file
                    );
                }    
           

            $this->db->where('id',$id);
            $this->db->update('kendaraan',$data);
            redirect(base_url('admin/kendaraan'));
        } else{
            
            $merk = $this->db->get('merk')->result();

            $this->db->select('kendaraan.type, kendaraan.status, kendaraan.file, kendaraan.jumlah_kursi, kendaraan.id as id_kendaraan, merk.id as id_merk, merk.nama as nama_merk, kendaraan.plat_nomor, kendaraan.bahan_bakar, kendaraan.transmisi, kendaraan.kategori_plat, kendaraan.harga_include_driver, kendaraan.harga_exclude_driver');
            $this->db->order_by('tgl_input','DESC');
            $this->db->join('merk','merk.id = kendaraan.id_merk');
            $this->db->where('kendaraan.id',$id);
            $row = $this->db->get('kendaraan')->row();

            $this->load->view('admin/'.$this->dirview.'/v_ubah',array(
                'merk'=>$merk,
                'row'=>$row,
                'menu'=>$menu,
                'judul_1'=>$judul_1,
                // 'judul_2'=>$judul_2,
            ));
        }
    }

    public function detail($id){

        $judul_1 = 'Detail Data Kendaraan';
        $menu = $this->Menus->generateMenu();

        $merk = $this->db->get('merk')->result();

        $this->db->select('kendaraan.type, kendaraan.status, kendaraan.file, kendaraan.jumlah_kursi, kendaraan.id as id_kendaraan, merk.id as id_merk, merk.nama as nama_merk, kendaraan.plat_nomor, kendaraan.bahan_bakar, kendaraan.transmisi, kendaraan.kategori_plat, kendaraan.harga_include_driver, kendaraan.harga_exclude_driver');
        $this->db->order_by('tgl_input','DESC');
        $this->db->join('merk','merk.id = kendaraan.id_merk');
        $this->db->where('kendaraan.id',$id);
        $row = $this->db->get('kendaraan')->row();

        $this->load->view('admin/'.$this->dirview.'/v_detail',array(
            'merk'=>$merk,
            'row'=>$row,
            'menu'=>$menu,
            'judul_1'=>$judul_1,
            // 'judul_2'=>$judul_2,
        ));
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