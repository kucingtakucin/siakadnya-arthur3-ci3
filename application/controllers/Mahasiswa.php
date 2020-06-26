<?php

class Mahasiswa extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('MahasiswaModel');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	public function index(): void {
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('nim', 'NIM', 'trim|required|max_length[8]');
		$this->form_validation->set_rules('jurusan', 'jurusan', 'trim|required');
		$this->form_validation->set_rules('angkatan', 'angkatan', 'trim|required|numeric');
		$data = [
			'title' => 'Daftar Mahasiswa',
			'students' => $this->MahasiswaModel->all()
		];

		if ($this->form_validation->run() === FALSE):
			$this->load->view('templates/header', $data);
			$this->load->view('Mahasiswa/index');
			$this->load->view('templates/footer');
		else:
			$this->MahasiswaModel->add();
			$this->session->set_flashdata('insert', 'berhasil');
			redirect('Mahasiswa');
		endif;
	}

	public function delete($id): void {
		$this->MahasiswaModel->remove($id);
		$this->session->set_flashdata('delete', 'berhasil');
		redirect('Mahasiswa');
	}
}
