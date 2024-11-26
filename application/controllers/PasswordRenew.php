<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PasswordRenew extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PasswordRenew_model'); // Model for password renewal
		$this->load->library('session');
	}

	public function index()
	{
		// Check if user is logged in and flagged as temp password
		if (!$this->session->userdata('user_email') || !$this->session->userdata('is_temp_password')) {
			redirect('login'); // Redirect to login page if unauthorized
		}

		// Load the password renewal view
		$this->load->view('template/header');
		$this->load->view('password_renew_view');
		$this->load->view('template/footer');
	}

	public function update_password()
	{
		// Validate the session
		$email = $this->session->userdata('user_email');
		$is_temp_password = $this->session->userdata('is_temp_password');

		if (!$email || !$is_temp_password) {
			redirect('login');
		}

		// Fetch new password input
		$new_password = $this->input->post('new_password', true);
		$confirm_password = $this->input->post('confirm_password', true);

		// Validate input
		if ($new_password !== $confirm_password) {
			$this->session->set_flashdata('error', 'Passwords do not match.');
			redirect('passwordrenew');
		}

		// Update the password in the correct table
		$result = $this->PasswordRenew_model->update_password($email, $new_password);

		if ($result) {
			// Clear temp password session and allow normal login
			$this->session->unset_userdata('is_temp_password');
			$this->session->set_flashdata('success', 'Password updated successfully. Please log in.');
			redirect('login');
		} else {
			$this->session->set_flashdata('error', 'Failed to update password. Please try again.');
			redirect('passwordrenew');
		}
	}
}
