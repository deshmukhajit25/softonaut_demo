<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public $softn_session;
    function __construct() {
        parent::__construct();
        $this->softn_session = $this->session->userdata('sipl_session');
        if (!isset($this->softn_session) || $this->softn_session['user_id'] == '') {
            redirect(base_url(), 'refresh');
        } else {
            // $this->load->model('common_model');
        }
        //$this->load->model('dashboard_model');
    }
    public function index() {
        $data['module_id'] = '1';
        $data['username'] = $this->softn_session['username'];
        $this->load->view('dashboard/index', $data);
    }
}
