<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_genre','kat');
		$this->load->model('m_film','film');
		$this->load->model('m_transaksi','trans');
	}

	public function index()
	{
		if ($this->session->userdata('login')!=TRUE) {
			redirect('akun','refresh');
		}
		$data['film'] = $this->film->getFilm();
		$data['kat'] = $this->kat->getKat();
		$data['content'] = "transaksi";
		$this->load->view('template',$data);
	}

	public function search()
	{
		$keyword = $this->input->post('key');
		$data['hasil'] = $this->trans->search($keyword);
		$this->load->view('search', $data);
	}

}

/* End of file transaksi.php */
/* Location: ./application/controllers/transaksi.php */