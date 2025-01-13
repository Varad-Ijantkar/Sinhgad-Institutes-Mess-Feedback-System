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
		$this->db->select('id, food_complaints AS description, created_at AS date, name, mess, campus');
		$this->db->where('status', 'pending'); // Filter for pending complaints
		$query = $this->db->get('complaints');
		return $query->result_array(); // Return results as an array
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
