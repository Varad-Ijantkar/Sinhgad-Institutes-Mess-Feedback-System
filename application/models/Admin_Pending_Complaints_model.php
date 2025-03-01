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
        complaints.email, 
        complaints.name, 
        complaints.mess_id, 
        messes.mess_name AS mess, 
        campus.campus_name AS campus,
        complaints.meal_time, 
        complaints.category, 
        complaints.date
    ');
		$this->db->from('complaints');
		$this->db->join('messes', 'complaints.mess_id = messes.mess_id', 'left');
		$this->db->join('campus', 'complaints.campus_id = campus.campus_id', 'left');
		$this->db->where('complaints.status', 'pending');

		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_completed_complaints()
	{
		$this->db->select('
        complaints.id, 
        complaints.name, 
        complaints.mess_id, 
        messes.mess_name AS mess, 
        complaints.campus_id, 
        campus.campus_name AS campus, 
        complaints.meal_time, 
        complaints.date, 
        complaints.accepted_at, 
        complaints.resolved_at, 
        complaints.vendor_id, 
        admin_login.name AS vendor_name, 
        complaints.status
    ');
		$this->db->from('complaints');
		$this->db->join('messes', 'complaints.mess_id = messes.mess_id', 'left');
		$this->db->join('campus', 'complaints.campus_id = campus.campus_id', 'left');
		$this->db->join('admin_login', 'complaints.vendor_id = admin_login.id', 'left');
		$this->db->where_in('complaints.status', ['completed', 'resolved']);

		$query = $this->db->get();
		return $query->result_array();
	}

	public function mark_as_resolved($complaint_id)
	{
		$data = [
			'status' => 'resolved', // Lowercase to match ENUM and view
			'resolved_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		];
		$this->db->where('id', $complaint_id);
		$this->db->where('status', 'completed');
		return $this->db->update('complaints', $data);
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
	public function get_vendors() {
		$this->db->where('role_id', 1); // Adjust role_id for Vendor
		$this->db->where('active', 1);
		$query = $this->db->get('admin_login');
		return $query->result_array();
	}

	public function get_all_campuses()
	{
		$query = $this->db->select('campus_id, campus_name')->from('campus')->get();
		return $query->result_array();
	}

	public function assign_complaint($complaint_id, $vendor_id, $priority, $supervisor_id) {
		$data = [
			'vendor_id' => $vendor_id,
			'supervisor_id' => $supervisor_id,
			'priority' => $priority,
			'status' => 'assigned',
			'updated_at' => date('Y-m-d H:i:s')
		];
		$this->db->where('id', $complaint_id);
		return $this->db->update('complaints', $data);
	}

	public function accept_complaint($complaint_id)
	{
		$data = [
			'status' => 'in progress',
			'accepted_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		];
		$this->db->where('id', $complaint_id);
		$this->db->where('status', 'assigned'); // Ensure it’s only updated if still assigned
		return $this->db->update('complaints', $data);
	}

	public function mark_as_completed($complaint_id, $remarks)
	{
		$data = [
			'status' => 'completed',
			'updated_at' => date('Y-m-d H:i:s'),
			 'remarks' => $remarks
		];
		$this->db->where('id', $complaint_id);
		return $this->db->update('complaints', $data);
	}

}
