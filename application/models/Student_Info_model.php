<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student_Info_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Insert student data into the database (used for CSV upload)
    public function insert_student($data)
    {
        $this->db->insert('student_info', $data);
    }

    // Fetch student data by email (used for autofilling form)
    public function get_student_by_email($email)
    {
        // Query to fetch student data where the email matches
        $this->db->where('email', $email);
        $query = $this->db->get('student_info'); // 'student_info' is the table name

        // Check if any record is found
        if ($query->num_rows() > 0) {
            return $query->row_array(); // Return the student data as an array
        } else {
            return false; // Return false if no student is found
        }
    }
}
