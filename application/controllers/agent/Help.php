<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends CI_Controller {


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


	public function complaint()
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
        
        $url_his_deposit = 'api/help/listcomplaint';
        $exec_his_deposit = $this->base->post_curl_token($session_userid,$session_id,$url_his_deposit,$data_user);
        $data['list_complaint'] = $exec_his_deposit['Data'];

        $this->load->view('menu/Header',$data);
        $this->load->view('agent/complaint/Index',$data);
        $this->load->view('menu/Footer',$data);
    }


    public function detailcomplaint($unique_id){

        $data['csrf_name'] = $this->security->get_csrf_token_name();
        $data['csrf_token'] = $this->security->get_csrf_hash();
        
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');
        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');
        $data['main_menu'] = $this->base->main_menu();  
        $body_user = array(
            'unique_id' => $unique_id,
            'userid' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );

        $encrypted_string = $this->encrypt->encode(json_encode($body_user));
        $data_user = array(
            'data' => $encrypted_string 
        );

        // echo json_encode($data_user);
        // die();

        $url_detail_complaint = 'api/help/detailcomplaint';
        $exec_detail_complaint = $this->base->post_curl_token($session_userid,$session_id,$url_detail_complaint,$data_user);

        // echo json_encode($exec_detail_complaint);
        // die();

        $res = json_encode($exec_detail_complaint);
        $res_json = json_encode($exec_detail_complaint['Data']);
        $json = json_decode($res_json, true);
        

        // echo $exec_detail_complaint['responsecode'];
        // die();
        //log refund
        $url_list_detail_complaint = 'api/help/listdetailcomplaint';
        $exec_list_detail_complaint = $this->base->post_curl_token($session_userid,$session_id,$url_list_detail_complaint,$data_user);

        // echo json_encode($exec_list_detail_complaint['Data']);
        // die();
        $data['list_detail_complaint'] = $exec_list_detail_complaint['Data'];
        //
        // echo json_encode($exec_list_detail_complaint);
        // die();
        if ($exec_detail_complaint['responsecode'] == '00') {
            // echo $json['unique_id'];
            // die();  
            $data['status'] = $json['status'];
            $data['unique_id'] = $json['unique_id'];
            $data['subject'] = $json['subject'];
            $data['desc_cmp'] = $json['desc_cmp'];
            $data['imageurl'] = $json['imageurl'];
            $data['create_date'] = $json['create_date'];
            $data['status_complaint'] = $json['status_complaint'];
            $data['status_complaint_badge'] = $json['status_complaint_badge'];
            $data['category'] = $json['category'];

        }

        $this->load->view('menu/Header',$data);
        $this->load->view('agent/complaint/Detail',$data);
        $this->load->view('menu/Footer',$data);
    }

    public function addlogcomplaint(){

        $data['csrf_name'] = $this->security->get_csrf_token_name();
        $data['csrf_token'] = $this->security->get_csrf_hash();
        
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');
        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');

        $unique_id = $this->input->post('unique_id');
        $txt_complaint = $this->input->post('txt_complaint');
        $remarks = $this->input->post('remarks');
        $imageurl = $this->input->post('base64image');

        $body_user = array(
            'unique_id' => $unique_id,
            'txt_complaint' => $txt_complaint,
            'remarks' => $remarks,
            'imageurl' => $imageurl,
            'userid' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );
        $encrypted_string = $this->encrypt->encode(json_encode($body_user));
        $data_user = array(
            'data' => $encrypted_string 
        );

        $url_otp_paid = 'api/help/addlogcomplaint/';
        $exec_otp_paid = $this->base->post_curl_token($session_userid,$session_id,$url_otp_paid,$data_user);

        echo json_encode($exec_otp_paid);
    }

    public function updatecomplaint(){

        $data['csrf_name'] = $this->security->get_csrf_token_name();
        $data['csrf_token'] = $this->security->get_csrf_hash();
        
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');
        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');

        $unique_id = $this->input->post('unique_id');
        $status = $this->input->post('status');

        $body_user = array(
            'unique_id' => $unique_id,
            'status' => $status,
            'userid' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );
        $encrypted_string = $this->encrypt->encode(json_encode($body_user));
        $data_user = array(
            'data' => $encrypted_string 
        );

        $url_update_complaint = 'api/help/updatecomplaint/';
        $exec_update_complaint = $this->base->post_curl_token($session_userid,$session_id,$url_update_complaint,$data_user);

        echo json_encode($exec_update_complaint);
    }

        
}
