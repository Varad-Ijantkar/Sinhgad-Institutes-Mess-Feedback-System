<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student_Info_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	public function get_all_students() {
		$this->db->select('
        student_info.id,
        student_info.email,
        student_info.name,
        student_info.phone,
        colleges.college_name AS college,
        campus.campus_name AS campus,
        messes.mess_name AS mess
    ');
		$this->db->from('student_info');
		$this->db->join('colleges', 'student_info.college_id = colleges.college_id', 'left');
		$this->db->join('campus', 'student_info.campus_id = campus.campus_id', 'left');
		$this->db->join('messes', 'student_info.mess_id = messes.mess_id', 'left');
		$query = $this->db->get();

		return $query->result();
	}

    // Insert student data into the database (used for CSV upload)
    public function insert_student($data)
    {
        $this->db->insert('student_info', $data);
    }

	public function get_student_by_email($email)
	{
		$this->db->select('
        student_info.email,
        student_info.name,
        student_info.phone,
        student_info.college_id AS student_college_id,    
        student_info.campus_id AS student_campus_id,     
        student_info.mess_id AS student_mess_id,       
        colleges.college_name,
        campus.campus_name,
        messes.mess_name
    ');
		$this->db->from('student_info');
		$this->db->join('colleges', 'colleges.college_id = student_info.college_id', 'left');
		$this->db->join('campus', 'campus.campus_id = student_info.campus_id', 'left');
		$this->db->join('messes', 'messes.mess_id = student_info.mess_id', 'left');
		$this->db->where('student_info.email', $email);
		$query = $this->db->get();

		return $query->row_array();
	}

	public function get_student_by_id($id) {
		$this->db->select('
        student_info.id,
        student_info.email,
        student_info.name,
        student_info.phone,
        student_info.college_id,
        student_info.campus_id,
        student_info.mess_id,
        colleges.college_name AS college,
        campus.campus_name AS campus,
        messes.mess_name AS mess
    ');
		$this->db->from('student_info');
		$this->db->join('colleges', 'student_info.college_id = colleges.college_id', 'left');
		$this->db->join('campus', 'student_info.campus_id = campus.campus_id', 'left');
		$this->db->join('messes', 'student_info.mess_id = messes.mess_id', 'left');
		$this->db->where('student_info.id', $id);
		$query = $this->db->get();

		return $query->row(); // Return single student data
	}

    
    public function update_student_by_id($id, $data) {
        $this->db->where('id', $id); // Specify the row to be updated
        return $this->db->update('student_info', $data); // Perform the update query and return TRUE/FALSE
    }

	public function get_registration_options() {
		$data = [];

		// Fetch colleges
		$this->db->select('college_id, college_name');
		$this->db->from('colleges');
		$this->db->where('college_status', 'enabled'); // Fetch only active colleges
		$query = $this->db->get();
		$data['colleges'] = $query->result_array();

		// Fetch campus
		$this->db->select('campus_id, campus_name');
		$this->db->from('campus');
		$this->db->where('campus_status', 'enabled'); // Fetch only active campuses
		$query = $this->db->get();
		$data['campuses'] = $query->result_array();

		// Fetch messes
		$this->db->select('mess_id, mess_name');
		$this->db->from('messes');
		$this->db->where('mess_status', 'enabled'); // Fetch only active messes
		$query = $this->db->get();
		$data['messes'] = $query->result_array();

		return $data;
	}
	public function add_student($data) {
		return $this->db->insert('student_info', $data);
	}

}
