<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Genre extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_genre','kat');
	}

	public function index()
	{
		if ($this->session->userdata('login')!=TRUE) {		
			redirect('akun','refresh');
		}
		elseif ($this->session->userdata('level')!="admin") {
			redirect('akun','refresh');
		}
		$data['tampil'] = $this->kat->getKat();
		$data['content'] = "genre";
		$this->load->view('template',$data);
	}

	public function add()
	{
		if ($this->input->post('submit')) {
			if ($this->kat->addKat()) {
				$this->session->set_flashdata('pesan', 'Data Genre Berhasil Ditambah');
				redirect('genre','refresh');
			}
			else{
				$this->session->set_flashdata('pesan', 'Data Genre Gagal Ditambah');
				redirect('genre','refresh');
			}
		}
	}

	public function detail($a)
	{
		$data = $this->kat->detKat($a);
		echo json_encode($data);
	}

	public function update()
	{
		if ($this->input->post('submit')) {
			if ($this->kat->ubahKat()) {
				$this->session->set_flashdata('pesan', 'Data Genre Berhasil Diubah');
				redirect('genre','refresh');
			}
			else{
				$this->session->set_flashdata('pesan', 'Data Genre Gagal Diubah');
				redirect('genre','refresh');
			}
		}
	}

	public function delete($a='')
	{
		if ($this->kat->delKat($a)) {
			$this->session->set_flashdata('pesan', 'Data Genre Berhasil Dihapus');
			redirect('genre','refresh');
		}else{
			$this->session->set_flashdata('pesan', 'Data Genre Gagal Dihapus');
			redirect('genre','refresh');
		}
	}

}

/* End of file genre.php */
/* Location: ./application/controllers/genre.php */