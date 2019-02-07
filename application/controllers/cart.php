<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

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
		$data['content'] = "cart";
		$this->load->view('template',$data);
	}

	public function addCart($id)
	{

		$detail = $this->film->detFilm($id);

		$data = array(
			'id'      => $detail->kode_film,
			'qty'     => 1,
			'price'   => $detail->harga,
			'name'    => $detail->judul_film,
			'options' => array('genre' => $detail->kode_genre, 'stok' => $detail->stok)
			);
		
		$this->cart->insert($data);
		redirect('cart','refresh');
	}

	public function simpan()
	{
		if ($this->input->post('update')) {
			for ($i=0; $i<count($this->input->post('rowid')) ; $i++) { 

				$data = array(
					'rowid' => $this->input->post('rowid')[$i],
					'qty'   => $this->input->post('qty')[$i]
					);
				$this->cart->update($data);
				redirect('cart','refresh');
			}
		}elseif ($this->input->post('bayar')) {
			$this->form_validation->set_rules('nama', 'nama_peminjam', 'trim|required');
			if ($this->form_validation->run() == TRUE) {
				$id = $this->trans->simpan_cart_db();
				if ($id) {
					$kembalian = $this->input->post('mbayar') - $this->input->post('grandtotal');
					$data['transaksi'] = $this->trans->detail_transaksi($id);
					$data['pembelian'] = $this->trans->detail_pembelian($id);
					$this->load->view('cetak_nota', $data, FALSE);
					$this->session->set_flashdata('pesan', $kembalian);
					$this->cart->destroy();
				}
			} else {
				$this->session->set_flashdata('pesan', validation_errors());
				redirect('cart','refresh');
			}
		}
		
	}

	public function delete($id)
	{
		$data = array(
			'rowid' => $id,
			'qty'   => 0
		);
		
		$this->cart->update($data);
		redirect('cart','refresh');
	}

	public function deleteAll()
	{
			$this->cart->destroy();
			redirect('cart','refresh');		
	}

}

/* End of file cart.php */
/* Location: ./application/controllers/cart.php */