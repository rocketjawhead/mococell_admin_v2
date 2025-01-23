<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {


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


	public function otp_paid(){

        $data['csrf_name'] = $this->security->get_csrf_token_name();
        $data['csrf_token'] = $this->security->get_csrf_hash();
        
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');
        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');

        $trx_id = $this->input->post('trx_id');

        $body_user = array(
            'trx_id' => $trx_id,
            'userid' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );

        $encrypted_string = $this->encrypt->encode(json_encode($body_user));
        $data_user = array(
            'data' => $encrypted_string 
        );

        $url_otp_paid = 'api/load/requestotp/';
        $exec_otp_paid = $this->base->post_curl_token($session_userid,$session_id,$url_otp_paid,$data_user);

        echo json_encode($exec_otp_paid);
    }

    public function confirm_paid(){

        $data['csrf_name'] = $this->security->get_csrf_token_name();
        $data['csrf_token'] = $this->security->get_csrf_hash();
        
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');
        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');

        $trx_id = $this->input->post('trx_id');
        $otp = $this->input->post('otp');
        $password = $this->input->post('password');

        $body_user = array(
            'trx_id' => $trx_id,
            'otp' => $otp,
            'password' => $password,
            'userid' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );



        $encrypted_string = $this->encrypt->encode(json_encode($body_user));
        $data_user = array(
            'data' => $encrypted_string 
        );

        $url_otp_paid = 'api/transaction/updatepaid/';
        $exec_otp_paid = $this->base->post_curl_token($session_userid,$session_id,$url_otp_paid,$data_user);

        echo json_encode($exec_otp_paid);
    }

    public function confirm_refund(){

        $data['csrf_name'] = $this->security->get_csrf_token_name();
        $data['csrf_token'] = $this->security->get_csrf_hash();
        
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');
        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');


        $body_user = array(
            'trx_id' => $this->input->post('trx_id'),
            'password' => $this->input->post('password'),
            'sender_bank' => $this->input->post('sender_bank'),
            'rcv_bank' => $this->input->post('rcv_bank'),
            'amount_refund' => $this->input->post('amount_refund'),
            'userid' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );


        $encrypted_string = $this->encrypt->encode(json_encode($body_user));
        $data_user = array(
            'data' => $encrypted_string 
        );

        echo json_encode($data_user);
        die();

        $url_otp_paid = 'api/transaction/updaterefund/';
        $exec_otp_paid = $this->base->post_curl_token($session_userid,$session_id,$url_otp_paid,$data_user);

        echo json_encode($exec_otp_paid);
    }

    public function check_status(){
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');
        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');
        $body_user = array(
            'commands' => $this->input->post('commands'),
            'ref_id' => $this->input->post('ref_id'),
            'hp' => $this->input->post('hp'),
            'pulsa_code' => $this->input->post('pulsa_code'),
            'trx_date' => $this->input->post('trx_date'),
            'userid' => $this->session->userdata('session_userid'),
            'token' => $this->session->userdata('session_token'),
            'secretkey' => $this->secretkey
        );

        $encrypted_string = $this->encrypt->encode(json_encode($body_user));
        $data = array(
            'data' => $encrypted_string 
        );


        $url = 'api/transaction/checkstatus/';
        $exec = $this->base->post_curl_token($session_userid,$session_id,$url,$data);
        echo json_encode($exec);
    }
        
}
