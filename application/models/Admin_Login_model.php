<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Login_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // Validate the admin's login credentials
    public function validate_login($email, $password, $role)
    {
        // Query the database to check for the admin credentials
        $this->db->where('email', $email);
        $this->db->where('role', $role); // Ensure to check the role

        $query = $this->db->get('admin_login'); // Replace 'admin_users' with your actual admin table name

        if ($query->num_rows() == 1) {
            $user = $query->row();
            // Directly compare the password
            if ($user->password === $password) {
                return $user; // Return user data if found
            }
        }
        return false; // Return false if no match is found
    }
}
