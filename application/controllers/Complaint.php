<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Complaint extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Complaint_model');
		$this->load->model('Student_Info_model');
		$this->load->helper(array('form', 'url', 'security'));
		$this->load->library(['form_validation', 'session', 'upload']);
	}

	public function index()
	{
		if (!$this->session->userdata('user_email')) {
			redirect('login');
		}

		$data = $this->get_student_data();
		$this->load_views('complaint_view', $data);
	}

	public function submit()
	{
		if (!$this->session->userdata('user_email')) {
			redirect('login');
		}

		$this->set_validation_rules();

		if ($this->form_validation->run() == FALSE) {
			$data = $this->get_student_data();
			$this->load_views('complaint_view', $data);
			return;
		}

		$complaint_data = $this->prepare_complaint_data();

		// Handle photo upload if present
		if (!empty($_FILES['complaint_photo']['name'])) {
			$photo_path = $this->handle_photo_upload();
			if ($photo_path) {
				$complaint_data['photo_path'] = $photo_path;
			} else {
				$data = $this->get_student_data();
				$this->load_views('complaint_view', $data);
				return;
			}
		}

		// Save complaint
		if ($this->Complaint_model->insert_complaint($complaint_data)) {
			$this->session->set_flashdata('success', 'Complaint submitted successfully!');
		} else {
			$this->session->set_flashdata('error', 'Error submitting complaint. Please try again.');
		}

		redirect('complaint');
	}

	private function get_student_data()
	{
		$email = $this->session->userdata('user_email');
		$student_info = $this->Student_Info_model->get_student_by_email($email);

		return [
			'student_info' => [
				'email' => $student_info['email'] ?? '',
				'name' => $student_info['name'] ?? '',
				'phone' => $student_info['phone'] ?? '',
				'college_id' => $student_info['student_college_id'] ?? '',
				'campus_id' => $student_info['student_campus_id'] ?? '',
				'mess_id' => $student_info['student_mess_id'] ?? '',
				'college_name' => $student_info['college_name'] ?? 'Unknown',
				'campus_name' => $student_info['campus_name'] ?? 'Unknown',
				'mess_name' => $student_info['mess_name'] ?? 'Unknown'
			]
		];
	}

	private function set_validation_rules()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required|numeric');
		$this->form_validation->set_rules('college_id', 'College', 'required');
		$this->form_validation->set_rules('campus_id', 'Campus', 'required');
		$this->form_validation->set_rules('mess_id', 'Mess', 'required');
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('meal_time', 'Meal Time', 'required');
		$this->form_validation->set_rules('category', 'Category', 'required');
		$this->form_validation->set_rules('hygiene', 'Hygiene', 'required');
		$this->form_validation->set_rules('pest_control', 'Pest Control', 'required');
		$this->form_validation->set_rules('protocols', 'Protocols', 'required');
		$this->form_validation->set_rules('food_complaints', 'Food Complaints', 'trim');
		$this->form_validation->set_rules('suggestions', 'Suggestions', 'trim');
	}

	private function prepare_complaint_data()
	{
		return [
			'email' => $this->input->post('email'),
			'name' => $this->input->post('name'),
			'phone' => $this->input->post('phone'),
			'college_id' => $this->input->post('college_id'),
			'campus_id' => $this->input->post('campus_id'),
			'mess_id' => $this->input->post('mess_id'),
			'date' => $this->input->post('date'),
			'meal_time' => $this->input->post('meal_time'),
			'category' => $this->input->post('category'),
			'hygiene' => $this->input->post('hygiene'),
			'pest_control' => $this->input->post('pest_control'),
			'protocols' => $this->input->post('protocols'),
			'food_complaints' => $this->input->post('food_complaints'),
			'suggestions' => $this->input->post('suggestions'),
			'status' => 'pending'
		];
	}

	private function handle_photo_upload()
	{
		$meal_time = $this->input->post('meal_time');
		$upload_path = 'uploads/complaint_photos/';
		$student_name = str_replace(' ', '_', $this->input->post('name'));

		if (!is_dir($upload_path . $student_name)) {
			mkdir($upload_path . $student_name, 0777, true);
		}

		$current_datetime = date("Y-m-d_H-i-s");
		$file_name = "{$current_datetime}_{$meal_time}.jpg";

		$config = [
			'upload_path' => $upload_path . $student_name,
			'allowed_types' => 'jpg|jpeg|png|gif',
			'max_size' => 2048,
			'file_name' => $file_name
		];

		$this->upload->initialize($config);

		if ($this->upload->do_upload('complaint_photo')) {
			return $config['upload_path'] . '/' . $file_name;
		} else {
			$this->session->set_flashdata('error', 'Error uploading photo: ' . $this->upload->display_errors());
			return false;
		}
	}

	private function load_views($main_view, $data)
	{
		$this->load->view('template/header');
		$this->load->view('template/leftnavbar');
		$this->load->view($main_view, $data);
		$this->load->view('template/footer');
	}

	public function pending_complaints()
	{
		if (!$this->session->userdata('user_email')) {
			redirect('login');
			return;
		}

		$email = $this->session->userdata('user_email');
		$data['pending_complaints'] = $this->Complaint_model->get_complaints_by_status($email, 'pending');

		$this->load_views('student_pending_complaint_view', $data);
	}


	public function resolved_complaints()
	{
		if (!$this->session->userdata('user_email')) {
			redirect('login');
			return;
		}
		$email = $this->session->userdata('user_email');
		$data['resolved_complaints'] = $this->Complaint_model->get_resolved_complaints($email);
		$this->load_views('student_resolved_complaint_view', $data);
	}

	public function generate_report($complaint_id)
	{
		if (!$this->session->userdata('user_email')) {
			redirect('login');
			return;
		}

		if (empty($complaint_id)) {
			$this->session->set_flashdata('error', 'Invalid complaint ID.');
			redirect('complaint/pending_complaints');
			return;
		}

		$complaint = $this->Complaint_model->get_complaint_by_id($complaint_id);

		if (empty($complaint)) {
			$this->session->set_flashdata('error', 'Complaint not found.');
			redirect('complaint/pending_complaints');
			return;
		}

		$data = [
			'id' => $complaint_id,
			'created_at' => $complaint['created_at'] ?? 'Unknown',
			'status' => $complaint['status'] ?? 'Unknown',
			'email' => $complaint['email'] ?? 'Not Provided',
			'phone' => $complaint['phone'] ?? 'Not Provided',
			'campus' => $complaint['campus'] ?? 'Unknown',
			'college' => $complaint['college'] ?? 'Unknown',
			'date' => $complaint['date'] ?? 'Unknown',
			'meal_time' => $complaint['meal_time'] ?? 'Unknown',
			'mess' => $complaint['mess'] ?? 'Unknown',
			'category' => $complaint['category'] ?? 'Unknown',
			'hygiene' => $complaint['hygiene'] ?? 'Unknown',
			'pest_control' => $complaint['pest_control'] ?? 'Unknown',
			'protocols' => $complaint['protocols'] ?? 'Unknown',
			'food_complaints' => $complaint['food_complaints'] ?? 'Not Available',
			'suggestions' => $complaint['suggestions'] ?? 'Not Available',
			'witnesses' => $complaint['witnesses'] ?? 'None',
			'previous_complaints' => $complaint['previous_complaints'] ?? 'None',
			'photos' => $complaint['photos'] ?? []
		];

		$this->load->view('complaint_report_view', $data);
	}

	public function logout()
	{
		$this->session->unset_userdata('user_email');
		$this->session->sess_destroy();
		redirect('login');
	}

//Debugging functions
}
