<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Total_Complaints extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_Dashboard_model'); // Load the Admin Dashboard model
		$this->load->model('Admin_Pending_Complaints_model');
		$this->load->library('session');
		$this->load->helper('url');
	}

	public function index()
	{
		// Ensure admin is logged in
		if (!$this->session->userdata('user_id')) {
			redirect('Admin_Login');
		}
		$data['page_title'] = 'Total Complaints';
		// Fetch total complaints from the model
		$data['total_complaints'] = $this->Admin_Dashboard_model->get_total_complaints();
		$data['user_email'] = $this->session->userdata('user_email');
		$data['role'] = strtolower($this->session->userdata('user_role'));

		// Add mess and college data for filters
		$data['messes'] = $this->Admin_Pending_Complaints_model->get_all_messes();
		$data['colleges'] = $this->Admin_Pending_Complaints_model->get_all_colleges();
		$data['campuses'] = $this->Admin_Pending_Complaints_model->get_all_campuses();
		// Load views
		$this->load->view('template/header', $data);
		$this->load->view('template/adminnavbar', $data);
		$this->load->view('total_complaints_view', $data); // Total complaints view
	}

	public function resolve()
	{
		if (!$this->session->userdata('user_id')) {
			redirect('Admin_Login');
		}

		$complaint_id = $this->input->post('complaint_id');
		if ($complaint_id) {
			$this->load->model('Admin_Dashboard_model');
			$this->Admin_Dashboard_model->mark_as_resolved($complaint_id);
			$this->Admin_Pending_Complaints_model->get_all_colleges();
			$this->Admin_Pending_Complaints_model->get_all_messes();
			$this->session->set_flashdata('message', 'Complaint resolved successfully!');
		}

		redirect('Total_Complaints');
	}

}
