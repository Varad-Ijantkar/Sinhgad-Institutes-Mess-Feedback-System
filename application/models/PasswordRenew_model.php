<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PasswordRenew_model extends CI_Model
{
	/**
	 * Update password for the user in the appropriate table.
	 * @param string $email The user's email.
	 * @param string $new_password The new password to set.
	 * @return bool Returns true if update is successful, false otherwise.
	 */
	public function update_password($email, $new_password)
	{
		// Check admin_login table first
		$this->db->set('password', $new_password);
		$this->db->set('is_temp_password', 0); // Reset the flag
		$this->db->where('email', $email);
		$this->db->update('admin_login');

		if ($this->db->affected_rows() > 0) {
			return true; // Successfully updated in admin_login
		}

		// If not found in admin_login, check student_login
		$this->db->set('password', $new_password);
		$this->db->set('is_temp_password', 0); // Reset the flag
		$this->db->where('email', $email);
		$this->db->update('student_login');

		return $this->db->affected_rows() > 0; // Return true if updated in student_login
	}
}
