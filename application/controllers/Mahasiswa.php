<?php

class Mahasiswa extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('MahasiswaModel');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('nim', 'NIM', 'trim|required|max_length[8]');
		$this->form_validation->set_rules('jurusan', 'jurusan', 'trim|required');
		$this->form_validation->set_rules('angkatan', 'angkatan', 'trim|required|numeric');
	}

	/**
	 * @param $data
	 * @return void
	 */
	public function index(): void {
		if ($this->input->post('search')):
			$keyword = $this->input->post('keyword', true);
			$this->session->set_userdata('keyword', $keyword);
		else:
			$keyword = $this->session->get_userdata('keyword');
		endif;

		$this->db->like('nama', $this->input->post('keyword', true));
		$this->db->or_like('nim', $this->input->post('keyword', true));
		$this->db->or_like('jurusan', $this->input->post('keyword', true));
		$this->db->or_like('angkatan', $this->input->post('keyword', true));
		$this->db->from('mahasiswa');
		$config['total_rows'] = $this->db->count_all_results();
		$config['per_page'] = 8;
		$config['num_links'] = 5;
		$this->pagination->initialize($config);

		$data = [
			'title' => 'Daftar Mahasiswa',
			'total_rows' => $config['total_rows'],
			'students' => $this->MahasiswaModel->all($config['per_page'], $this->uri->segment(3), $keyword)
		];

		if ($this->input->post('insert') || $this->input->post('update')):
			if ($this->form_validation->run() === FALSE):
				$this->load->view('templates/header', $data);
				$this->load->view('Mahasiswa/index', $data);
				$this->load->view('templates/footer');
			else:
				try {
					if ($this->input->post('insert')):
						$this->MahasiswaModel->add();
						$this->session->set_flashdata('insert', 'berhasil');
						redirect('Mahasiswa');
					else:
						$this->MahasiswaModel->save();
						$this->session->set_flashdata('update', 'berhasil');
						redirect('Mahasiswa');
					endif;
				} catch (Exception $exception) {
					echo "<h1>{$exception->getMessage()}</h1>";
					die;
				}
			endif;
		else:
			$this->load->view('templates/header', $data);
			$this->load->view('Mahasiswa/index', $data);
			$this->load->view('templates/footer');
		endif;
	}

	public function api(): void {
		try {
			header('Content-Type: application/json');
			echo json_encode($this->MahasiswaModel->all(), JSON_THROW_ON_ERROR);
		} catch (JsonException $e) {
			echo $e->getMessage();
			die;
		}
	}

	/**
	 * @return void
	 */
	public function show(): void {
		$json_content = trim(file_get_contents("php://input"));
		try {
			header('Content-Type: application/json');
			$data = json_decode($json_content, true, 512, JSON_THROW_ON_ERROR);
			echo json_encode($this->MahasiswaModel->single($data['id']), JSON_THROW_ON_ERROR);
		} catch (JsonException $exception) {
			echo "<h1>{$exception->getMessage()}</h1>";
			die;
		}
	}

	/**
	 * @param $id
	 * @return void
	 */
	public function delete($id): void {
		$this->MahasiswaModel->remove($id);
		$this->session->set_flashdata('delete', 'berhasil');
		redirect('Mahasiswa');
	}
}
