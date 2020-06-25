<?php

class About extends CI_Controller {

	public function index(){
		$data = [
			'title' => 'About Page',
		];
		$this->load->view('templates/header', $data);
		$this->load->view('About/index');
		$this->load->view('templates/footer');
	}
}
