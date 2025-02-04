<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Dashboard_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Get pending complaints count
    public function get_pending_count()
    {
        $this->db->where('status', 'pending');
        return $this->db->count_all_results('complaints');
    }

    // Get resolved complaints count
    public function get_resolved_count()
    {
        $this->db->where('status', 'resolved');
        return $this->db->count_all_results('complaints');
    }

    // Get total complaints count
    public function get_total_count()
    {
        return $this->db->count_all('complaints');
    }
	public function get_resolved_complaints()
	{
		$this->db->select('
        complaints.id, 
        complaints.food_complaints AS description, 
        complaints.updated_at AS date, 
        complaints.name, 
        messes.mess_name AS mess, 
        campus.campus_name AS campus
    ');
		$this->db->from('complaints');
		$this->db->join('messes', 'complaints.mess_id = messes.mess_id', 'left');
		$this->db->join('campus', 'complaints.campus_id = campus.campus_id', 'left');
		$this->db->where('complaints.status', 'resolved'); // Ensure 'resolved' is lowercase as per DB

		$query = $this->db->get();
		return $query->result_array();
	}


    // Fetch total complaints data (both pending and resolved)
	public function get_total_complaints()
	{
		$this->db->select('
        complaints.id, 
        complaints.name, 
        messes.mess_name AS mess, 
        complaints.created_at AS date, 
        campus.campus_name AS campus, 
        complaints.status, 
        complaints.food_complaints
    ');
		$this->db->from('complaints');
		$this->db->join('messes', 'complaints.mess_id = messes.mess_id', 'left');
		$this->db->join('campus', 'complaints.campus_id = campus.campus_id', 'left');

		$query = $this->db->get();
		return $query->result_array();
	}


	public function mark_as_resolved($complaint_id)
	{
		$this->db->where('id', $complaint_id);
		$this->db->update('complaints', ['status' => 'Resolved', 'updated_at' => date('Y-m-d H:i:s')]);
	}


}
