<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
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
            // Step 1: Email and password submission
            if ($this->input->post('email') && $this->input->post('password') && !$this->input->post('otp')) {
                $email = $this->input->post('email');
                $password = $this->input->post('password');

                // Check if email and password match a record in the database
                if ($this->Login_model->validate_user($email, $password)) {
                    // User exists, generate OTP
                    $this->session->set_userdata('otp', 1234); // For simplicity, using a static OTP for now
                    $this->session->set_userdata('user_email', $email);  // Store email in session

                    // OTP was "sent" (in real case, you'd send it via email or SMS)
                    $data['otpSent'] = true;
                    $data['email'] = $email; // Pass email back to view
                } else {
                    $data['error'] = "Invalid email or password. Please try again.";
                    $data['email'] = $email; // Keep email filled even in case of error
                }
            }

            // Step 2: OTP submission
            if ($this->input->post('otp')) {
                $otp = $this->input->post('otp');

                // Verify OTP
                if ($otp == $this->session->userdata('otp')) {
                    // Successful login, redirect to complaintform.php
                    redirect('complaint');
                    exit(); // Make sure to stop script execution after redirection
                } else {
                    // Invalid OTP
                    $data['error'] = "Invalid OTP. Please try again.";
                    $data['otpSent'] = true; // Keep OTP field visible
                    $data['email'] = $this->session->userdata('user_email'); // Preserve email
                }
            }
        }
        $this->load->view('template/header');
        $this->load->view('login_view', $data);
        $this->load->view('template/footer');
    }
}
