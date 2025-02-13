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
		$data['error'] = ""; // To store any error messages

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$otp = $this->input->post('otp');

			if ($email && $password && !$otp) {  // Step 1: Email and password submission
				$user = $this->Login_model->validate_user($email, $password);

				if ($user) {
					if ($user->is_temp_password == 1) {
						$this->session->set_userdata('user_email', $user->email);
						$this->session->set_userdata('is_temp_password', 1);
						redirect('passwordrenew');
					}

					// Store student_id and mess details in session
					$this->session->set_userdata('student_id', $user->id);
					$this->session->set_userdata('mess_id', $user->mess_id);  // Fix: Use mess_id
					$this->session->set_userdata('mess_name', $user->mess_name); // Fix: Use mess_name

					// Generate OTP and store it in session
					$this->session->set_userdata('otp', $user->otp);
					$this->session->set_userdata('user_email', $email);

					$data['otpSent'] = true;
					$data['email'] = $email;
				} else {
					$data['error'] = "Invalid email or password. Please try again.";
					$data['email'] = $email;
				}
			}

			if ($otp) {  // Step 2: OTP verification
				if ($otp == $this->session->userdata('otp')) {
					redirect('student_dashboard');
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
