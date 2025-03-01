<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Pending_Complaints extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_Pending_Complaints_model');
		$this->load->library('session');
		$this->load->helper('url');
	}

	public function index()
	{
		if (!$this->session->userdata('user_id')) {
			redirect('Admin_Login');
		}
		// Fetch pending complaints
		$data['pending_complaints'] = $this->Admin_Pending_Complaints_model->get_pending_complaints();
		$data['user_email'] = $this->session->userdata('user_email');
		$data['role'] = strtolower($this->session->userdata('user_role')); // Use 'user_role' here
		$data['messes'] = $this->Admin_Pending_Complaints_model->get_all_messes();
		$data['colleges'] = $this->Admin_Pending_Complaints_model->get_all_colleges();
		$data['vendors'] = $this->Admin_Pending_Complaints_model->get_vendors();
		$data['campuses'] = $this->Admin_Pending_Complaints_model->get_all_campuses();
		// Load the views
		$this->load->view('template/adminnavbar', $data);
		$this->load->view('template/header', $data);
		$this->load->view('pending_complaints_view', $data);
	}


	public function mark_as_resolved()
	{
		if (!$this->session->userdata('user_id')) {
			redirect('Admin_Login');
		}

		// Fetch role from session
		$role = strtolower($this->session->userdata('user_role')); // Use 'user_role' here
		if (in_array($role, ['vendor', 'committee', 'campus_director', 'estate_head'])) {
			$this->session->set_flashdata('error', 'You do not have permission to resolve complaints.');
			redirect('Admin_Pending_Complaints');
		}

		// Fetch complaint ID and mark as resolved
		$complaint_id = $this->input->post('complaint_id');
		if ($complaint_id) {
			$this->Admin_Pending_Complaints_model->mark_as_resolved($complaint_id);
			$this->session->set_flashdata('message', 'Complaint resolved successfully!');
		} else {
			$this->session->set_flashdata('error', 'Failed to resolve complaint. Invalid ID.');
		}

		redirect('Admin_Pending_Complaints');
	}

	public function generate_report($complaint_id)
	{
		// Validate complaint ID
		if (empty($complaint_id)) {
			$this->session->set_flashdata('error', 'Invalid complaint ID.');
			redirect('Admin_Resolved_Complaints');
		}

		// Load the Complaint model if not already loaded
		$this->load->model('Admin_Pending_Complaints_model');

		// Fetch complaint data using the model
		$data['complaint'] = $this->Admin_Pending_Complaints_model->get_complaint_by_id($complaint_id);

		// Check if data exists for the provided complaint ID
		if (empty($data['complaint'])) {
			$this->session->set_flashdata('error', 'Complaint not found.');
			redirect('Admin_Resolved_Complaints');
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

	public function assign_complaint() {
		$complaint_id = $this->input->post('complaint_id');
		$vendor_id = $this->input->post('vendor_id');
		$priority = $this->input->post('priority');

		$this->load->model('Admin_Pending_Complaints_model');
		$success = $this->Admin_Pending_Complaints_model->assign_complaint($complaint_id, $vendor_id, $priority, $this->session->userdata('admin_id'));

		if ($success) {
			$this->session->set_flashdata('message', 'Complaint assigned successfully');
		} else {
			$this->session->set_flashdata('error', 'Failed to assign complaint');
		}
		redirect('Admin_Pending_Complaints');
	}
}
