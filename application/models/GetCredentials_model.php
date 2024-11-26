<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GetCredentials_model extends CI_Model
{
	/**
	 * Check if the email exists in either the admin_login or student_login table.
	 * @param string $email The email to search for.
	 * @return array|false Returns user data as an associative array if found, or false if not found.
	 */
	public function get_user_by_email($email)
	{
		$this->db->where('email', $email);
		$query1 = $this->db->get('admin_login');
		if ($query1->num_rows() > 0) {
			return ['table' => 'admin_login', 'user' => $query1->row_array()];
		}

		$query2 = $this->db->get('student_login');
		if ($query2->num_rows() > 0) {
			return ['table' => 'student_login', 'user' => $query2->row_array()];
		}

		return false; // Email not found
	}

	/**
	 * Update the user's password to the new temporary password.
	 * @param string $email The email of the user to update.
	 * @param string $temp_password The temporary password to set.
	 * @param string $table The table name to update (admin_login or student_login).
	 * @return bool Returns true if the password was successfully updated, false otherwise.
	 */
	public function update_password($table, $email, $temp_password)
	{
		$this->db->set('password', $temp_password);
		$this->db->set('is_temp_password', 1); // Flag the password as temporary
		$this->db->where('email', $email);
		$this->db->update($table); // Update the specific table (admin_login or student_login)

		return $this->db->affected_rows() > 0;
	}
}
