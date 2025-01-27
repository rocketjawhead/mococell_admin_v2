<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {


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

        $encrypted_string = $this->encrypt->encode(json_encode($body_user));
        $data_user = array(
            'data' => $encrypted_string 
        );
        
        
        $url_his_deposit = 'api/blog/listblog';
        $exec_his_deposit = $this->base->post_curl_token($session_userid,$session_id,$url_his_deposit,$data_user);


        $data['list_blog'] = $exec_his_deposit['Data'];

        $this->load->view('menu/Header',$data);
        $this->load->view('agent/blog/Index',$data);
        $this->load->view('menu/Footer',$data);
    }

    public function add(){

        $data['csrf_name'] = $this->security->get_csrf_token_name();
        $data['csrf_token'] = $this->security->get_csrf_hash();
        
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');
        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');
        $data['main_menu'] = $this->base->main_menu();  
        

        $this->load->view('menu/Header',$data);
        $this->load->view('agent/blog/Add',$data);
        $this->load->view('menu/Footer',$data);
    }

    public function insertblog(){

        $data['csrf_name'] = $this->security->get_csrf_token_name();
        $data['csrf_token'] = $this->security->get_csrf_hash();
        
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');
        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');

        $body_user = array(
            'title_blog' => $this->input->post('title_blog'),
            'desc_blog' => $this->input->post('desc_blog'),
            'category' => $this->input->post('category'),
            'meta_title' => $this->input->post('meta_title'),
            'meta_desc' => $this->input->post('meta_desc'),
            'meta_robot' => $this->input->post('meta_robot'),
            'urldownload' => $this->input->post('urldownload'),
            'imageurl' => $this->input->post('base64image'),
            'is_stop' => $this->input->post('is_stop'),
            'alt_img' => $this->input->post('alt_img'),
            'userid' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );
        $encrypted_string = $this->encrypt->encode(json_encode($body_user));
        $data_user = array(
            'data' => $encrypted_string 
        );

        $url_data = 'api/blog/insert/';
        $exec_data = $this->base->post_curl_token($session_userid,$session_id,$url_data,$data_user);

        echo json_encode($exec_data);
    }

    public function detail($unique_id){

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

        $url_detail_complaint = 'api/blog/detail';
        $exec_detail_complaint = $this->base->post_curl_token($session_userid,$session_id,$url_detail_complaint,$data_user);

        $res = json_encode($exec_detail_complaint);
        $res_json = json_encode($exec_detail_complaint['Data']);
        $json = json_decode($res_json, true);
        
        if ($exec_detail_complaint['responsecode'] == '00') {

            $data['id'] = $json['id'];
            $data['title_blog'] = $json['title_blog'];
            $data['desc_blog'] = $json['desc_blog'];
            $data['meta_title'] = $json['meta_title'];
            $data['meta_desc'] = $json['meta_desc'];
            $data['meta_robot'] = $json['meta_robot'];
            $data['id_category'] = $json['id_category'];
            $data['category'] = $json['category'];
            $data['urldownload'] = $json['urldownload'];
            $data['imageurl'] = $json['imageurl'];
            $data['alt_img'] = $json['alt_img'];
            $data['id_is_stop'] = ($json['id_is_stop'] == 1) ? 'checked' : '';
            $data['id_status'] = $json['id_status'];
            $data['status'] = $json['status_desc'];
            

        }

        $this->load->view('menu/Header',$data);
        $this->load->view('agent/blog/Detail',$data);
        $this->load->view('menu/Footer',$data);
    }



    public function updateblog(){

        $data['csrf_name'] = $this->security->get_csrf_token_name();
        $data['csrf_token'] = $this->security->get_csrf_hash();
        
        $data['session_userid'] = $this->session->userdata('session_userid');
        $data['session_id'] = $this->session->userdata('session_id');
        $session_userid = $this->session->userdata('session_userid'); 
        $session_id = $this->session->userdata('session_id');

        $body_user = array(
            'id' => $this->input->post('id'),
            'title_blog' => $this->input->post('title_blog'),
            'desc_blog' => $this->input->post('desc_blog'),
            'category' => $this->input->post('category'),
            'meta_title' => $this->input->post('meta_title'),
            'meta_desc' => $this->input->post('meta_desc'),
            'meta_robot' => $this->input->post('meta_robot'),
            'urldownload' => $this->input->post('urldownload'),
            'imageurl' => $this->input->post('base64image'),
            'is_stop' => $this->input->post('is_stop'),
            'alt_img' => $this->input->post('alt_img'),
            'status' => $this->input->post('status'),
            'userid' => $this->session->userdata('session_userid'),
            'secretkey' => $this->secretkey
        );
        $encrypted_string = $this->encrypt->encode(json_encode($body_user));
        $data_user = array(
            'data' => $encrypted_string 
        );

        // echo json_encode($data_user);
        // die();

        $url_data = 'api/blog/update/';
        $exec_data = $this->base->post_curl_token($session_userid,$session_id,$url_data,$data_user);

        echo json_encode($exec_data);
    }

        
}
