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
			$login_data = $query->row(); // Get student_login row

			// Fetch student info and join messes table to get mess_name
			$this->db->select('student_info.id, student_info.mess_id, COALESCE(messes.mess_name, "Unknown") as mess_name');
			$this->db->from('student_info');
			$this->db->join('messes', 'student_info.mess_id = messes.mess_id', 'left'); // Use mess_id for proper join
			$this->db->where('student_info.email', $email);
			$student_query = $this->db->get();

			if ($student_query->num_rows() > 0) {
				$student_info = $student_query->row();

				// Combine login data and student info
				$login_data->id = $student_info->id;               // student_id
				$login_data->mess_id = $student_info->mess_id;     // mess_id
				$login_data->mess_name = $student_info->mess_name; // mess_name

				return $login_data; // Return combined user object
			} else {
				log_message('error', 'Student info not found for email: ' . $email);
			}
		} else {
			log_message('error', 'Login failed for email: ' . $email);
		}

		return false; // Return false if no match
	}
}
