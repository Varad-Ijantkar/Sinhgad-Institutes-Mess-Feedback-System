<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mess_Menu extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Menu_model');
        if (!$this->session->userdata('user_email')) {
            redirect('login');
        }
    }

    public function index() {
        $data['title'] = 'Mess Menu';

        // Get date and mess_id from GET, fallback to defaults
        $date = $this->input->get('date') ?: date('Y-m-d'); // Today by default
        $mess_id = $this->input->get('mess_id') ?: 1;       // Mess 1 by default

        // Log inputs for debugging
        log_message('debug', "Date: $date, Mess ID: $mess_id");

        // Fetch data
        $data['menu_items'] = $this->Menu_model->get_menu($date, $mess_id);
        $data['messes'] = $this->Menu_model->get_messes();
        $data['selected_date'] = $date;
        $data['selected_mess_id'] = $mess_id;

        // Log fetched data for debugging
        log_message('debug', 'Menu Items: ' . json_encode($data['menu_items']));

        // Load views
        $this->load->view('template/header', $data);
        $this->load->view('template/leftnavbar');
        $this->load->view('mess_menu_view', $data);
        $this->load->view('template/footer');
    }
}