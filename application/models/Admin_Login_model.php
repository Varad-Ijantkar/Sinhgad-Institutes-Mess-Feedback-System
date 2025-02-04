<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Login_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // Validate the admin's login credentials
	public function validate_login($email, $password)
	{
		$this->db->select('al.id, al.email, al.password, al.active, al.is_temp_password, al.role_id, al.college_id, al.campus_id, r.role_name');
		$this->db->from('admin_login al');
		$this->db->join('role r', 'r.role_id = al.role_id', 'left');
		$this->db->where('al.email', $email);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			$user = $query->row();

			// Check if password matches (modify this if you add hashing)
			if ($user->password === $password) {
				return $user; // Now includes college_id and campus_id
			}
		}
		return false;
	}



}
