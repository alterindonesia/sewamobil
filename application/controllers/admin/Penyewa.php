<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyewa extends CI_Controller
{   
    private $dirview = 'penyewa';
    private $url = 'penyewa';
    
    function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('login_admin'))
            redirect(base_url('admin/login'));
    }

    public function index(){

        $judul_1 = 'Data Penyewa';
        $judul_2 = 'Data';
        $menu = $this->Menus->generateMenu();

        $this->db->order_by('id','DESC');
        $data = $this->db->get('user')->result();

        $this->load->view('admin/'.$this->dirview.'/v_index',array(
            'data'=>$data,
            'menu'=>$menu,
            'judul_1'=>$judul_1,
            // 'judul_2'=>$judul_2,
        ));
    }

    public function update($id){

        $judul_1 = 'Update Data Peyewa';
        $judul_2 = 'Data';
        $menu = $this->Menus->generateMenu();

        if ($_POST) {
            $data = array(
                'status_verifikasi'=> $this->input->post('status_verifikasi'),
            );

            $this->db->where('id',$id);
            $this->db->update('user',$data);
            redirect(base_url('admin/penyewa'));
        } else{
            
            $this->db->where('id',$id);
            $row = $this->db->get('user')->row();

            $this->load->view('admin/'.$this->dirview.'/v_update',array(
                'row'=>$row,
                'menu'=>$menu,
                'judul_1'=>$judul_1,
                // 'judul_2'=>$judul_2,
            ));
        }
    }

    public function detail($id){

        $judul_1 = 'Detail Peyewa';
        $judul_2 = 'Data';
        $menu = $this->Menus->generateMenu();

        $this->db->where('id',$id);
        $row = $this->db->get('user')->row();

        $this->load->view('admin/'.$this->dirview.'/v_detail',array(
            'row'=>$row,
            'menu'=>$menu,
            'judul_1'=>$judul_1,
            // 'judul_2'=>$judul_2,
        ));
    }
}