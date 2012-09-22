<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class m_dsp extends CI_Model {

	public function get_sisa($id) {
		$sql = "select b.jumlah_dsp, (b.jumlah_dsp - sum(jumlah_bayar_dsp)) as sisa_dsp ,b.id_dsp from bayar_dsp a right join dsp b on a.id_dsp = b.id_dsp where b.nomor_induk_siswa = '" . $id . "' GROUP BY b.id_dsp,b.jumlah_dsp";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	public function get_history($id) {
		$sql = "select * from dsp a inner join bayar_dsp b on a.id_dsp = b.id_dsp where nomor_induk_siswa = '".$id."'";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function insert($nis, $jml_dsp) {
		$sql = "select count(*) as count from dsp where nomor_induk_siswa = '" . $nis . "'";
		$query = $this->db->query($sql)->result();
		if ($query[0]->count < 1) {
			$sql = "INSERT into dsp values (nextval('dsp_pk_seq'),'$nis','$jml_dsp')";
			$this->db->query($sql);
		} else {
			$value['jumlah_dsp'] = $jml_dsp;
			$this->db->update('dsp', $value, "nomor_induk_siswa = '" . $nis . "'");
		}
	}

	public function insert_bayar_dsp($value) {
		$this->db->insert('bayar_dsp', $value);
	}
}
?>