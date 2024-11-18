<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Access_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // Activate access for Vendor or Supervisor
    public function activate_access($email, $role)
    {
        // Set 'active' to 1 to activate the account
        $this->db->set('active', 1);
        $this->db->where('email', $email);
        $this->db->where('role', $role);
        return $this->db->update('admin_login');
    }

    // Deactivate access for Vendor or Supervisor
    public function deactivate_access($email, $role)
    {
        // Set 'active' to 0 to deactivate the account
        $this->db->set('active', 0);
        $this->db->where('email', $email);
        $this->db->where('role', $role);
        return $this->db->update('admin_login');
    }
}
