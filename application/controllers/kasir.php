<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_akun','akun');
	}

	public function index()
	{
		if ($this->session->userdata('login')!=TRUE) {		
			redirect('akun','refresh');
		}
		elseif ($this->session->userdata('level')!="admin") {
			redirect('akun','refresh');
		}
		$data['kasir'] = $this->akun->getKasir();
		$data['content'] = "kasir";
		$this->load->view('template',$data);
	}

	public function add()
	{
		$this->form_validation->set_rules('nama', 'nama_user', 'trim|required');
		$this->form_validation->set_rules('username', 'username', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('password', 'passowrd', 'trim|required|min_length[5]');
		if ($this->form_validation->run() == TRUE) {
			if ($this->input->post('submit')) {
				if ($this->akun->addKasir()) {
					$this->session->set_flashdata('pesan', 'Data Kasir Berhasil Ditambahkan');
					redirect('kasir','refresh');
				}
			}
		} else {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('kasir','refresh');
		}
	}

	public function detail($a)
	{
		$data = $this->akun->detKas($a);
		echo json_encode($data);
	}

	public function update()
	{
		$this->form_validation->set_rules('nama', 'nama_user', 'trim|required');
		$this->form_validation->set_rules('username', 'username', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('password', 'passowrd', 'trim|required|min_length[5]');
		if ($this->form_validation->run() == TRUE) {
			if ($this->input->post('submit')) {
				if ($this->akun->ubahKas()) {
					$this->session->set_flashdata('pesan', 'Data Kasir Berhasil Diubah');
					redirect('kasir','refresh');
				}
				else{
					$this->session->set_flashdata('pesan', 'Data Kasir Gagal Diubah');
					redirect('kasir','refresh');
				}
			}
		} else {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('kasir','refresh');
		}
	}

	public function delete($a = '')
	{
		if ($this->akun->delKasir($a)) {
			$this->session->set_flashdata('pesan', 'Sukses Menghapus Kasir');
		}else{
			$this->session->set_flashdata('pesan', 'Gagal Menghapus Kasir');
		}
		redirect('kasir','refresh');
	}

}

/* End of file kasir.php */
/* Location: ./application/controllers/kasir.php */