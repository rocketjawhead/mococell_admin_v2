<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pin extends CI_Controller {


	public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('M_base','bs');
        $this->secretkey = $this->config->item('secretkey');
        if($this->session->userdata('is_logged_in') =='')
        {
         $this->session->set_flashdata('msg','Please Login to Continue');
         redirect('Login');
        }
    }


    public function index(){
        $data['csrf_name'] = $this->security->get_csrf_token_name();
        $data['csrf_token'] = $this->security->get_csrf_hash();
        $this->load->view('login/Pin',$data);
    }


	public function exec_pin(){
    $body_user = array(
        'pin' => $this->input->post('pin'),
        'email' => $this->session->userdata('session_email'),
        'secretkey' => $this->secretkey
    );

    $encrypted_string = $this->encrypt->encode(json_encode($body_user));
    $data = array(
        'data' => $encrypted_string 
    );

    $url = 'api/auth/pin';
    $exec = $this->bs->post_curl($url,$data);
    if ($exec['responsecode'] == '00') {
        $token = $exec['Data']['token'];
        $email = $exec['Data']['email'];
        $userid = $exec['Data']['userid'];
        $session_id = $exec['Data']['session_id'];
        $data = array(
                'session_token' =>$token,
                'session_email' =>$email,
                'session_userid' =>$userid,
                'session_id' =>$session_id,
                'is_logged_in' => true
                );
        $this->session->set_userdata($data);
    }
    echo json_encode($exec);

    }

        
}
