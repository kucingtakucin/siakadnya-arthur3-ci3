<?php

class MahasiswaModel extends CI_Model {

	/**
	 * @return array
	 */
	public function all($limit, $start): array {
		return $this->db->get('mahasiswa', $limit, $start)->result_array();
	}

	/**
	 * @param $id
	 * @return array
	 */
	public function single($id): array {
		return $this->db->get_where('mahasiswa', ['id' => $id])->row_array();
	}

	/**
	 * @return void
	 */
	public function add(): void {
		$data = [
			'nim' => $this->input->post('nim', true),
			'nama' => $this->input->post('nama', true),
			'jurusan' => $this->input->post('jurusan', true),
			'angkatan' => $this->input->post('angkatan', true),
			'foto' => $this->upload_image()
		];
		$this->db->insert('mahasiswa', $data);
	}

	public function save(): void {
		$fotolama = $this->input->post('fotolama');
		if ($_FILES['foto_baru']['error'] === 4) {
			$fotobaru = $fotolama;
		} else {
			$fotobaru = $this->upload_image();
		}
		$data = [
			'nim' => $this->input->post('nim', true),
			'nama' => $this->input->post('nama', true),
			'jurusan' => $this->input->post('jurusan', true),
			'angkatan' => $this->input->post('angkatan', true),
			'foto' => $fotobaru
		];
		$this->db->update('mahasiswa',$data,['id' => $this->input->post('id', true)]);
	}

	/**
	 * @param $id
	 * @return void
	 */
	public function remove($id): void {
		$this->db->delete('mahasiswa', ['id' => $id]);
	}

	/**
	 * @return array
	 */
	public function look(): array {
		$this->db->like('nama', $this->input->post('keyword'));
		$this->db->or_like('nim', $this->input->post('keyword'));
		$this->db->or_like('jurusan', $this->input->post('keyword'));
		$this->db->or_like('angkatan', $this->input->post('keyword'));
		return $this->db->get('mahasiswa')->result_array();
	}

	public function count(): int {
		return $this->db->get('mahasiswa')->num_rows();
	}

	/**
	 * @return string
	 */
	public function upload_image(): string {
		$filename = $_FILES['foto']['name'];
		$filesize = $_FILES['foto']['size'];
		$errorfile = $_FILES['foto']['error'];
		$tmpname = $_FILES['foto']['tmp_name'];
		if ($errorfile === 4):
			throw new \RuntimeException("Gagal mengupload gambar karena kesalahan yang tidak diketahui!", 1);
		endif;

		$validextension = ['jpg', 'jpeg', 'png', 'svg'];
		$array = explode('.', $filename);
		$prefixfilename = strtolower($array[0]);
		$fileextension = strtolower(end($array));
		if (!in_array($fileextension, $validextension)):
			throw new \RuntimeException("Yang kamu masukkan bukan gambar!", 1);
		endif;
		if ($filesize > 1000000):
			throw new \RuntimeException("Ukuran gambar kamu terlalu besar! Max. 1MB", 1);
		endif;

		$newfilename = uniqid($prefixfilename, true) . ".$fileextension";
		move_uploaded_file($tmpname, "assets/img/$newfilename");
		return $newfilename;
	}

}
