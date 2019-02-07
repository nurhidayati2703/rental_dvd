<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_genre extends CI_Model {

	public function addKat()
	{
		$this->form_validation->set_rules('kode', 'kode_genre', 'trim|required');
		$this->form_validation->set_rules('nama', 'nama_genre', 'trim|required');
		$object = array(
					'kode_genre' => $this->input->post('kode'),
					'nama_genre' => $this->input->post('nama'));
		return $this->db->insert('genre', $object);
	}

	public function getKat()
	{
		return $this->db->get('genre')->result();
	}

	public function detKat($a)
	{
		return $this->db->where('kode_genre', $a)->get('genre')->row();
	}

	public function ubahKat()
	{
		$this->form_validation->set_rules('kode', 'kode_genre', 'trim|required');
		$this->form_validation->set_rules('nama', 'nama_genre', 'trim|required');
		$object = array(
					'kode_genre' => $this->input->post('kode'),
					'nama_genre' => $this->input->post('nama'));
		return $this->db->where('kode_genre',$this->input->post('kodeLama'))->update('genre', $object);
	}

	public function delKat($a='')
	{
		return $this->db->where('kode_genre',$a)->delete('genre');
	}
	

}

/* End of file m_genre.php */
/* Location: ./application/models/m_genre.php */