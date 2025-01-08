<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PasswordRenew_model extends CI_Model
{
	public function update_password($email, $new_password)
	{
		// Check and update admin_login table if the user is an admin
		$this->db->set('password', $new_password);
		$this->db->set('is_temp_password', 0);
		$this->db->where('email', $email);
		$this->db->update('admin_login');

		if ($this->db->affected_rows() > 0) {
			return true; // Password updated in admin_login
		}

		// If not found in admin_login, update student_login
		$this->db->set('password', $new_password);
		$this->db->set('is_temp_password', 0);
		$this->db->where('email', $email);
		$this->db->update('student_login');

		return $this->db->affected_rows() > 0;
	}
}
