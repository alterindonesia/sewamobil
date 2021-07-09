<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Useradmin extends CI_Controller
{   
    private $dirview = 'useradmin';
    private $url = 'useradmin';
    
    function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('login_admin'))
            redirect(base_url('admin/login'));
    }

    public function index(){

        $judul_1 = 'User Admin';
        $judul_2 = 'Data';
        $menu = $this->Menus->generateMenu();

        $this->db->order_by('id','DESC');
        $data = $this->db->get('admin')->result();

        $this->load->view('admin/'.$this->dirview.'/v_index',array(
            'data'=>$data,
            'menu'=>$menu,
            'judul_1'=>$judul_1,
            // 'judul_2'=>$judul_2,
        ));
    }

    public function tambah(){

        $judul_1 = 'Tambah Admin';
        $menu = $this->Menus->generateMenu();

        if ($_POST) {
            $data = array(
                'nama'=> $this->input->post('nama'),
                'email'=> $this->input->post('email'),
                'password'=>$this->input->post('password'),
                'status'=> 1
            );

            $this->db->insert('admin',$data);
            redirect(base_url('admin/useradmin'));
        } else{
            $this->load->view('admin/'.$this->dirview.'/v_tambah',array(
                'menu'=>$menu,
                'judul_1'=>$judul_1,
                // 'judul_2'=>$judul_2,
            ));
        }
    }

    public function update($id){

        $judul_1 = 'Update User Admin';
        $judul_2 = 'Data';
        $menu = $this->Menus->generateMenu();

        if ($_POST) {
            $data = array(
                'status'=> $this->input->post('status'),
                'nama'=> $this->input->post('nama'),
                'email'=> $this->input->post('email'),
                'password'=> $this->input->post('password'),
            );

            $this->db->where('id',$id);
            $this->db->update('admin',$data);
            redirect(base_url('admin/useradmin'));
        } else{
            
            $this->db->where('id',$id);
            $row = $this->db->get('admin')->row();

            $this->load->view('admin/'.$this->dirview.'/v_ubah',array(
                'row'=>$row,
                'menu'=>$menu,
                'judul_1'=>$judul_1,
                // 'judul_2'=>$judul_2,
            ));
        }
    }

    public function detail($id){

        $judul_1 = 'Detail User Admin';
        $judul_2 = 'Data';
        $menu = $this->Menus->generateMenu();

        $this->db->where('id',$id);
        $row = $this->db->get('admin')->row();

        $this->load->view('admin/'.$this->dirview.'/v_detail',array(
            'row'=>$row,
            'menu'=>$menu,
            'judul_1'=>$judul_1,
            // 'judul_2'=>$judul_2,
        ));
    }
}