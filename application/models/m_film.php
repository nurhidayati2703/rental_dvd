<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_film extends CI_Model {

	public function addFilm($nama_file)
	{
		if ($nama_file=="") {
			$object = array(
						'judul_film' => $this->input->post('judul'),
						'tahun' => $this->input->post('tahun'),
						'harga' => $this->input->post('harga'),
						'kode_genre' => $this->input->post('genre'),
						'produksi' => $this->input->post('produksi'),
						'sutradara' => $this->input->post('sutradara'),
						'stok' => $this->input->post('stok'));

		}else{
			$object = array(
						'judul_film' => $this->input->post('judul'),
						'tahun' => $this->input->post('tahun'),
						'harga' => $this->input->post('harga'),
						'kode_genre' => $this->input->post('genre'),
						'foto_film' => $nama_file,
						'produksi' => $this->input->post('produksi'),
						'sutradara' => $this->input->post('sutradara'),
						'stok' => $this->input->post('stok'));
		}
		return $this->db->insert('film', $object);
	}	

	public function getFilm()
	{
		return $this->db->join('genre','genre.kode_genre=film.kode_genre')->get('film')->result();
	}

	public function delFilm($a='')
	{
		return $this->db->where('kode_film',$a)->delete('film');
	}

	public function detFilm($a)
	{
		return $this->db->join('genre','genre.kode_genre=film.kode_genre')->where('kode_film', $a)->get('film')->row();
	}

	public function updateGambar($nama_foto)
	{
		$object = array(
						'judul_film' => $this->input->post('judul'),
						'tahun' => $this->input->post('tahun'),
						'harga' => $this->input->post('harga'),
						'kode_genre' => $this->input->post('genre'),
						'foto_film' => $nama_foto,
						'produksi' => $this->input->post('produksi'),
						'sutradara' => $this->input->post('sutradara'),
						'stok' => $this->input->post('stok'));

		return $this->db->where('kode_film',$this->input->post('kodefilm'))->update('film', $object);
	}

	public function updateNoGambar()
	{
		$object = array(
						'judul_film' => $this->input->post('judul'),
						'tahun' => $this->input->post('tahun'),
						'harga' => $this->input->post('harga'),
						'kode_genre' => $this->input->post('genre'),
						'produksi' => $this->input->post('produksi'),
						'sutradara' => $this->input->post('sutradara'),
						'stok' => $this->input->post('stok'));

		return $this->db->where('kode_film',$this->input->post('kodefilm'))->update('film', $object);
	}

	public function jmlFilm()
	{
		$this->db->select('COUNT(kode_film) as jumlah');
		$this->db->from('film');
		return $this->db->get()->row()->jumlah;
	}

}

/* End of file m_film.php */
/* Location: ./application/models/m_film.php */