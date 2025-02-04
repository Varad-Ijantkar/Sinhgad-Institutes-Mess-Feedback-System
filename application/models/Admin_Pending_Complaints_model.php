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
	public function get_pending_complaints()
	{
		$this->db->select('
        complaints.id, 
        complaints.food_complaints AS description, 
        complaints.created_at AS date, 
        complaints.name, 
        messes.mess_name AS mess, 
        campus.campus_name AS campus
    ');
		$this->db->from('complaints');
		$this->db->join('messes', 'complaints.mess_id = messes.mess_id', 'left');
		$this->db->join('campus', 'complaints.campus_id = campus.campus_id', 'left');
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
}
