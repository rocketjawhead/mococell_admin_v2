<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pending extends CI_Controller {


	public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('M_base','base');
        $this->secretkey = $this->config->item('secretkey');

        $this->service_url_apps = $this->config->item("service_url_apps");

        
        if($this->session->userdata('is_logged_in') =='')
        {
         $this->session->set_flashdata('msg','Please Login to Continue');
         redirect('Login');
        }
    }


	public function index()
	{

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

        $encrypted_string = $this->encrypt->encode(json_encode($body_user));
        $data_user = array(
            'data' => $encrypted_string 
        );
        
        
        $url_his_deposit = 'api/transaction/historypending';
        $exec_his_deposit = $this->base->post_curl_token($session_userid,$session_id,$url_his_deposit,$data_user);
        $data['list_history_pending'] = $exec_his_deposit['Data'];

        $this->load->view('menu/Header',$data);
        $this->load->view('agent/pending/Index',$data);
        $this->load->view('menu/Footer',$data);
    }


    public function detail($trx_id){

        $data['service_url_apps'] = $this->service_url_apps;

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
        $data_user = array(
            'data' => $encrypted_string 
        );

        $url_checkout_detail = 'api/transaction/checkoutdetail';
        $exec_checkout_detail = $this->base->post_curl_token($session_userid,$session_id,$url_checkout_detail,$data_user);

        $res = json_encode($exec_checkout_detail);
        $res_json = json_encode($exec_checkout_detail['Data']);
        $json = json_decode($res_json, true);
        

        //log refund
        $url_log_refund = 'api/transaction/loghistorypending';
        $exec_log_refund = $this->base->post_curl_token($session_userid,$session_id,$url_log_refund,$data_user);

        // echo json_encode($exec_log_refund['Data']);
        // die();
        $data['list_history_refund'] = $exec_log_refund['Data'];
        //

        if ($exec_checkout_detail['responsecode'] == '00') {

            $data['trx_id'] = $json['trx_id'];
            $data['trx_code'] = $json['trx_code'];
            $data['trx_number'] = $json['trx_number'];
            $data['trx_op'] = $json['trx_op'];
            $data['trx_details'] = $json['trx_details'];
            $data['trx_total_numb'] = $json['trx_total_numb'];
            $data['trx_price'] = $json['trx_price'];
            $data['trx_fee'] = $json['trx_fee'];
            $data['trx_total'] = $json['trx_total'];
            $data['payment_method'] = $json['payment_method'];
            $data['trx_date'] = $json['trx_date'];
            $data['create_date'] = $json['create_date'];
            $data['status'] = $json['status'];
            $data['upload_receipt'] = $json['upload_receipt'];
            $data['status_payment'] = $json['status_payment'];
            $data['status_transaction'] = $json['status_transaction'];
            $data['profit'] = $json['profit'];
            $data['profit_nominal'] = $json['profit_nominal'];
            $data['status_name'] = $json['status_name'];
            $data['status_transaction_desc'] = $json['status_transaction_desc'];
            $data['is_refund'] = $json['is_refund'];
            $data['imageurl'] = $json['imageurl'];
            $data['trx_type'] = $json['trx_type'];

        }

        $this->load->view('menu/Header',$data);
        $this->load->view('agent/pending/Detail',$data);
        $this->load->view('menu/Footer',$data);
    }

        
}
