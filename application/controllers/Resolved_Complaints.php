<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Resolved_Complaints extends CI_Controller
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

        // Fetch resolved complaints from the model
        $data['resolved_complaints'] = $this->Admin_Dashboard_model->get_resolved_complaints();
        $data['user_email'] = $this->session->userdata('user_email');

        // Load views
        $this->load->view('template/header', $data);
        $this->load->view('template/adminnavbar', $data);
        $this->load->view('resolved_complaints_view', $data); // Resolved complaints view
    }
}
