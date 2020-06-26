<?php

class Mahasiswa extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('MahasiswaModel');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('nim', 'NIM', 'trim|required|max_length[8]');
		$this->form_validation->set_rules('jurusan', 'jurusan', 'trim|required');
		$this->form_validation->set_rules('angkatan', 'angkatan', 'trim|required|numeric');
	}

	/**
	 * @return void
	 */
	public function index(): void {
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'Mahasiswa/index';
		$config['total_rows'] = $this->MahasiswaModel->count();
		$config['per_page'] = 12;
		$config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination pagination-lg m-auto align-items-center justify-content-center">';
		$config['full_tag_close'] = '</ul></nav>';
		$config['first_link'] = 'first';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['attributes'] = ['class' => 'page-link'];
		$this->pagination->initialize($config);
		$data = [
			'title' => 'Daftar Mahasiswa',
			'students' => $this->MahasiswaModel->all($config['per_page'], $this->uri->segment(3))
		];
		if (isset($_POST['insert']) || isset($_POST['update'])):
			if ($this->form_validation->run() === FALSE):
				$this->load->view('templates/header', $data);
				$this->load->view('Mahasiswa/index', $data);
				$this->load->view('templates/footer');
			else:
				if (isset($_POST['update'])):
					try {
						$this->MahasiswaModel->save();
						$this->session->set_flashdata('update', 'berhasil');
						redirect('Mahasiswa');
					} catch (Exception $exception) {
						echo "<h1>{$exception->getMessage()}</h1>";
						die;
					}
				elseif (isset($_POST['insert'])):
					try {
						$this->MahasiswaModel->add();
						$this->session->set_flashdata('insert', 'berhasil');
						redirect('Mahasiswa');
					} catch (Exception $exception) {
						echo "<h1>{$exception->getMessage()}</h1>";
						die;
					}
				endif;
			endif;
		elseif ($this->input->post('keyword')):
			$data['students'] = $this->MahasiswaModel->look();
			$this->load->view('templates/header', $data);
			$this->load->view('Mahasiswa/index', $data);
			$this->load->view('templates/footer');
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
