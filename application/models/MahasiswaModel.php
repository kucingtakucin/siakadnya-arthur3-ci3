<?php

class MahasiswaModel extends CI_Model {

	public function all(): array {
		return $this->db->get('mahasiswa')->result_array();
	}

	public function add(): void {
		$data = [
			'nim' => $this->input->post('nim', true),
			'nama' => $this->input->post('nama', true),
			'jurusan' => $this->input->post('jurusan', true),
			'angkatan' => $this->input->post('angkatan', true),
		];
		$this->db->insert('mahasiswa', $data);
	}

	/**
	 * @param $id
	 */
	public function remove($id): void {
		$this->db->where('id', $id);
		$this->db->delete('Mahasiswa');
	}
}
