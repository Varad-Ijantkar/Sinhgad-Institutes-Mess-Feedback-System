<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback_model extends CI_Model
{
	public function insert_feedback($data)
	{
		return $this->db->insert('feedback', $data);
	}

	public function get_mess_name($mess_id)
	{
		$this->db->select('mess_name');
		$this->db->from('messes');
		$this->db->where('mess_id', $mess_id);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row()->mess_name;
		} else {
			return "Unknown Mess";
		}
	}
}
