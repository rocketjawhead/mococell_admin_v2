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

        // echo json_encode($data_user);
        // die();
        
        
        $url_his_deposit = 'api/transaction/historytrx';
        $exec_his_deposit = $this->base->post_curl_token($session_userid,$session_id,$url_his_deposit,$data_user);
        $data['list_history_trx'] = $exec_his_deposit['Data']['list_history_all'];
        $data['list_history_pending'] = $exec_his_deposit['Data']['list_history_pending'];
        $data['list_history_refund'] = $exec_his_deposit['Data']['list_history_refund'];

        $data['qty_waiting'] = $exec_his_deposit['Data']['qty_waiting'];
        $data['qty_refund'] = $exec_his_deposit['Data']['qty_refund'];

        $this->load->view('menu/Header',$data);
        $this->load->view('agent/history/Index',$data);
        $this->load->view('menu/Footer',$data);
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
        $data_user = array(
            'data' => $encrypted_string 
        );

        // echo json_encode($data_user);
        // die();

        $url_checkout_detail = 'api/transaction/checkoutdetail';
        $exec_checkout_detail = $this->base->post_curl_token($session_userid,$session_id,$url_checkout_detail,$data_user);

        $res = json_encode($exec_checkout_detail);
        $res_json = json_encode($exec_checkout_detail['Data']);
        $json = json_decode($res_json, true);
        

        //log refund
        $url_log_refund = 'api/transaction/loghistoryrefund';
        $exec_log_refund = $this->base->post_curl_token($session_userid,$session_id,$url_log_refund,$data_user);

        // echo json_encode($exec_log_refund['Data']);
        // die();
        $data['list_history_refund'] = $exec_log_refund['Data'];

        //complaint
        $url_his_deposit = 'api/help/listcomplainttrx';
        $exec_his_deposit = $this->base->post_curl_token($session_userid,$session_id,$url_his_deposit,$data_user);
        $data['list_complaint'] = $exec_his_deposit['Data']['log_complaint'];
        $data['log_refund'] = $exec_his_deposit['Data']['log_refund'];
        //

        if ($exec_checkout_detail['responsecode'] == '00') {

            $data['trx_id'] = $json['trx_id'];
            $data['trx_code'] = $json['trx_code'];
            $data['trx_number'] = $json['trx_number'];
            $data['trx_op'] = $json['trx_op'];
            $data['trx_details'] = $json['trx_details'];
            $data['trx_price'] = $json['trx_price'];
            $data['trx_fee'] = $json['trx_fee'];
            $data['trx_total'] = $json['trx_total'];
            $data['id_payment_method'] = $json['id_payment_method'];
            $data['payment_method'] = $json['payment_method'];
            $data['trx_date'] = $json['trx_date'];
            $data['status_payment'] = $json['status_payment'];
            $data['status_name'] = $json['status_name'];
            $data['status_transaction'] = $json['status_transaction'];
            $data['status_name'] = $json['status_name'];
            $data['is_refund'] = $json['is_refund'];
            $data['trx_type'] = $json['trx_type'];
            $data['imageurl'] = $json['imageurl'];
            $data['upload_receipt'] = $json['upload_receipt'];
            $data['trf_img'] = $json['trf_img'];
            $data['sender_bank'] = $json['sender_bank'];
            $data['rcv_bank'] = $json['rcv_bank'];            

        }

        $this->load->view('menu/Header',$data);
        $this->load->view('agent/history/Detail',$data);
        $this->load->view('menu/Footer',$data);
    }

        
}
