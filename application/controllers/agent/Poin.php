<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poin extends CI_Controller {


	public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('M_base','base');
        $this->secretkey = $this->config->item('secretkey');
        if($this->session->userdata('is_logged_in') =='')
        {
         $this->session->set_flashdata('msg','Please Login to Continue');
         redirect('Login');
        }
    }


	public function index()
	{
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');
        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');

        $data['main_menu'] = $this->base->main_menu();  
        $body_user = array(
            'userid' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );

        $encrypted_string = $this->encrypt->encode(json_encode($body_user));
        $data_user = array(
            'data' => $encrypted_string 
        );

        $url_profile = 'api/Profile/checkprofile';
        $exec_profile = $this->base->post_curl_token($session_userid,$session_id,$url_profile,$data_user);
        //

        $data['balance'] = $exec_profile['Data']['balance'];
        $data['poin'] = $exec_profile['Data']['poin'];
        $data['username'] = $exec_profile['Data']['username'];
        $this->load->view('menu/Header',$data);
        $this->load->view('agent/poin/Index',$data);
        $this->load->view('menu/Footer',$data);
    }

        
}
