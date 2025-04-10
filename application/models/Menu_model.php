<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_food_items() {
        $query = $this->db->get('menu_items');
        return $query->result();
    }

    public function get_food_by_id($food_id) {
        $this->db->where('food_id', $food_id);
        $query = $this->db->get('menu_items');
        return $query->row_array();
    }

    public function save_daily_menu($data) {
        if (!empty($data)) {
            $date = $data[0]['date'];
            $mess_id = $data[0]['mess_id'];
            $this->db->where('date', $date);
            $this->db->where('mess_id', $mess_id);
            $this->db->delete('daily_menu');
        }
        return $this->db->insert_batch('daily_menu', $data);
    }

    public function get_daily_menu($date, $meal_type, $mess_id) {
        $this->db->where('date', $date);
        $this->db->where('meal_type', $meal_type);
        $this->db->where('mess_id', $mess_id);
        $query = $this->db->get('daily_menu');
        return $query->result_array();
    }

    public function get_messes() {
        $query = $this->db->get('messes');
        return $query->result_array();
    }

    public function get_menu($date, $mess_id) {
        $this->db->select('dm.date, dm.meal_type, mi.food, mi.nutrition');
        $this->db->from('daily_menu dm');
        $this->db->join('menu_items mi', 'dm.food_id = mi.food_id', 'left');
        $this->db->where('dm.date', $date);
        $this->db->where('dm.mess_id', $mess_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function add_food_item($data) {
        return $this->db->insert('menu_items', $data);
    }
}