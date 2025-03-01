<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Assigned_Complaints extends CI_Controller
{
	public function index()
	{
		if (!$this->session->userdata('user_id')) {
			redirect('Admin_Login');
		}

		// Load the model
		$this->load->model('Admin_Pending_Complaints_model');
		$this->load->model('Admin_Dashboard_model');

		// Fetch data using the consistent model
		$data['assigned_complaints'] = $this->Admin_Dashboard_model->get_assigned_complaints();
		$data['messes'] = $this->Admin_Pending_Complaints_model->get_all_messes();
		$data['colleges'] = $this->Admin_Pending_Complaints_model->get_all_colleges();
		$data['campuses'] = $this->Admin_Pending_Complaints_model->get_all_campuses();
		$data['user_email'] = $this->session->userdata('user_email');
		$data['role'] = $this->session->userdata('user_role');
		// Load views
		$this->load->view('template/adminnavbar', $data);
		$this->load->view('template/header', $data);
		$this->load->view('assigned_complaints_view', $data);
	}

	public function accept_complaint()
	{
		if ($this->session->userdata('user_role') !== 'Vendor') {
			$this->session->set_flashdata('error', 'Unauthorized access.');
			redirect('Admin_Assigned_Complaints');
		}

		$complaint_id = $this->input->post('complaint_id');
		$this->load->model('Admin_Pending_Complaints_model');
		$success = $this->Admin_Pending_Complaints_model->accept_complaint($complaint_id);

		if ($success) {
			$this->session->set_flashdata('message', 'Complaint accepted successfully.');
		} else {
			$this->session->set_flashdata('error', 'Failed to accept complaint. Error: ' . $this->db->error()['message']);
		}
		redirect('Admin_Assigned_Complaints');
	}

	public function mark_as_completed()
	{
		if ($this->session->userdata('user_role') !== 'Vendor') {
			$this->session->set_flashdata('error', 'Unauthorized access.');
			redirect('Admin_Assigned_Complaints');
		}

		$complaint_id = $this->input->post('complaint_id');
		$remarks = $this->input->post('remarks');
		$this->load->model('Admin_Pending_Complaints_model');
		$success = $this->Admin_Pending_Complaints_model->mark_as_completed($complaint_id, $remarks);

		if ($success) {
			$this->session->set_flashdata('message', 'Complaint marked as completed.');
		} else {
			$this->session->set_flashdata('error', 'Failed to mark complaint as completed.');
		}
		redirect('Admin_Assigned_Complaints');
	}

	public function generate_report($complaint_id)
	{
		// Validate complaint ID
		if (empty($complaint_id)) {
			$this->session->set_flashdata('error', 'Invalid complaint ID.');
			redirect('Admin_Assigned_Complaints');
		}

		// Load the model explicitly in this method
		$this->load->model('Admin_Pending_Complaints_model');

		// Fetch complaint data
		$data['complaint'] = $this->Admin_Pending_Complaints_model->get_complaint_by_id($complaint_id);

		// Check if data exists
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

		// Load the report view
		$this->load->view('complaint_report_view', $data);
	}
}
