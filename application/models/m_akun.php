<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_akun extends CI_Model {

	public function getLogin()
	{
		return $this->db->where('username',$this->input->post('username'))
						->where('password',$this->input->post('password'))
						->get('data_user');
	}

	public function addKasir()
	{
		$object = array(
				'nama_user' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'level' => 'kasir' );

		return $this->db->insert('data_user', $object);
	}

	public function getKasir()
	{
		return $this->db->where('level','kasir')->get('data_user')->result();
	}

	public function detKas($a)
	{
		return $this->db->where('kode_user', $a)->get('data_user')->row();
	}

	public function ubahKas()
	{
		$object = array(
				'nama_user' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'level' => 'kasir' );
		return $this->db->where('kode_user',$this->input->post('kode_user'))->update('data_user', $object);
	}

	public function delKasir($a='')
	{
		return $this->db->where('kode_user',$a)->delete('data_user');
	}

}

/* End of file m_akun.php */
/* Location: ./application/models/m_akun.php */