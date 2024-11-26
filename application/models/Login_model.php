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
		// Query to find user with matching email and password
		$this->db->where('email', $email);
		$this->db->where('password', $password); // Assuming plain text password
		$query = $this->db->get('student_login');

		if ($query->num_rows() > 0) {
			return $query->row(); // Return the user object if found
		} else {
			return false; // Return false if no match
		}
	}
}
