<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Film extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_genre','kat');
		$this->load->model('m_film','film');
	}

	public function index()
	{
		if ($this->session->userdata('login')!=TRUE) {		
			redirect('akun','refresh');
		}
		elseif ($this->session->userdata('level')!="admin") {
			redirect('akun','refresh');
		}
		$data['film'] = $this->film->getFilm();
		$data['genre'] = $this->kat->getKat();
		$data['content'] = "film";
		$this->load->view('template',$data);
	}

	public function add()
	{
		$this->form_validation->set_rules('judul', 'judul_film', 'trim|required');
		$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
		$this->form_validation->set_rules('harga', 'harga', 'trim|required');
		$this->form_validation->set_rules('genre', 'kode_genre', 'trim|required');
		$this->form_validation->set_rules('produksi', 'produksi', 'trim|required');
		$this->form_validation->set_rules('sutradara', 'sutradara', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/upload/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '5000';
			$config['max_width']  = '3000';
			$config['max_height']  = '3000';
			
			if ($_FILES['gambar']['name']!="") {
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('gambar')){
					$this->session->set_flashdata('pesan', $this->upload->display_errors());
				}
				else{
					if ($this->film->addFilm($this->upload->data('file_name'))) {
						$this->session->set_flashdata('pesan', 'Data Film Berhasil Ditamabhkan');
					}
					else{
						$this->session->set_flashdata('pesan', 'Data Film Gagal Ditamabhkan');
					}
					redirect('film','refresh');
				}
			}
			else{
				if ($this->film->addFilm('')) {
					$this->session->set_flashdata('pesan', 'Data Film Berhasil Ditamabhkan');
				}
				else{
					$this->session->set_flashdata('pesan', 'Data Film Gagal Ditamabhkan');
				}
				redirect('film','refresh');
			}
		} else {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('film','refresh');
		}

	}

	public function detail($a)
	{
		$data = $this->film->detFilm($a);
		echo json_encode($data);
	}

	public function update()
	{
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('judul', 'judul_film', 'trim|required');
			$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
			$this->form_validation->set_rules('harga', 'harga', 'trim|required');
			$this->form_validation->set_rules('genre', 'kode_genre', 'trim|required');
			$this->form_validation->set_rules('produksi', 'produksi', 'trim|required');
			$this->form_validation->set_rules('sutradara', 'sutradara', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				if ($_FILES['gambar']['name']=="") {
					if ($this->film->updateNoGambar()) {
						$this->session->set_flashdata('pesan', 'Data Film Berhasil Diperbarui');
					}else{
						$this->session->set_flashdata('pesan', 'Data Film Gagal Diperbarui');
					}
					redirect('film','refresh');
				}else{
					$config['upload_path'] = './assets/upload/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']  = '5000';
					$config['max_width']  = '3000';
					$config['max_height']  = '3000';

					$this->load->library('upload', $config);

					if ( ! $this->upload->do_upload('gambar')){
						$this->session->set_flashdata('pesan', $this->upload->display_errors());
					}
					else{
						if ($this->film->updateGambar($this->upload->data('file_name'))) {
							$this->session->set_flashdata('pesan', 'Data Film Berhasil Diperbarui');
						}
						else{
							$this->session->set_flashdata('pesan', 'Data Film Gagal Diperbarui');
						}
						redirect('film','refresh');
					}

				}
			} else {
				$this->session->set_flashdata('pesan', validation_errors());
				redirect('film','refresh');
			}
			
		}
	}

	public function delete($a='')
	{
		if ($this->film->delFilm($a)) {
			$this->session->set_flashdata('pesan', 'Data Film Berhasil Dihapus');
			redirect('film','refresh');
		}else{
			$this->session->set_flashdata('pesan', 'Data Film Gagal Dihapus');
			redirect('film','refresh');
		}
	}

}

/* End of file film.php */
/* Location: ./application/controllers/film.php */