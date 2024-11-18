<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function validate_user($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('password', $password); // Assuming password is stored as plain text (not secure!)
        $query = $this->db->get('student_login');

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
