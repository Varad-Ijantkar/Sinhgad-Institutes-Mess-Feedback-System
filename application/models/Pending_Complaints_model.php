<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pending_Complaints_model extends CI_Model
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
}
