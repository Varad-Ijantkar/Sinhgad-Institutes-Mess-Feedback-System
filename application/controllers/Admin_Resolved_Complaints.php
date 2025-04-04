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
		if (!$this->session->userdata('user_id')) {
			redirect('Admin_Login');
		}

		// Fetch completed and resolved complaints
		$data['page_title'] = 'Resolved Complaints';
		$data['resolved_complaints'] = $this->Admin_Pending_Complaints_model->get_completed_complaints();
		$data['messes'] = $this->Admin_Pending_Complaints_model->get_all_messes();
		$data['colleges'] = $this->Admin_Pending_Complaints_model->get_all_colleges();
		$data['campuses'] = $this->Admin_Pending_Complaints_model->get_all_campuses();
		$data['user_email'] = $this->session->userdata('user_email');
		$data['role'] = strtolower($this->session->userdata('user_role'));

		// Debug: Check if data is fetched
		if (empty($data['resolved_complaints'])) {
			log_message('debug', 'No resolved complaints fetched: ' . $this->db->last_query());
		}

		$this->load->view('template/header', $data);
		$this->load->view('template/adminnavbar', $data);
		$this->load->view('resolved_complaints_view', $data);
	}

	public function mark_as_resolved()
	{
		$user_role = $this->session->userdata('user_role');
		if (strtolower($user_role) !== 'supervisor') {
			$this->session->set_flashdata('error', 'Unauthorized access. Your role: ' . $user_role);
			redirect('Admin_Resolved_Complaints');
		}

		$complaint_id = $this->input->post('complaint_id');
		$success = $this->Admin_Pending_Complaints_model->mark_as_resolved($complaint_id);

		log_message('debug', 'Mark as Resolved - Complaint ID: ' . $complaint_id . ', Success: ' . ($success ? 'Yes' : 'No'));
		if (!$success) {
			log_message('error', 'DB Error: ' . $this->db->error()['message']);
		}

		if ($success) {
			$this->session->set_flashdata('message', 'Complaint marked as resolved successfully.');
		} else {
			$this->session->set_flashdata('error', 'Failed to resolve complaint. Error: ' . $this->db->error()['message']);
		}
		redirect('Admin_Resolved_Complaints');
	}

	public function generate_report($complaint_id)
	{
		// Validate complaint ID
		if (empty($complaint_id)) {
			$this->session->set_flashdata('error', 'Invalid complaint ID.');
			redirect('Admin_Assigned_Complaints');
		}

		// Fetch complaint data using the model
		$data['complaint'] = $this->Admin_Pending_Complaints_model->get_complaint_by_id($complaint_id);

		// Check if data exists for the provided complaint ID
		if (empty($data['complaint'])) {
			$this->session->set_flashdata('error', 'Complaint not found.');
			redirect('Admin_Assigned_Complaints');
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
