<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_Login_model');
		$this->load->library('session');
		$this->load->helper('url'); // Load URL helper
		$this->load->helper('form'); // Load form helper for form-related functions
		$this->load->library('form_validation'); // Load form validation library
	}

	public function index()
	{
		// Initialize error message and load the admin login view
		$data['login_error'] = ""; // Clear any previous error
		$this->load->view('template/header');
		$this->load->view('admin_login_view', $data);
		$this->load->view('template/footer');
	}

	public function login()
	{
		// Form validation rules
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');

		// Run validation
		if ($this->form_validation->run() == FALSE) {
			// If validation fails, return to the login view with errors
			$data['login_error'] = validation_errors();
			$this->load->view('template/header');
			$this->load->view('admin_login_view', $data);
			$this->load->view('template/footer');
		} else {
			// Retrieve form input data
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			// Validate login credentials via model
			$user = $this->Admin_Login_model->validate_login($email, $password);

			if ($user) {
				// Check if the user is using a temporary password
				if ($user->is_temp_password == 1) {
					// Redirect to password renewal
					$this->session->set_userdata('user_email', $user->email);
					$this->session->set_userdata('is_temp_password', 1);
					redirect('passwordrenew');
				}

				// Check if user is active
				if ($user->active == 0) {
					$data['login_error'] = "Your account is deactivated. Please contact support.";
					$this->load->view('template/header');
					$this->load->view('admin_login_view', $data);
					$this->load->view('template/footer');
				} else {
					// Set session data with the role fetched from the database
					$this->session->set_userdata('user_id', $user->id);
					$this->session->set_userdata('user_email', $user->email);
					$this->session->set_userdata('user_role', $user->role_name);
					$this->session->set_userdata('college_id', $user->college_id);
					$this->session->set_userdata('campus_id', $user->campus_id);

					redirect('admin_dashboard');
				}
			} else {
				// If login fails, reload login view with error message
				$data['login_error'] = "Invalid email or password!";
				$this->load->view('template/header');
				$this->load->view('admin_login_view', $data);
				$this->load->view('template/footer');
			}
		}
	}

}
