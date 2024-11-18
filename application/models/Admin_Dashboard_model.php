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
        $this->db->where('status', 'resolved');
        return $this->db->get('complaints')->result_array();
    }

    // Fetch total complaints data (both pending and resolved)
    public function get_total_complaints()
    {
        // Select the correct fields, replacing 'description' with 'food_complaints'
        $this->db->select('id, name, mess, date, campus, status, food_complaints');
        $query = $this->db->get('complaints');
        return $query->result_array();
    }

}