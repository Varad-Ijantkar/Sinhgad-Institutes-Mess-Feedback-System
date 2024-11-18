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
        $this->db->where('email', $email);  // Filter by student's email
        $this->db->where('status', $status);  // Filter by complaint status (pending/resolved)
        $query = $this->db->get('complaints');
        return $query->result();
    }
}
