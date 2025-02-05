<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Complaint_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	// Insert a new complaint
	public function insert_complaint($data)
	{
		return $this->db->insert('complaints', $data);
	}

	// Get count of pending complaints for a specific student
	public function get_pending_complaints_count($email)
	{
		$this->db->where('status', 'pending');
		$this->db->where('email', $email);  // Filter by student's email
		return $this->db->count_all_results('complaints');
	}

	// Get count of resolved complaints for a specific student
	public function get_resolved_complaints_count($email)
	{
		$this->db->where('status', 'resolved');
		$this->db->where('email', $email);  // Filter by student's email
		return $this->db->count_all_results('complaints');
	}

	// Get total complaints count for a specific student
	public function get_total_complaints_count($email)
	{
		$this->db->where('email', $email);  // Filter by student's email
		return $this->db->count_all_results('complaints');
	}

	// Get all complaints by status for a specific student
	public function get_complaints_by_status($email, $status)
	{
		$this->db->select('c.id, c.name, c.date, c.food_complaints AS description, 
                       ca.campus_name AS campus, m.mess_name AS mess, col.college_name AS college');
		$this->db->from('complaints c');
		$this->db->join('campus ca', 'ca.campus_id = c.campus_id', 'left');
		$this->db->join('messes m', 'm.mess_id = c.mess_id', 'left');
		$this->db->join('colleges col', 'col.college_id = c.college_id', 'left');
		$this->db->where('c.email', $email);
		$this->db->where('c.status', $status);


		if (!empty($college_id)) {
			$this->db->where('c.college_id', $college_id);
		}
		if (!empty($campus_id)) {
			$this->db->where('c.campus_id', $campus_id);
		}

		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_resolved_complaints($email)
	{
		$this->db->select('c.id, c.name, c.date, c.food_complaints, 
                       ca.campus_name AS campus, m.mess_name AS mess, col.college_name AS college');
		$this->db->from('complaints c');
		$this->db->join('campus ca', 'ca.campus_id = c.campus_id', 'left');
		$this->db->join('messes m', 'm.mess_id = c.mess_id', 'left');
		$this->db->join('colleges col', 'col.college_id = c.college_id', 'left');
		$this->db->where('c.email', $email);
		$this->db->where('c.status', 'resolved');  // Only fetch resolved complaints

		$query = $this->db->get();
		return $query->result();  // Ensuring data is returned as objects
	}



	public function get_complaint_by_id($complaint_id)
	{
		$this->db->where('id', $complaint_id);
		$query = $this->db->get('complaints');

		return $query->row_array();
	}

}
