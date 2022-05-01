<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->softn_session = $this->session->userdata('softn_session');
        $this->load->model('login_model');
    }

    public function index() {
        $data['message'] = '';
     
        $this->load->view('register', $data);
    }
    public function submit_data(){
        //    echo '<pre>';
        //    print_r($_POST);exit;
            $Success=1;
            $Message='';
            $profile_img = '';
            $this->load->library('form_validation');
           $this->form_validation->set_error_delimiters($this->config->item('error_delimeter_left'), $this->config->item('error_delimeter_right'));
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback__check_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
//       
        if ($this->form_validation->run() == FALSE) {
            $Message = validation_errors();
            $Success = 0;
        } else {
            $username = trim($this->input->post('username'));
            $userarray = explode(' ',$username);
            $url = "https://softonauts.com/clients/Android/register-user";
            $data=[
                'first_name' => $userarray[0],
                'last_name' => $userarray[1],
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')

            ];
            $apidata = $this->login_model->apidata($url,$data,'POST');
            
            if(isset($apidata['status']) && $apidata['status'] =='1'){
                $Message .= 'Registration Successfully Completed'; 
            }else{
                $Message .= 'Registration Not Completed';
                $Success=0;
            }
        }
        $Rdata['success']=$Success;
        $Rdata['message']=$Message;

        echo json_encode($Rdata);
    }
    function _check_email($email) {
        
        $url = "https://softonauts.com/clients/Android/register-user";
       
        $data = ['email'=>$email];        
      
        $urldata = http_build_query($data);
      
        $getUrl = $url."?".$urldata;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $getUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $response = curl_exec($ch);

        // $apidata = $this->login_model->apidata($url,$data,'GET');
       
        if (count($response) > 0) {
            if (isset($response['status']) && $response['status'] == '1') {
                $this->form_validation->set_message('_check_email', 'Same user already exist or check email');
                return FALSE;
            }
            return TRUE;
        } else {
            return TRUE;
        }
    }
    function _check_login($password) {
        $remember = (bool) $this->input->post('remember');
        $login_flag = $this->validate($this->input->post('email', TRUE), $password, $remember);
        if (!$login_flag) {
            $this->form_validation->set_message('_check_login', 'Invalid email or password');
        }
        return $login_flag;
    }

}
