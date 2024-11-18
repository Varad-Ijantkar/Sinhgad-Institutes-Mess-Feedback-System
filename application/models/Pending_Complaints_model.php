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
        // Selecting the fields you need for the pending complaints
        $this->db->select('id, food_complaints as description, created_at as date_filed, name, mess, date, campus');
        $this->db->where('status', 'pending');  // Filter for pending complaints
        $query = $this->db->get('complaints');  // Assuming 'complaints' is your table name
        return $query->result_array();  // Return as an array of results
    }

}