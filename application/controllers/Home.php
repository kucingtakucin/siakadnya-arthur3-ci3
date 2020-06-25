<?php

class Home extends CI_Controller {

	public function index(): void {
		$data = [
			'title' => 'Halaman Home',
			'nama' => 'Adam',
			'panggil' => 'Arthur'
		];
		$this->load->view('templates/header', $data);
		$this->load->view('Home/index', $data);
		$this->load->view('templates/footer');
	}

}
