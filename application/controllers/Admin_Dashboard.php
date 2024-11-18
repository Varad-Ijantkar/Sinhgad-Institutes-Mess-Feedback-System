<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_Dashboard_model'); // Load admin dashboard model
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index()
    {
        // Ensure admin is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('Admin_Login');
        }

        // Get complaint counts from the Admin_Dashboard_model
        $data['pending_count'] = $this->Admin_Dashboard_model->get_pending_count();
        $data['resolved_count'] = $this->Admin_Dashboard_model->get_resolved_count();
        $data['total_count'] = $this->Admin_Dashboard_model->get_total_count();

        // Set the user's email for the profile section
        $data['user_email'] = $this->session->userdata('user_email');

        // Load the views, pass $data to all views that require it
        $this->load->view('template/header', $data);
        $this->load->view('template/adminnavbar', $data);
        $this->load->view('admin_dashboard_view', $data);
    }

    public function logout()
    {
        // Unset session data and redirect to login
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_email');
        $this->session->sess_destroy();
        redirect('Admin_Login');
    }
}
