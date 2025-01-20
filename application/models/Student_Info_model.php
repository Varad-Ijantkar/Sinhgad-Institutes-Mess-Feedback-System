<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student_Info_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	public function get_all_students()
	{
		$query = $this->db->get('student_info');
		return $query->result(); // Return as an array of objects
	}
    // Insert student data into the database (used for CSV upload)
    public function insert_student($data)
    {
        $this->db->insert('student_info', $data);
    }

    // Fetch student data by email (used for autofilling form)
    public function get_student_by_email($email)
    {
        // Query to fetch student data where the email matchesz
        $this->db->where('email', $email);
        $query = $this->db->get('student_info'); // 'student_info' is the table name

        // Check if any record is found
        if ($query->num_rows() > 0) {
            return $query->row_array(); // Return the student data as an array
        } else {
            return false; // Return false if no student is found
        }
    }
    
    public function get_student_by_id($id) {
        $this->db->where('id', $id);
        return $this->db->get('student_info')->row(); // Fetch a single student record
    }
    
    public function update_student_by_id($id, $data) {
        $this->db->where('id', $id); // Specify the row to be updated
        return $this->db->update('student_info', $data); // Perform the update query and return TRUE/FALSE
    }

    // Add this function to your Student_Info_model
    public function add_student($data) {
        return $this->db->insert('student_info', $data); // Insert data into the student_info table
    }

    // Fetch ENUM values for dynamic dropdown options
    public function get_enum_values($table, $column) {
        $query = $this->db->query("SHOW COLUMNS FROM $table LIKE '$column'");
        $row = $query->row();
        preg_match_all("/'([^']+)'/", $row->Type, $enumValues);
        return $enumValues[1];
    }

}