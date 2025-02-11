<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Resolved_Complaints extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_Dashboard_model');
		$this->load->model('Admin_Pending_Complaints_model'); // Added this model for mess and college data
		$this->load->library('session');
		$this->load->helper('url');
	}

	public function index()
	{
		// Ensure admin is logged in
		if (!$this->session->userdata('user_id')) {
			redirect('Admin_Login');
		}

		// Fetch all necessary data
		$data['resolved_complaints'] = $this->Admin_Dashboard_model->get_resolved_complaints();
		$data['user_email'] = $this->session->userdata('user_email');
		$data['role'] = strtolower($this->session->userdata('user_role'));

		// Add mess and college data for filters
		$data['messes'] = $this->Admin_Pending_Complaints_model->get_all_messes();
		$data['colleges'] = $this->Admin_Pending_Complaints_model->get_all_colleges();

		// Load views
		$this->load->view('template/header', $data);
		$this->load->view('template/adminnavbar', $data);
		$this->load->view('resolved_complaints_view', $data);
	}

	public function generate_report($complaint_id)
	{
		// Validate complaint ID
		if (empty($complaint_id)) {
			$this->session->set_flashdata('error', 'Invalid complaint ID.');
			redirect('Admin_Resolved_Complaints');
		}

		// Fetch complaint data using the model
		$data['complaint'] = $this->Admin_Pending_Complaints_model->get_complaint_by_id($complaint_id);

		// Check if data exists for the provided complaint ID
		if (empty($data['complaint'])) {
			$this->session->set_flashdata('error', 'Complaint not found.');
			redirect('Admin_Resolved_Complaints');
		}

		// Extract data for the view
		$data['id'] = $complaint_id;
		$data['created_at'] = $data['complaint']['created_at'] ?? 'Unknown';
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
}
