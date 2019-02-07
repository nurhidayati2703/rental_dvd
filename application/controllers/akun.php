<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_akun','model');
	}

	public function index()
	{
		if ($this->session->userdata('login')==TRUE) {
			redirect('home','refresh');
		}
		$this->load->view('login');
	}

	public function proses_login()
	{
		if ($this->input->post('login')) {
			$this->form_validation->set_rules('username', 'username', 'trim|required');
			$this->form_validation->set_rules('password', 'password', 'trim|required');
			if ($this->form_validation->run() == TRUE) {
				if ($this->model->getLogin()->num_rows()>0) {
					$data = $this->model->getLogin()->row();
					$array = array(
						'login' => TRUE,
						'nama' => $data->nama_user,
						'username' => $data->username,
						'password' => $data->password,
						'level' => $data->level,
						'kode_user' => $data->kode_user
						);
					
					$this->session->set_userdata( $array );
					$data1['status'] = 1;
					$data1['keterangan'] = "Anda Sukses Login";
					echo json_encode($data1);
				}else{
					$data1['status'] = 0;
					$data1['keterangan'] = "Username dan Password Salah";
					echo json_encode($data1);
				}
			} else {
				$data1['status'] = 0;
				$data1['keterangan'] = validation_errors();
				echo json_encode($data1);
			}
		}	
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('akun','refresh');
	}

}

/* End of file akun.php */
/* Location: ./application/controllers/akun.php */