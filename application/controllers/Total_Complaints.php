<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Total_Complaints extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_Dashboard_model'); // Load the Admin Dashboard model
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index()
    {
        // Ensure admin is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('Admin_Login');
        }

        // Fetch total complaints from the model
        $data['total_complaints'] = $this->Admin_Dashboard_model->get_total_complaints();
        $data['user_email'] = $this->session->userdata('user_email');

        // Load views
        $this->load->view('template/header', $data);
        $this->load->view('template/adminnavbar', $data);
        $this->load->view('total_complaints_view', $data); // Total complaints view
		$this->load->view('template/footer',$data);
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
			$this->session->set_flashdata('message', 'Complaint resolved successfully!');
		}

		redirect('Total_Complaints');
	}

}
