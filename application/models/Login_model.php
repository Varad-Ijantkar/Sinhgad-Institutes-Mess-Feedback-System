<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	/**
	 * Validate user credentials.
	 *
	 * @param string $email    User's email.
	 * @param string $password User's password (plain text).
	 * @return object|bool     Returns the user object on success, or false on failure.
	 */
	public function validate_user($email, $password)
	{
		// Query to find user in student_login table
		$this->db->where('email', $email);
		$this->db->where('password', $password); // Assuming plain text password
		$query = $this->db->get('student_login');

		if ($query->num_rows() > 0) {
			$login_data = $query->row(); // Get the student_login row

			// Now fetch the student info using the email
			$this->db->where('email', $email);
			$student_query = $this->db->get('student_info');

			if ($student_query->num_rows() > 0) {
				$student_info = $student_query->row();

				// Combine login data and student info
				$login_data->id = $student_info->id;      // student_id
				$login_data->mess = $student_info->mess;  // mess

				return $login_data; // Return combined user object
			}
		}

		return false; // Return false if no match
	}
}
