<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$data['keuntungan'] = $this->trans->keuntungan();
		$data['jmlTrans'] = $this->trans->jumlahtrans();
		$data['jmlbuku'] = $this->film->jmlfilm();
		$data['jumlah'] = $this->trans->transaksi();
		$data['histori'] = $this->trans->histori();
		$data['content'] = "home";
		$this->load->view('template',$data);
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */