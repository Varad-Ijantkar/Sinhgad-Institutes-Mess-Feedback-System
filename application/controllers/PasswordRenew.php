<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PasswordRenew extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PasswordRenew_model');
		$this->load->library('session');
	}

	public function index()
	{
		if (!$this->session->userdata('user_email') || !$this->session->userdata('is_temp_password')) {
			redirect('login');
		}

		$this->load->view('template/header');
		$this->load->view('password_renew_view');
		$this->load->view('template/footer');
	}

	public function update_password()
	{
		$email = $this->session->userdata('user_email');
		$is_temp_password = $this->session->userdata('is_temp_password');

		if (!$email || !$is_temp_password) {
			redirect('login');
		}

		$new_password = $this->input->post('new_password', true);
		$confirm_password = $this->input->post('confirm_password', true);

		if ($new_password !== $confirm_password) {
			$this->session->set_flashdata('error', 'Passwords do not match.');
			redirect('passwordrenew');
		}

		$result = $this->PasswordRenew_model->update_password($email, $new_password);

		if ($result) {
			$this->session->unset_userdata('is_temp_password');
			$this->session->set_flashdata('success', 'Password updated successfully. Please log in.');
			redirect('login');
		} else {
			$this->session->set_flashdata('error', 'Failed to update password. Please try again.');
			redirect('passwordrenew');
		}
	}
}
