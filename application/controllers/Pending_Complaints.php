<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pending_Complaints extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pending_Complaints_model');
		$this->load->library('session');
		$this->load->helper('url');
	}

	public function index()
	{
		if (!$this->session->userdata('user_id')) {
			redirect('Admin_Login');
		}

		// Fetch pending complaints
		$data['pending_complaints'] = $this->Pending_Complaints_model->get_pending_complaints();
		$data['user_email'] = $this->session->userdata('user_email');
		$data['role'] = strtolower($this->session->userdata('user_role')); // Use 'user_role' here

		// Load the views
		$this->load->view('template/header', $data);
		$this->load->view('template/adminnavbar', $data);
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
			redirect('Pending_Complaints');
		}

		// Fetch complaint ID and mark as resolved
		$complaint_id = $this->input->post('complaint_id');
		if ($complaint_id) {
			$this->Pending_Complaints_model->mark_as_resolved($complaint_id);
			$this->session->set_flashdata('message', 'Complaint resolved successfully!');
		} else {
			$this->session->set_flashdata('error', 'Failed to resolve complaint. Invalid ID.');
		}

		redirect('Pending_Complaints');
	}
}
