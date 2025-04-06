<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update_Menu extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Menu_model');
        // Assuming vendor login session check
        if (!$this->session->userdata('user_id')) {
            redirect('admin_login');
        }
    }

    public function index() {
        $data['page_title'] = 'Update Menu';

        // Get date and mess_id from GET, fallback to defaults
        $date = $this->input->get('date') ?: date('Y-m-d');
        $mess_id = $this->input->get('mess_id') ?: 1;

        // Fetch data
        $data['menu_items'] = $this->Menu_model->get_menu($date, $mess_id);
        $data['messes'] = $this->Menu_model->get_messes();
        $data['menu_items_all'] = $this->Menu_model->get_all_menu_items();
        $data['selected_date'] = $date;
        $data['selected_mess_id'] = $mess_id;

        // Load views
        $this->load->view('template/header', $data);
        $this->load->view('template/leftnavbar', $data); // Assuming a vendor sidebar exists
        $this->load->view('update_menu_view', $data);
        $this->load->view('template/footer');
    }

    public function update_menu() {
        $date = $this->input->post('date');
        $mess_id = $this->input->post('mess_id');
        $meal_type = $this->input->post('meal_type');
        $food_ids = $this->input->post('food_ids');

        if ($date && $mess_id && $meal_type && $food_ids) {
            $this->Menu_model->update_menu($date, $mess_id, $meal_type, $food_ids);
            $this->session->set_flashdata('success', 'Menu updated successfully!');
        } else {
            $this->session->set_flashdata('error', 'All fields are required.');
        }

        redirect('update_menu?date=' . $date . '&mess_id=' . $mess_id);
    }

    public function add_food() {
        $food_name = $this->input->post('food_name');
        $nutrition = $this->input->post('nutrition');

        if ($food_name && $nutrition !== '') {
            $this->Menu_model->add_food_item($food_name, $nutrition);
            $this->session->set_flashdata('success', 'Food item added successfully!');
        } else {
            $this->session->set_flashdata('error', 'Food name and nutrition are required.');
        }

        redirect('update_menu');
    }
}