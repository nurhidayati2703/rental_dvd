<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

	public function simpan_cart_db()
	{
		$object = array(
			'kode_user' => $this->input->post('kode_user'),
			'nama_peminjam' => $this->input->post('nama'),
			'total' => $this->input->post('grandtotal'),
			'tanggal_pinjam' => date('Y-m-d'));

		$this->db->insert('data_transaksi', $object);

		$detail_trans = $this->db
		->order_by('kode_transaksi', 'desc')
		->where('kode_user',$this->input->post('kode_user'))
		->limit(1)
		->get('data_transaksi')
		->row();

		for ($i=0; $i < count($this->input->post('rowid')); $i++) { 
			$hasil[] = array(
				'kode_transaksi'=>$detail_trans->kode_transaksi,
				'kode_film' => $this->input->post('kode_film')[$i],
				'jumlah' => $this->input->post('qty')[$i]
				);
			$stok =array('stok' => $this->input->post('stok')[$i] - $this->input->post('qty')[$i]);
			$this->db->where('kode_film',$this->input->post('kode_film')[$i])->update('film', $stok);
		}

		$proses = $this->db->insert_batch('detail_transaksi', $hasil);
		if ($proses) {
			return $detail_trans->kode_transaksi;
		}else{
			return 0;
		}
	}

	public function detail_transaksi($id_trans)
	{
		return $this->db->where('kode_transaksi',$id_trans)->get('data_transaksi')->row();	
	}

	public function pembayaran()
	{
		$masuk = $this->input->post('mbayar');
		$total = $this->input->post('grandtotal');
		if ($masuk > $total) {
			$kembalian = $masuk - $total;
		}
		elseif ($masuk==$total) {
			$kembalian = $masuk - $total;
		}
		else{
			$kembalian = $masuk-$total;
		}	
		return $kembalian;
	}

	public function detail_pembelian($id_trans)
	{
		return $this->db->where('kode_transaksi', $id_trans)->join('film','detail_transaksi.kode_film = film.kode_film')->get('detail_transaksi')->result();
	}

	public function keuntungan()
	{
		$date = date('Y-m-d');
		$this->db->select('SUM(total) as keuntungan');
		$this->db->from('data_transaksi');
		return $this->db->where('tanggal_pinjam',$date)->get()->row()->keuntungan;
	}

	public function jumlahtrans()
	{
		$this->db->select('COUNT(kode_transaksi) as banyak');
		$this->db->from('data_transaksi');
		return $this->db->get()->row()->banyak;
	}

	public function transaksi()
	{
		$this->db->select('sum(jumlah) as jumlah');
		$this->db->from('detail_transaksi');
		return $this->db->get()->row()->jumlah;
	}	

	public function histori()
	{
		return $this->db->get('data_transaksi')->result();
	}

	public function search($keyword)
	{
		$this->db->like('judul_film', $keyword);
		return $this->db->get('film')->result();
	}

}

/* End of file m_transaksi.php */
/* Location: ./application/models/m_transaksi.php */