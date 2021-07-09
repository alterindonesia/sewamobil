<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('login_user')){
			redirect(base_url('login'));
		}
	}

	public function index(){

			$id_user = $this->session->userdata('id_user');

			$this->db->where('id',$id_user);
			$data['user'] = $this->db->get('user')->row();

			$this->load->view("front/v_akun", $data);
	}

	public function upload_ktp(){
		$id_user = $this->session->userdata('id_user');
		// var_dump($this->input->post());die();
		if($this->input->post()){
			$upload = $this->do_upload();
            $file = $upload['name'];

            // $tes = $this->input->post('tes');
            // var_dump($tes);die();

			$data = array('ktp' => $file,
						'status_verifikasi' => "Proses Verifikasi");
			$this->db->where('id',$id_user);
			$this->db->update('user',$data);

			redirect(base_url('akun'));
		}else{
			$id_user = $this->session->userdata('id_user');
			$this->db->where('id',$id_user);
			$data['user'] = $this->db->get('user')->row();

			$this->load->view("front/v_simpan_ktp", $data);
		}
	}

	public function ubah_nama(){
			
		if($this->input->post()){
			$id_user = $this->session->userdata('id_user');
			$data = array('nama' => $this->input->post('nama', true));

			$this->db->where('id',$id_user);
			$this->db->update('user',$data);

			redirect(base_url('akun'));
		}else{
			$id_user = $this->session->userdata('id_user');
			$this->db->where('id',$id_user);
			$data['user'] = $this->db->get('user')->row();

			$this->load->view("front/v_ubah_nama", $data);
		}
	}

	public function ubah_nomor(){
			
			if($this->input->post()){
			$id_user = $this->session->userdata('id_user');
			$data = array('no_telpon' => $this->input->post('no_telpon', true));

			$this->db->where('id',$id_user);
			$this->db->update('user',$data);

			redirect(base_url('akun'));
		}else{
			$id_user = $this->session->userdata('id_user');
			$this->db->where('id',$id_user);
			$data['user'] = $this->db->get('user')->row();

			$this->load->view("front/v_ubah_nomor", $data);
		}
	}

	public function ubah_email(){
			
			if($this->input->post()){
			$id_user = $this->session->userdata('id_user');
			$data = array('email' => $this->input->post('email', true));

			$this->db->where('id',$id_user);
			$this->db->update('user',$data);

			redirect(base_url('akun'));
		}else{
			$id_user = $this->session->userdata('id_user');
			$this->db->where('id',$id_user);
			$data['user'] = $this->db->get('user')->row();

			$this->load->view("front/v_ubah_email", $data);
		}
	}

	public function ubah_alamat(){
			
			if($this->input->post()){
			$id_user = $this->session->userdata('id_user');
			$data = array('alamat' => $this->input->post('alamat', true));

			$this->db->where('id',$id_user);
			$this->db->update('user',$data);

			redirect(base_url('akun'));
		}else{
			$id_user = $this->session->userdata('id_user');
			$this->db->where('id',$id_user);
			$data['user'] = $this->db->get('user')->row();

			$this->load->view("front/v_ubah_alamat", $data);
		}
	}

	public function do_upload()
    {
        $config['upload_path'] = 'assets/uploads/ktp/';
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
		
}