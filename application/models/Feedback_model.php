<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback_model extends CI_Model
{
	public function insert_feedback($data)
	{
		return $this->db->insert('feedback', $data);
	}
}
