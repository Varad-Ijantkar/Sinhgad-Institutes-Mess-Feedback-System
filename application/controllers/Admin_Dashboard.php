<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_Dashboard_model'); // Load admin dashboard model
        $this->load->model('Access_model'); // Load access model for managing access
        $this->load->model('Student_Info_model'); // Load the Student_Info_model to handle student info
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
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
    
    public function view_student_details()
    {
        // Set the user's email for the profile section
        $user_email = $this->session->userdata('user_email');
        $data['user_email'] = $user_email;

        // Fetch student details
        $data['students'] = $this->Student_Info_model->get_all_students();

        // Load views
        $this->load->view('template/header', $data);
        $this->load->view('template/adminnavbar', $data);
        $this->load->view('view_student_details', $data);
    }

        // View for uploading student details
    public function upload_student_details()
    {
        // Set the user's email for the profile section
        $user_email = $this->session->userdata('user_email');
        $data['user_email'] = $user_email;

        // Load views
        $this->load->view('template/header');
        $this->load->view('template/adminnavbar', $data);
        $this->load->view('upload_student_details', $data);
    }

    public function upload_csv()
    {
        if (isset($_FILES['csv_file']['name']) && $_FILES['csv_file']['error'] == 0) {
            $file = $_FILES['csv_file']['tmp_name'];
            $handle = fopen($file, "r");
            $header = true;

            // Process each row of the CSV
            while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if ($header) {
                    $header = false;  // Skip header row
                } else {
                    // Prepare data from the CSV row
                    $data = array(
                        'email' => $row[0],
                        'name' => $row[1],
                        'phone' => $row[2],
                        'college' => $row[3],
                        'campus' => $row[4],
                        'mess' => $row[5]
                    );
                    // Insert student info into the database
                    $this->Student_Info_model->insert_student($data);
                }
            }
            fclose($handle);
            $this->session->set_flashdata('success', 'CSV file uploaded successfully.');
        } else {
            $this->session->set_flashdata('error', 'Please upload a valid CSV file.');
        }
        redirect('Admin_Dashboard/upload_student_details');
    }

    public function manage_access()
    {
        // Set the user's email for the profile section
        $user_email = $this->session->userdata('user_email');
        $data['user_email'] = $user_email;
        $data['message'] = $this->session->flashdata('message');

        // Load views
        $this->load->view('template/header');
        $this->load->view('template/adminnavbar', $data);
        $this->load->view('manage_access', $data);
    }

    public function submit_access()
    {
        $email = $this->input->post('email');
        $role = $this->input->post('role');
        $action = $this->input->post('action');

        if ($action == 'Activate') {
            // Activate access
            $result = $this->Access_model->activate_access($email, $role);
        } else if ($action == 'Deactivate') {
            // Deactivate access
            $result = $this->Access_model->deactivate_access($email, $role);
        }

        if ($result) {
            $this->session->set_flashdata('message', 'Access ' . $action . 'd successfully.');
        } else {
            $this->session->set_flashdata('message', 'Failed to ' . $action . ' access. Please try again.');
        }
        
        redirect('Admin_Dashboard/manage_access');
    }

    public function mess_ratings() {
        $this->load->model('Mess_Ratings_model');
        $data['mess_ratings'] = $this->Mess_Ratings_model->get_mess_ratings();
        $user_email = $this->session->userdata('user_email');
        $data['user_email'] = $user_email;

        $this->load->view('template/header');
        $this->load->view('template/adminnavbar', $data);
        $this->load->view('mess_ratings', $data);
    }

	public function edit_student_details($id) {
		$this->load->model('Student_Info_model'); // Load the correct model
		$user_email = $this->session->userdata('user_email');
		$data['user_email'] = $user_email;

		// Check if form is submitted
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			// Collect form data with correct column names
			$update_data = array(
				'name'       => $this->input->post('name'),
				'email'      => $this->input->post('email'),
				'phone'      => $this->input->post('phone'),
				'college_id' => $this->input->post('college'), // Use correct column name
				'campus_id'  => $this->input->post('campus'),
				'mess_id'    => $this->input->post('mess')
			);

			// Update student details in the database
			$updated = $this->Student_Info_model->update_student_by_id($id, $update_data);

			// Set flashdata for success message
			if ($updated) {
				$this->session->set_flashdata('success', 'Student details updated successfully!');
			} else {
				$this->session->set_flashdata('error', 'Failed to update student details.');
			}

			// Redirect back to the edit page
			redirect("admin_dashboard/edit_student_details/$id");
		}

		// Fetch student details by ID with proper joins
		$data['student'] = $this->Student_Info_model->get_student_by_id($id);

		// Fetch college, campus, and mess options
		$data['options'] = $this->Student_Info_model->get_registration_options();

		// Load the edit student details view
		$this->load->view('template/header');
		$this->load->view('template/adminnavbar', $data);
		$this->load->view('edit_student_details', $data);
	}

    
        // Add this function to your Admin_Dashboard Controller
	public function register_student() {
		$this->load->model('Student_Info_model'); // Load the model
		$user_email = $this->session->userdata('user_email');
		$data['user_email'] = $user_email;

		// Check if form is submitted
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			// Fetch input data from the form and sanitize
			$student_data = array(
				'name'      => trim($this->input->post('name', true)),
				'email'     => trim($this->input->post('email', true)),
				'phone'     => trim($this->input->post('phone', true)),
				'college_id'=> $this->input->post('college', true),
				'campus_id' => $this->input->post('campus', true),
				'mess_id'   => $this->input->post('mess', true),
			);

			// Basic validation for required fields
			if (empty($student_data['name']) || empty($student_data['email']) || empty($student_data['phone']) || empty($student_data['college_id']) || empty($student_data['campus_id']) || empty($student_data['mess_id'])) {
				$this->session->set_flashdata('error', 'All fields are required. Please fill in all the details.');
				redirect('admin_dashboard/register_student');
			}

			// Validate email format
			if (!filter_var($student_data['email'], FILTER_VALIDATE_EMAIL)) {
				$this->session->set_flashdata('error', 'Invalid email address. Please provide a valid email.');
				redirect('admin_dashboard/register_student');
			}

			// Validate phone number (example: 10 digits)
			if (!preg_match('/^[0-9]{10}$/', $student_data['phone'])) {
				$this->session->set_flashdata('error', 'Invalid phone number. Please enter a 10-digit number.');
				redirect('admin_dashboard/register_student');
			}

			// Attempt to insert data into the database
			if ($this->Student_Info_model->add_student($student_data)) {
				$this->session->set_flashdata('success', 'Student registered successfully!');
			} else {
				$this->session->set_flashdata('error', 'Failed to register the student. Please try again.');
			}

			// Redirect back to the registration form
			redirect('admin_dashboard/register_student');
		}

		// ✅ Fetch college, campus, and mess options in a single query
		$data['options'] = $this->Student_Info_model->get_registration_options();
		// Debugging
		$this->load->view('template/header');
		$this->load->view('template/adminnavbar', $data);
		$this->load->view('register_student_view', $data);
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
