<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(['form', 'url']);
		$this->load->library(['form_validation', 'session']);
		$this->load->database();
		$this->load->model('Login_model');
	}

	public function index()
	{
		$data['otpSent'] = false;
		$data['email'] = "";
		$data['error'] = "";

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			// Step 1: Email and password submission
			if ($this->input->post('email') && $this->input->post('password') && !$this->input->post('otp')) {
				$email = $this->input->post('email');
				$password = $this->input->post('password');

				$user = $this->Login_model->validate_user($email, $password);

				if ($user) {
					// Check if temporary password is in use
					if ($user->is_temp_password == 1) {
						// Redirect to password renewal
						$this->session->set_userdata([
							'user_email' => $user->email,
							'is_temp_password' => 1
						]);
						redirect('passwordrenew');
					}

					// Normal login flow with OTP generation
					$this->session->set_userdata('otp', $user->otp);
					$this->session->set_userdata('user_email', $email);
					$data['otpSent'] = true;
					$data['email'] = $email;
				} else {
					$data['error'] = "Invalid email or password. Please try again.";
					$data['email'] = $email;
				}
			}

			// Step 2: OTP verification
			if ($this->input->post('otp')) {
				$otp = $this->input->post('otp');

				if ($otp == $this->session->userdata('otp')) {
					redirect('complaint');
					exit();
				} else {
					$data['error'] = "Invalid OTP. Please try again.";
					$data['otpSent'] = true;
					$data['email'] = $this->session->userdata('user_email');
				}
			}
		}

		$this->load->view('template/header');
		$this->load->view('login_view', $data);
		$this->load->view('template/footer');
	}
}
