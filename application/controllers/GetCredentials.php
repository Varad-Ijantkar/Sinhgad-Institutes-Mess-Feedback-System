<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class GetCredentials extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('GetCredentials_model'); // Load the model
		$this->load->library('session'); // Load session library
	}

	public function index()
	{
		// Load the view with header and footer
		$this->load->view('template/header');
		$this->load->view('get_credentials_view');
		$this->load->view('template/footer');
	}

	public function send_credentials()
	{
		$email = $this->input->post('email', true); // Sanitize input

		// Validate email format
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$this->session->set_flashdata('error', 'Invalid email format!');
			redirect('getcredentials');
			return;
		}

		// Check if the email exists in the database
		$user = $this->GetCredentials_model->get_user_by_email($email);

		if (!$user) {
			$this->session->set_flashdata('error', 'Email not found!');
			redirect('getcredentials');
			return;
		}

		// Generate a temporary password
		$temp_password = substr(md5(uniqid(rand(), true)), 0, 8);

		// Update the password in the database
		$password_updated = $this->GetCredentials_model->update_password($user['table'], $email, $temp_password);

		if (!$password_updated) {
			$this->session->set_flashdata('error', 'Failed to update the password. Please try again.');
			redirect('getcredentials');
			return;
		}

		// Initialize PHPMailer
		$mail = new PHPMailer(true);

		try {
			// Server settings
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com'; // Replace with your SMTP host
			$mail->SMTPAuth = true;
			$mail->Username = 'varadijo47@gmail.com'; // Your SMTP username
			$mail->Password = 'jhichrzzrowamqru'; // Your SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
			$mail->Port = 587;

			// Recipients
			$mail->setFrom('varadijo47@gmail.com', 'localhost'); // Replace with your email
			$mail->addAddress($email);

			// Email content
			$mail->isHTML(true);
			$mail->Subject = 'Your Temporary Password';
			$mail->Body = "Dear User,<br><br>Your temporary password is: <b>$temp_password</b><br>Please log in and change your password immediately.<br><br>Thank you.";

			// Send the email
			$mail->send();
			$this->session->set_flashdata('success', 'Temporary password sent successfully!');
		} catch (Exception $e) {
			$this->session->set_flashdata('error', 'Mailer Error: ' . $mail->ErrorInfo);
		}

		redirect('getcredentials');
	}
}
