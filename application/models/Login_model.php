<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function validate($tusername = NULL, $tpassword = NULL, $remember=FALSE) {
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
    public function apidata($url,$data,$method='') {
        // echo $url;
        // print_r($data);exit;
       
        $respose_data = array();
        if (count((array)$data) > 0 && $url !='') {

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                // if($method=='POST'){
                //     curl_setopt($curl, CURLOPT_POST, 1);
                // }elseif($method=='PUT'){
                //     curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                // }
                
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
               
                $result = curl_exec($ch);
                if(!$result){die("Connection Failure");}
                curl_close($ch);
                $respose_data = json_decode($result, true);
        }else{
            return $respose_data;
        }

    }
    private function remember_user($username,$password)
	{
		if (!$username && !$password)
		{
                    return FALSE;
		}
		setcookie ("member_username",$username,time() + (86400*360), "/","",0);
                setcookie ("member_password",$password,time() + (86400*360), "/","",0);
		return TRUE;
	}

}
