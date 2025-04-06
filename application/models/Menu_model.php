<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_menu($date, $mess_id) {
        $this->db->select('dm.meal_type, mi.food, mi.nutrition');
        $this->db->from('daily_menu dm');
        $this->db->join('menu_items mi', 'dm.food_id = mi.food_id');
        $this->db->where('dm.date', $date);
        $this->db->where('dm.mess_id', $mess_id);
        $this->db->order_by('dm.meal_type', 'ASC');
        $query = $this->db->get();
        log_message('debug', 'Menu Query: ' . $this->db->last_query());
        return $query->result_array();
    }

    public function get_messes() {
        $this->db->select('mess_id, mess_name');
        $this->db->from('messes');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_all_menu_items() {
        $this->db->select('food_id, food, nutrition');
        $this->db->from('menu_items');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_menu($date, $mess_id, $meal_type, $food_ids) {
        // Delete existing menu for this date, mess, and meal type
        $this->db->where('date', $date);
        $this->db->where('mess_id', $mess_id);
        $this->db->where('meal_type', $meal_type);
        $this->db->delete('daily_menu');

        // Insert new menu items
        $data = [];
        foreach ($food_ids as $food_id) {
            $data[] = [
                'date' => $date,
                'mess_id' => $mess_id,
                'meal_type' => $meal_type,
                'food_id' => $food_id,
                'created_at' => date('Y-m-d H:i:s')
            ];
        }
        if (!empty($data)) {
            $this->db->insert_batch('daily_menu', $data);
        }
    }

    public function add_food_item($food_name, $nutrition) {
        $data = [
            'food' => $food_name,
            'nutrition' => $nutrition,
            'created_at' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('menu_items', $data);
    }
}