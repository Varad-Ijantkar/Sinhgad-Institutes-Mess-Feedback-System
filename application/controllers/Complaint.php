<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Complaint extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Complaint_model'); // Load the model for database interaction
		$this->load->model('Student_Info_model'); // Load model to access student info
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');  // Load session library
	}

	// Method to display the complaint form
	public function index()
	{
		// Fetch the logged-in student's email from session
		$email = $this->session->userdata('user_email');

		// Auto-fill data based on student's email
		$student_info = $this->Student_Info_model->get_student_by_email($email);

		// Check if student data is found
		if ($student_info) {
			// Pass student info to the view to auto-fill the form
			$data['student_info'] = $student_info;
		} else {
			// If no student info found, pass an empty array
			$data['student_info'] = array();
		}

		// Load the complaint form view with student info
		$this->load->view('template/header');
		$this->load->view('template/leftnavbar');
		$this->load->view('complaint_view', $data); // Pass $data to the view
		$this->load->view('template/footer');
	}

	// Method to handle complaint submission
	public function submit()
	{
		// Set form validation rules
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required|numeric');
		$this->form_validation->set_rules('college', 'College', 'required');
		$this->form_validation->set_rules('campus', 'Campus', 'required');
		$this->form_validation->set_rules('mess', 'Mess', 'required');
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('meal_time', 'Meal Time', 'required');
		$this->form_validation->set_rules('category', 'Category', 'required');
		$this->form_validation->set_rules('hygiene', 'Hygiene', 'required');
		$this->form_validation->set_rules('pest_control', 'Pest Control', 'required');
		$this->form_validation->set_rules('protocols', 'Protocols', 'required');
		$this->form_validation->set_rules('food_complaints', 'Food Complaints', 'trim');
		$this->form_validation->set_rules('suggestions', 'Suggestions', 'trim');

		if ($this->form_validation->run() == FALSE) {
			// Validation failed, reload form with errors
			$this->load->view('complaint_form');
		} else {
			// Collect form data
			$data = array(
				'email' => $this->input->post('email'),
				'name' => $this->input->post('name'),
				'phone' => $this->input->post('phone'),
				'college' => $this->input->post('college'),
				'campus' => $this->input->post('campus'),
				'mess' => $this->input->post('mess'),
				'date' => $this->input->post('date'),
				'meal_time' => $this->input->post('meal_time'),
				'category' => $this->input->post('category'),
				'hygiene' => $this->input->post('hygiene'),
				'pest_control' => $this->input->post('pest_control'),
				'protocols' => $this->input->post('protocols'),
				'food_complaints' => $this->input->post('food_complaints'),
				'suggestions' => $this->input->post('suggestions'),
				'status' => 'pending'
			);

			// Handle file upload
			if (!empty($_FILES['complaint_photo']['name'])) {
				$meal_time = $this->input->post('meal_time'); // Get the meal type
				$upload_path = 'uploads/complaint_photos/';
				$student_name = str_replace(' ', '_', $this->input->post('name'));

				// Create folder if it doesn't exist
				if (!is_dir($upload_path . $student_name)) {
					mkdir($upload_path . $student_name, 0777, true);
				}

				// Set up the file name as "2024-11-09_08-30-00_breakfast.jpg"
				$current_datetime = date("Y-m-d_H-i-s");
				$file_name = "{$current_datetime}_{$meal_time}.jpg";

				// Upload configuration
				$config['upload_path'] = $upload_path . $student_name;
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['max_size'] = 2048;  // Maximum file size in KB
				$config['file_name'] = $file_name;

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('complaint_photo')) {
					// Save file path to data array
					$data['photo_path'] = $config['upload_path'] . '/' . $file_name;
				} else {
					// Handle upload error
					$this->session->set_flashdata('error', 'Error uploading photo: ' . $this->upload->display_errors());
					redirect('complaint');
				}
			}

			// Insert complaint data
			if ($this->Complaint_model->insert_complaint($data)) {
				$this->session->set_flashdata('success', 'Complaint submitted successfully with photo!');
			} else {
				$this->session->set_flashdata('error', 'Error submitting complaint. Please try again.');
			}

			// Redirect to prevent form resubmission
			redirect('complaint');
		}
	}


	// Method to display pending complaints for the logged-in student
	public function pending_complaints()
	{
		$email = $this->session->userdata('user_email');
		if ($email) {
			$data['pending_complaints'] = $this->Complaint_model->get_complaints_by_status($email, 'pending');
			$this->load->view('template/header');
			$this->load->view('template/leftnavbar');
			// Updated to load the correct view
			$this->load->view('student_pending_complaint_view', $data);
		} else {
			redirect('login');
		}
	}


	// Method to display resolved complaints for the logged-in student
	public function resolved_complaints()
	{
		$email = $this->session->userdata('user_email');
		if ($email) {
			$data['resolved_complaints'] = $this->Complaint_model->get_complaints_by_status($email, 'resolved');
			$this->load->view('template/header');
			$this->load->view('template/leftnavbar');
			// Updated to load the correct view
			$this->load->view('student_resolved_complaint_view', $data);
		} else {
			redirect('login');
		}
	}

	public function generate_report($complaint_id)
	{
		// Validate complaint ID
		if (empty($complaint_id)) {
			$this->session->set_flashdata('error', 'Invalid complaint ID.');
			redirect('complaint/pending_complaints');
		}

		// Load the Complaint model if not already loaded
		$this->load->model('Complaint_model');

		// Fetch complaint data using the model
		$data['complaint'] = $this->Complaint_model->get_complaint_by_id($complaint_id);

		// Check if data exists for the provided complaint ID
		if (empty($data['complaint'])) {
			$this->session->set_flashdata('error', 'Complaint not found.');
			redirect('complaint/pending_complaints');
		}

		// Extract data for the view
		$data['id'] = $complaint_id; // Pass the ID explicitly
		$data['created_at'] = $data['complaint']['created_at'] ?? 'Unknown'; // Check for undefined fields
		$data['status'] = $data['complaint']['status'] ?? 'Unknown';
		$data['email'] = $data['complaint']['email'] ?? 'Not Provided';
		$data['phone'] = $data['complaint']['phone'] ?? 'Not Provided';
		$data['campus'] = $data['complaint']['campus'] ?? 'Unknown';
		$data['college'] = $data['complaint']['college'] ?? 'Unknown';
		$data['date'] = $data['complaint']['date'] ?? 'Unknown';
		$data['meal_time'] = $data['complaint']['meal_time'] ?? 'Unknown';
		$data['mess'] = $data['complaint']['mess'] ?? 'Unknown';
		$data['category'] = $data['complaint']['category'] ?? 'Unknown';
		$data['hygiene'] = $data['complaint']['hygiene'] ?? 'Unknown';
		$data['pest_control'] = $data['complaint']['pest_control'] ?? 'Unknown';
		$data['protocols'] = $data['complaint']['protocols'] ?? 'Unknown';
		$data['food_complaints'] = $data['complaint']['food_complaints'] ?? 'Not Available';
		$data['suggestions'] = $data['complaint']['suggestions'] ?? 'Not Available';
		$data['witnesses'] = $data['complaint']['witnesses'] ?? 'None';
		$data['previous_complaints'] = $data['complaint']['previous_complaints'] ?? 'None';
		$data['photos'] = $data['complaint']['photos'] ?? [];

		// Load the view to display the report
		$this->load->view('complaint_report_view', $data);
	}

	// Method to log out the user
	public function logout()
	{
		// Clear session data
		$this->session->unset_userdata('user_email');
		$this->session->sess_destroy();

		// Redirect to login page or home page
		redirect('login');
	}
}
