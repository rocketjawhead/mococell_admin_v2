<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {


	public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('M_base','base');
        $this->secretkey = $this->config->item('secretkey');
        $this->load->library('encrypt');
        $this->base_url = $this->config->item("base_url");


        $this->service_url_apps = $this->config->item("service_url_apps");

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
        

        $this->load->view('menu/Header',$data);
        $this->load->view('agent/users/Index',$data);
        $this->load->view('menu/Footer',$data);
    }

	public function detail($phonenumber)
    {

        $data['service_url_apps'] = $this->service_url_apps;

        $data['csrf_name'] = $this->security->get_csrf_token_name();
        $data['csrf_token'] = $this->security->get_csrf_hash();
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');
        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');

        $data['main_menu'] = $this->base->main_menu();  
        $body_profile = array(
            'phonenumber' => $phonenumber,
            'userid' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );

        $encrypted_string = $this->encrypt->encode(json_encode($body_profile));
        $data_profile = array(
            'data' => $encrypted_string 
        );

        $url_profile = 'api/Report/usersdashboard';
        $exec_profile = $this->base->post_curl_token($session_userid,$session_id,$url_profile,$data_profile);
        //

        if ($exec_profile['responsecode'] == '00') {
            $data['total_deposit_user'] = $exec_profile['Data']['total_deposit_user'];
            $data['total_transaction'] = $exec_profile['Data']['total_transaction'];

            //chart
            $data['chart_jan'] = $exec_profile['Data']['chart_jan'];
            $data['chart_feb'] = $exec_profile['Data']['chart_feb'];
            $data['chart_mar'] = $exec_profile['Data']['chart_mar'];
            $data['chart_apr'] = $exec_profile['Data']['chart_apr'];
            $data['chart_may'] = $exec_profile['Data']['chart_may'];
            $data['chart_jun'] = $exec_profile['Data']['chart_jun'];
            $data['chart_jul'] = $exec_profile['Data']['chart_jul'];
            $data['chart_aug'] = $exec_profile['Data']['chart_aug'];
            $data['chart_sep'] = $exec_profile['Data']['chart_sep'];
            $data['chart_oct'] = $exec_profile['Data']['chart_oct'];
            $data['chart_nov'] = $exec_profile['Data']['chart_nov'];
            $data['chart_dec'] = $exec_profile['Data']['chart_dec'];

            $data['total_trx_previous'] = $exec_profile['Data']['total_trx_previous'];
            $data['total_trx_current'] = $exec_profile['Data']['total_trx_current'];
            $data['total_sales_year'] = $exec_profile['Data']['total_sales_year'];
            $data['total_sales_current'] = $exec_profile['Data']['total_sales_current'];

            $data['last_deposit'] = $exec_profile['Data']['last_deposit'];
            $data['last_transaction'] = $exec_profile['Data']['last_transaction'];
            $data['last_transaction_pending'] = $exec_profile['Data']['last_transaction_pending'];
            $data['percent_growth'] = $exec_profile['Data']['percent_growth'];

            //card graphy

            $data['previous_depo'] = $exec_profile['Data']['previous_depo'];
            $data['current_depo'] = $exec_profile['Data']['current_depo'];

            $data['previous_transaction'] = $exec_profile['Data']['previous_transaction'];
            $data['current_transaction'] = $exec_profile['Data']['current_transaction'];
            //end card

            //
            $group_op = json_encode(($exec_profile['Data']['trx_group_op']));
            $data['trx_group_op'] = array_column(json_decode($group_op, true), 'op');

            $group_op_percentage = json_encode(($exec_profile['Data']['trx_group_op']));
            $data['trx_group_op_percentage'] = array_column(json_decode($group_op_percentage, true), 'percentage');

            $data['transaction_log'] = $exec_profile['Data']['transaction_log'];
            $data['last_transaction_all'] = $exec_profile['Data']['last_transaction_all'];

            $data['unique_id'] = $exec_profile['Data']['unique_id'];
            $data['email'] = $exec_profile['Data']['email'];
            $data['phonenumber'] = $exec_profile['Data']['phonenumber'];
            $data['referral_code'] = $exec_profile['Data']['referral_code'];
            $data['remarks'] = $exec_profile['Data']['remarks'];
            $data['reg_dtm'] = $exec_profile['Data']['reg_dtm'];
            $data['status'] = $exec_profile['Data']['status'];
            $data['lock_status'] = $exec_profile['Data']['lock_status'];
            $data['is_lock'] = $exec_profile['Data']['is_lock'];
            $data['account_status'] = $exec_profile['Data']['account_status'];
            $data['browser_info'] = $exec_profile['Data']['browser_info'];

            $this->load->view('menu/Header',$data);
            $this->load->view('agent/users/Detail',$data);
            $this->load->view('menu/Footer',$data);
        }else{
            redirect('agent/Users');
        }

        
    }

    public function detail_pending($phonenumber)
    {
        $data['csrf_name'] = $this->security->get_csrf_token_name();
        $data['csrf_token'] = $this->security->get_csrf_hash();
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');
        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');

        $data['main_menu'] = $this->base->main_menu();  
        $body_profile = array(
            'phonenumber' => $phonenumber,
            'userid' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );

        $encrypted_string = $this->encrypt->encode(json_encode($body_profile));
        $data_profile = array(
            'data' => $encrypted_string 
        );

        $url_profile = 'api/Report/usersdetailpending';
        $exec_profile = $this->base->post_curl_token($session_userid,$session_id,$url_profile,$data_profile);
        //

        if ($exec_profile['responsecode'] == '00') {
            
            $data['last_transaction_pending'] = $exec_profile['Data']['last_transaction_pending'];
            
            $this->load->view('menu/Header',$data);
            $this->load->view('agent/users/DetailPending',$data);
            $this->load->view('menu/Footer',$data);
        }else{
            redirect('agent/Users');
        }

        
    }

    public function activate_users(){

        $data['csrf_name'] = $this->security->get_csrf_token_name();
        $data['csrf_token'] = $this->security->get_csrf_hash();
        
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');
        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');

        $trx_id = $this->input->post('trx_id');

        $body_user = array(
            'unique_id' => $trx_id,
            'requester' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );

        $encrypted_string = $this->encrypt->encode(json_encode($body_user));
        $data_user = array(
            'data' => $encrypted_string 
        );

        $url_otp_paid = 'api/Users/activateusers/';
        $exec_otp_paid = $this->base->post_curl_token($session_userid,$session_id,$url_otp_paid,$data_user);

        echo json_encode($exec_otp_paid);
    }


    




        
}
