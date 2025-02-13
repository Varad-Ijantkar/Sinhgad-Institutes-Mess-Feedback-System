<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Pending_Complaints_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Fetch all pending complaints
// In Admin_Pending_Complaints_model.php
	public function get_pending_complaints()
	{
		$this->db->select('
        complaints.id, 
        complaints.food_complaints AS description, 
        complaints.date,
        complaints.name,
        complaints.mess_id,
        complaints.college_id,
        complaints.campus_id,
        complaints.meal_time,
        messes.mess_name AS mess,
        campus.campus_name AS campus,
        colleges.college_name AS college 
    ');
		$this->db->from('complaints');
		$this->db->join('messes', 'complaints.mess_id = messes.mess_id', 'left');
		$this->db->join('campus', 'complaints.campus_id = campus.campus_id', 'left');
		$this->db->join('colleges', 'complaints.college_id = colleges.college_id', 'left');
		$this->db->where('complaints.status', 'pending');

		$query = $this->db->get();
		return $query->result_array();
	}

	// Mark a complaint as resolved
	public function mark_as_resolved($complaint_id)
	{
		$this->db->where('id', $complaint_id);
		$this->db->update('complaints', ['status' => 'resolved', 'updated_at' => date('Y-m-d H:i:s')]);
	}
	public function get_complaint_by_id($complaint_id)
	{
		// Query the database for the specific complaint by its ID
		$this->db->where('id', $complaint_id);
		$query = $this->db->get('complaints');

		// Return the result as an associative array or null if not found
		return $query->row_array();
	}

	public function get_all_messes() {
		$query = $this->db->select('mess_id, mess_name')
			->from('messes')  // Replace with your actual table name
			->get();
		return $query->result_array();
	}

	public function get_all_colleges() {
		$query = $this->db->select('college_id, college_name')
			->from('colleges	')  // Replace with your actual table name
			->get();
		return $query->result_array();
	}
}
