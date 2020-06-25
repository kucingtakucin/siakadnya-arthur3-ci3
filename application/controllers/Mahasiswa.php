<?php

class Mahasiswa extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('MahasiswaModel');
	}

	public function index(): void {
		$data = [
			'title' => 'Daftar Mahasiswa',
			'students' => $this->MahasiswaModel->all()
		];
		$this->load->view('templates/header', $data);
		$this->load->view('Mahasiswa/index');
		$this->load->view('templates/footer');
	}
}
