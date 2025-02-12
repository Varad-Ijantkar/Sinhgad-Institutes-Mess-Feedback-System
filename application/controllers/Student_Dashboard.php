
<?php
class Student_Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Student_model');
		$this->load->library('session');
		$this->load->helper('url');

		if (!$this->session->userdata('student_id')) {
			redirect('login');
		}
	}

	public function index() {
		$student_id = $this->session->userdata('student_id');
		$data['student_info'] = $this->Student_model->get_student_info($student_id);

		if (!$data['student_info']) {
			$this->session->set_flashdata('error', 'Student information not found.');
			redirect('logout');
		}
		$this->load->view('template/header', $data);
		$this->load->view('template/leftnavbar', $data);
		$this->load->view('student_dashboard_view', $data);
		$this->load->view('template/footer', $data);
	}
}
