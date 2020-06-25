<?php

class MahasiswaModel extends CI_Model {

	public function all(): array {
		return $this->db->get('mahasiswa')->result_array();
	}
}
