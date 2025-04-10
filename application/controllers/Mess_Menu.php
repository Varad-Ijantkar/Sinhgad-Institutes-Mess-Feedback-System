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
        $data['page_title'] = 'Mess Menu';

        $date = $this->input->get('date') ?: date('Y-m-d');
        $mess_id = $this->input->get('mess_id') ?: 1;

        log_message('debug', "Fetching menu for Date: $date, Mess ID: $mess_id");

        $data['menu_items'] = $this->Menu_model->get_menu($date, $mess_id);
        $data['messes'] = $this->Menu_model->get_messes();
        $data['selected_date'] = $date;
        $data['selected_mess_id'] = $mess_id;

        log_message('debug', 'Fetched Menu Items: ' . json_encode($data['menu_items']));

        $this->load->view('template/header', $data);
        $this->load->view('template/leftnavbar');
        $this->load->view('mess_menu_view', $data);
        $this->load->view('template/footer');
    }
}