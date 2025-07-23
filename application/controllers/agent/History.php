<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {


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


	public function index(){

        $data['csrf_name'] = $this->security->get_csrf_token_name();
        $data['csrf_token'] = $this->security->get_csrf_hash();
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');
        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');
        $data['main_menu'] = $this->base->main_menu();  
        $body_user = array(
            'userid' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );

        $this->load->view('menu/Header',$data);
        $this->load->view('agent/history/Index',$data);
        $this->load->view('menu/Footer',$data);
    }

    public function viewdata_dashboard(){

        $data['csrf_name'] = $this->security->get_csrf_token_name();
        $data['csrf_token'] = $this->security->get_csrf_hash();

        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');
        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');

        $data['main_menu'] = $this->base->main_menu();  
        $body_profile = array(
            'userid' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );

        $encrypted_string = $this->encrypt->encode(json_encode($body_profile));
        $data_profile = array(
            'data' => $encrypted_string 
        );
        
        $url_profile = 'api/transaction/historytrx';
        $exec_profile = $this->base->post_curl_token($session_userid,$session_id,$url_profile,$data_profile);

        echo json_encode($exec_profile);
    }


    public function detail($trx_id){

        $data['csrf_name'] = $this->security->get_csrf_token_name();
        $data['csrf_token'] = $this->security->get_csrf_hash();
        
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');
        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');
        $data['main_menu'] = $this->base->main_menu();  
        $body_user = array(
            'trx_id' => $trx_id,
            'userid' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );

        $encrypted_string = $this->encrypt->encode(json_encode($body_user));
        $data_profile = array(
            'data' => $encrypted_string 
        );

        $this->load->view('menu/Header',$data);
        $this->load->view('agent/history/Detail',$data);
        $this->load->view('menu/Footer',$data);
    }

    public function view_detail(){

        $data['csrf_name'] = $this->security->get_csrf_token_name();
        $data['csrf_token'] = $this->security->get_csrf_hash();

        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');
        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');

        $data['main_menu'] = $this->base->main_menu();  
        $body_profile = array(
            'trx_id' => $this->input->post('trx_id'),
            'userid' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );

        $encrypted_string = $this->encrypt->encode(json_encode($body_profile));
        $data_profile = array(
            'data' => $encrypted_string 
        );
        
        $url_profile = 'api/transaction/checkoutdetail';
        $exec_profile = $this->base->post_curl_token($session_userid,$session_id,$url_profile,$data_profile);

        echo json_encode($exec_profile);
    }

    public function view_history_refund(){

        $data['csrf_name'] = $this->security->get_csrf_token_name();
        $data['csrf_token'] = $this->security->get_csrf_hash();

        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');
        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');

        $data['main_menu'] = $this->base->main_menu();  
        $body_profile = array(
            'trx_id' => $this->input->post('trx_id'),
            'userid' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );

        $encrypted_string = $this->encrypt->encode(json_encode($body_profile));
        $data_profile = array(
            'data' => $encrypted_string 
        );
        
        $url_profile = 'api/transaction/loghistory3rd';
        $exec_profile = $this->base->post_curl_token($session_userid,$session_id,$url_profile,$data_profile);

        echo json_encode($exec_profile);
    }

    public function view_history_complaint(){

        $data['csrf_name'] = $this->security->get_csrf_token_name();
        $data['csrf_token'] = $this->security->get_csrf_hash();

        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');
        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');

        $data['main_menu'] = $this->base->main_menu();  
        $body_profile = array(
            'trx_id' => $this->input->post('trx_id'),
            'userid' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );

        $encrypted_string = $this->encrypt->encode(json_encode($body_profile));
        $data_profile = array(
            'data' => $encrypted_string 
        );
        
        $url_profile = 'api/transaction/listcomplainttrx';
        $exec_profile = $this->base->post_curl_token($session_userid,$session_id,$url_profile,$data_profile);

        echo json_encode($exec_profile);
    }

        
}
