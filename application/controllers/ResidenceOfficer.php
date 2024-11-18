<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ResidenceOfficer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->model('Access_model');
        $this->load->model('Student_Info_model'); // Load the Student_Info_model to handle student info
    }

    // View for uploading student details
    public function upload_student_details()
    {
        $user_email = $this->session->userdata('user_email');
        $data['user_email'] = $user_email;

        $this->load->view('template/header');
        $this->load->view('template/adminnavbar', $data);
        $this->load->view('upload_student_details', $data);
    }

    // Handle the CSV upload
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
        redirect('ResidenceOfficer/upload_student_details');
    }

    // Manage access for Vendors and Supervisors
    public function manage_access()
    {
        $user_email = $this->session->userdata('user_email');
        $data['user_email'] = $user_email;
        $data['message'] = $this->session->flashdata('message');

        $this->load->view('template/header');
        $this->load->view('template/adminnavbar', $data);
        $this->load->view('manage_access', $data);
    }
    // Handle form submission for adding or removing access
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

        redirect('ResidenceOfficer/manage_access');
    }
}
