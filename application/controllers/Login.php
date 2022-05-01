<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->softn_session = $this->session->userdata('softn_session');
//        $this->load->model('common_model');
    }

    public function index($error = '') {
        $data['message'] = $error;
        if (isset($_COOKIE["SIPL_token"])) {
            $login_secure = explode("///", $_COOKIE["SIPL_token"]);
            if (count($login_secure) > 0) {
                $data['member_username'] = base64_decode($login_secure[0]);
                $data['member_password'] = base64_decode($login_secure[1]);
            }
        }
        $this->load->view('login', $data);
    }
   public function check_session() {
       if (isset($this->softn_session) && $this->softn_session['user_id'] != '') {
           redirect('dashboard', 'refresh');
       }
   }
    public function signIn() {
//        $this->check_session();
        $this->load->model('login_model');
        // set form validation rules
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|max_length[256]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|max_length[72]|callback__check_login');
      
        if ($this->form_validation->run() == TRUE) {
            $remember = $this->input->post('remember', true);
            if ($remember) {
                $encode_username = base64_encode($this->input->post('email'));
                $encode_password = base64_encode($this->input->post('password'));
                $encodedlogin = $encode_username . '///' . $encode_password;
                setcookie("SIPL_token", $encodedlogin, time() + (86400 * 360), "/", "", 0);
            } else {
                if (isset($_COOKIE['SIPL_token'])) {
                    setcookie("SIPL_token", "", time() - 60, "/", "", 0);
                }
            }
            redirect('dashboard', 'refresh');
        } else {
            $error = validation_errors();
            $this->index($error);
        }
    }

    //Validating login from request
    function _check_login($password) {
        $remember = (bool) $this->input->post('remember');
        $login_flag = $this->validate($this->input->post('email', TRUE), $password, $remember);
        if (!$login_flag) {
            $this->form_validation->set_message('_check_login', 'Invalid email or password');
        }
        return $login_flag;
    }
    function validate($tusername = NULL, $tpassword = NULL, $remember=FALSE) {
        $username = $this->security->xss_clean($tusername);
        $password = $this->security->xss_clean($tpassword);
        $db_password = '';
        $login_sucuess = false;
        if ($username && $password) {
            //NORMAL USERS
            if (!$login_sucuess) {

                $aut_key="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MX0.By2r2BwheJsbrEGrHOaMQwrrmlY7wHVFzWtuEmv39fM";

                $url = 'https://softonauts.com/clients/Android/users-login';
           
                $data = ['username'=>$username, 'password'=>$password];

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                //     'Content-Type:application/json',
                //     'App-Key: '.$aut_key
                //     // 'APIKEY:'.$aut_key
                // ));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
               
                $result = curl_exec($ch);
                // if(!$result){die("Connection Failure");}
                curl_close($ch);
                $response = json_decode($result, true);
                if($response['status'] == '1'){
                    $login_sucuess = true;
                    $userdata = $response['data'];
                    $data = array(
                        'user_id' => $userdata['id'],
                        'username' => $userdata['first_name'].' '.$userdata['last_name'],
                        'first_name' => $userdata['first_name'],
                        'last_name' => $userdata['last_name'],
                        'role' => $userdata['role']
                    );
                    $this->session->set_userdata('sipl_session', $data);
                }
            }
          
        }
        return $login_sucuess;
    }

    function logout() {
        $this->session->unset_userdata('softn_session');
        session_destroy();
        redirect('login');
    }

}
