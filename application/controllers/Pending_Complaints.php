<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pending_Complaints extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pending_Complaints_model'); // Load the model for pending complaints
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index()
    {
        // Ensure the user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('Admin_Login');
        }

        // Fetch pending complaints from the model
        $data['pending_complaints'] = $this->Pending_Complaints_model->get_pending_complaints();

        // Set the user's email for the profile section
        $data['user_email'] = $this->session->userdata('user_email');

        // Load the views without the dashboard cards
        $this->load->view('template/header', $data);
        $this->load->view('template/adminnavbar', $data);
        $this->load->view('pending_complaints_view', $data); // Load pending complaints table view
    }
}
