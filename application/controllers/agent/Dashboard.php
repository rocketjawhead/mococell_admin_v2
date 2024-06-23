<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('M_base','base');
        $this->secretkey = $this->config->item('secretkey');
        $this->load->library('encrypt');
        $this->base_url = $this->config->item("base_url");

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
        $body_profile = array(
            'userid' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );

        $encrypted_string = $this->encrypt->encode(json_encode($body_profile));
        $data_profile = array(
            'data' => $encrypted_string 
        );

        $url_profile = 'api/Report/dashboard';
        $exec_profile = $this->base->post_curl_token($session_userid,$session_id,$url_profile,$data_profile);
        //

        // echo json_encode($exec_profile);
        // die();

        $data['total_user'] = $exec_profile['Data']['total_user'];
        $data['total_deposit_user'] = $exec_profile['Data']['total_deposit_user'];
        $data['total_balance_system'] = $exec_profile['Data']['total_balance_system'];
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
        $data['percent_growth'] = $exec_profile['Data']['percent_growth'];
        $data['total_income'] = $exec_profile['Data']['total_income'];

        //card graphy

        $data['previous_usr'] = $exec_profile['Data']['previous_usr'];
        $data['current_usr'] = $exec_profile['Data']['current_usr'];

        $data['previous_depo'] = $exec_profile['Data']['previous_depo'];
        $data['current_depo'] = $exec_profile['Data']['current_depo'];

        $data['previous_income'] = $exec_profile['Data']['previous_income'];
        $data['current_income'] = $exec_profile['Data']['current_income'];
        //end card

        //
        $group_op = json_encode(($exec_profile['Data']['trx_group_op']));
        $data['trx_group_op'] = array_column(json_decode($group_op, true), 'op');

        $group_op_percentage = json_encode(($exec_profile['Data']['trx_group_op']));
        $data['trx_group_op_percentage'] = array_column(json_decode($group_op_percentage, true), 'percentage');

        $data['current_month_error'] = $exec_profile['Data']['current_month_error'];

        $data['list_item_deactive'] = $exec_profile['Data']['list_item_deactive'];

        $data['list_bank'] = $exec_profile['Data']['list_bank'];

        $this->load->view('menu/Header',$data);
        $this->load->view('agent/Dashboard',$data);
        $this->load->view('menu/Footer',$data);
    }


    public function upload_receipt(){
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');
        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');
        $data = array(
            'trx_id' => $this->input->post('trx_id'),
            'type_upload' => $this->input->post('type_upload'),
            'base64image' => $this->input->post('base64image'),
            'secretkey' => $this->secretkey
        );

        $encrypted_string = $this->encrypt->encode(json_encode($data));
        $data_req = array(
            'data' => $encrypted_string 
        );
        $url = 'api/transaction/uploadreceipt/';
        $exec = $this->base->post_curl_token($session_userid,$session_id,$url,$data_req);
        echo json_encode($exec);
    }

    public function addbank(){

        $data['csrf_name'] = $this->security->get_csrf_token_name();
        $data['csrf_token'] = $this->security->get_csrf_hash();
        
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');
        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');
        $data['main_menu'] = $this->base->main_menu();  
        

        $this->load->view('menu/Header',$data);
        $this->load->view('agent/bank/Addbank',$data);
        $this->load->view('menu/Footer',$data);
    }

    public function insert_bank(){
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');
        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');
        $data = array(
            'account_name' => $this->input->post('account_name'),
            'account_number' => $this->input->post('account_number'),
            'name_bank' => $this->input->post('name_bank'),
            'code_bank' => $this->input->post('code_bank'),
            'secretkey' => $this->secretkey
        );

        $encrypted_string = $this->encrypt->encode(json_encode($data));
        $data_req = array(
            'data' => $encrypted_string 
        );
        $url = 'api/base/insertbank/';
        $exec = $this->base->post_curl_token($session_userid,$session_id,$url,$data_req);
        echo json_encode($exec);
    }

    public function update_bank(){
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');
        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');
        $data = array(
            'trx_id' => $this->input->post('trx_id'),
            'account_name' => $this->input->post('account_name'),
            'account_number' => $this->input->post('account_number'),
            'name_bank' => $this->input->post('name_bank'),
            'code_bank' => $this->input->post('code_bank'),
            'secretkey' => $this->secretkey
        );

        $encrypted_string = $this->encrypt->encode(json_encode($data));
        $data_req = array(
            'data' => $encrypted_string 
        );
        $url = 'api/base/updatebank/';
        $exec = $this->base->post_curl_token($session_userid,$session_id,$url,$data_req);
        echo json_encode($exec);
    }

    public function detailbank($trx_id){


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

        $url_detail = 'api/base/detailbank';
        $exec_detail = $this->base->post_curl_token($session_userid,$session_id,$url_detail,$data_user);

        $res = json_encode($exec_detail);
        $res_json = json_encode($exec_detail['Data']);
        $json = json_decode($res_json, true);
        

        if ($exec_detail['responsecode'] == '00') {

            $data['trx_id'] = $json['trx_id'];
            $data['account_name'] = $json['account_name'];
            $data['account_number'] = $json['account_number'];
            $data['name_bank'] = $json['name_bank'];
            $data['code_bank'] = $json['code_bank'];
            $data['status'] = $json['status'];
            $data['status_decs'] = $json['status_decs'];

        }

        $this->load->view('menu/Header',$data);
        $this->load->view('agent/bank/Detail',$data);
        $this->load->view('menu/Footer',$data);
    }

    public function deactive_bank($trx_id,$statusdata){
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');
        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');

        if($statusdata == 1) {
            $status = 0;
        }else{
            $status = 1;
        }

        $data = array(
            'trx_id' => $trx_id,
            'status' => $status,
            'secretkey' => $this->secretkey
        );

        $encrypted_string = $this->encrypt->encode(json_encode($data));
        $data_req = array(
            'data' => $encrypted_string 
        );
        $url = 'api/base/deactivebank/';
        $exec = $this->base->post_curl_token($session_userid,$session_id,$url,$data_req);
        // echo json_encode($exec);
        redirect('agent/Dashboard');
    }


    




        
}
