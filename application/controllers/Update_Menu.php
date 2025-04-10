<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update_Menu extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->helper('url');
        $this->load->library('session');

        if (!$this->session->userdata('user_id')) {
            redirect('Admin_Login');
        }
    }

    public function index() {
        $data['food_items'] = $this->Menu_model->get_food_items();
        $data['title'] = 'Update Daily Mess Menu';
        $data['vendor_name'] = $this->session->userdata('name') ?: 'Vendor';
        $data['user_email'] = $this->session->userdata('user_email'); // Add user email to session data
        $mess_id = $this->session->userdata('mess_id') ?: 1;
        $data['mess_info'] = (object) [
            'mess_id' => $mess_id,
            'mess_name' => $this->get_mess_name($mess_id)
        ];
        $data['selected_date'] = date('Y-m-d');

        $this->load->view('template/header', $data);
        $this->load->view('template/adminnavbar', $data);
        $this->load->view('update_menu_view', $data); // Pass $data to the view
    }

    private function get_mess_name($mess_id) {
        $this->db->where('mess_id', $mess_id);
        $query = $this->db->get('messes');
        $mess = $query->row();
        return $mess ? $mess->mess_name : 'Main Mess';
    }

    public function save_menu() {
        $menu_data_json = $this->input->post('menu_data');
        if (!$menu_data_json) {
            echo json_encode(['status' => 'error', 'message' => 'No menu data provided']);
            return;
        }

        $menu_data = json_decode($menu_data_json, true);
        if (json_last_error() !== JSON_ERROR_NONE || !$menu_data) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid JSON data']);
            return;
        }

        $date = $menu_data['date'] ?? null;
        $mess_id = $menu_data['mess_id'] ?? null;
        $meals = $menu_data['meals'] ?? [];

        if (!$date || !$mess_id || empty($meals)) {
            echo json_encode(['status' => 'error', 'message' => 'Missing date, mess_id, or meals']);
            return;
        }

        $menu_items = [];
        foreach ($meals as $meal_type => $items) {
            if (!empty($items)) {
                foreach ($items as $item) {
                    $menu_items[] = [
                        'date' => $date,
                        'meal_type' => ucfirst($meal_type),
                        'mess_id' => $mess_id,
                        'food_id' => $item['food_id'],
                        'created_at' => date('Y-m-d H:i:s')
                    ];
                }
            }
        }

        if (empty($menu_items)) {
            echo json_encode(['status' => 'error', 'message' => 'No valid menu items to save']);
            return;
        }

        if ($this->Menu_model->save_daily_menu($menu_items)) {
            echo json_encode(['status' => 'success', 'message' => 'Menu saved successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to save menu']);
        }
    }

    public function get_menu() {
        $date = $this->input->get('date');
        $mess_id = $this->input->get('mess_id');

        if (!$date || !$mess_id) {
            echo json_encode(['status' => 'error', 'message' => 'Date and mess_id required']);
            return;
        }

        $menu = [
            'breakfast' => $this->Menu_model->get_daily_menu($date, 'Breakfast', $mess_id),
            'lunch' => $this->Menu_model->get_daily_menu($date, 'Lunch', $mess_id),
            'dinner' => $this->Menu_model->get_daily_menu($date, 'Dinner', $mess_id)
        ];

        $formatted_menu = [];
        foreach ($menu as $meal_type => $items) {
            $formatted_menu[$meal_type] = array_map(function($item) {
                $food = $this->Menu_model->get_food_by_id($item['food_id']);
                return [
                    'food_id' => $item['food_id'],
                    'food_name' => $food['food'],
                    'kcal' => (int)$food['nutrition']
                ];
            }, $items);
        }

        echo json_encode(['status' => 'success', 'menu' => $formatted_menu]);
    }

    public function add_food_item() {
        $food_name = $this->input->post('food_name');
        $nutrition = $this->input->post('food_calories');

        if (empty($food_name) || empty($nutrition)) {
            echo json_encode(['status' => 'error', 'message' => 'Food name and calories are required']);
            return;
        }

        $data = [
            'food' => $food_name,
            'nutrition' => $nutrition,
            'created_at' => date('Y-m-d H:i:s')
        ];

        if ($this->Menu_model->add_food_item($data)) {
            $food_id = $this->db->insert_id();
            echo json_encode([
                'status' => 'success',
                'message' => 'Food item added successfully',
                'food_item' => [
                    'food_id' => $food_id,
                    'food' => $food_name,
                    'nutrition' => $nutrition
                ]
            ]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to add food item']);
        }
    }
}