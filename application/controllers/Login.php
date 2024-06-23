<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	public function __construct(){
	      parent::__construct();
	      $this->load->helper(array('url'));
	      $this->load->model('M_base','bs');
	      $this->load->library('encrypt');
	      $this->secretkey = $this->config->item("secretkey");
	}

	public function index(){
		$data['csrf_name'] = $this->security->get_csrf_token_name();
	    $data['csrf_token'] = $this->security->get_csrf_hash();
	    $generate_captcha = $this->create_captcha();
	    $data['img'] = $generate_captcha['img'];
		// $data['key'] = $generate_captcha['key'];
		$data['word'] = $generate_captcha['word'];

		$this->load->view('login/Index',$data);
	}


	public function create_captcha(){
		$options = array(
			'img_path'	=> './captcha/',
			'img_url'	=> base_url('captcha'),
			// 'img_url'	=> '/ci-chapca/captcha/',
			'img_width'	=> '200',
			'img_height'=> '40',
			'word_length' => 4,
			'font_size'  => 20,
			'expiration'=> 7200
		);

		$cap = create_captcha($options);
		$image = $cap['image'];
		$rand = rand(10,20);

		$data_captcha = array(
			'img' => $image,
			'key' => $rand,
			'word' => $cap['word'] 
		);

		$this->session->set_userdata('captchaword',$cap['word']);

		return $data_captcha;
	}

	public function reset_pin(){
		$data['csrf_name'] = $this->security->get_csrf_token_name();
	    $data['csrf_token'] = $this->security->get_csrf_hash();
		$this->load->view('login/Formresetpin',$data);
	}


	public function pin(){
		$this->load->view('login/Pin');
	}


	public function exec_login(){
    
	$key = $this->input->post('key');
	$captcha = $this->input->post('captcha');


	// echo "string";
	// die();
	if($captcha == $this->session->userdata('captchaword')){
		$body = array(
	    	'username' => $this->input->post('username'),
	    	'password' => $this->input->post('password'),
	    	'secretkey' => $this->secretkey
	    );

	    $encrypted_string = $this->encrypt->encode(json_encode($body));
	    $data = array(
	    	'data' => $encrypted_string 
	    );

	    $url = 'api/auth/login/';
	    $exec = $this->bs->post_curl($url,$data);
	    if ($exec['responsecode'] == '00') {

	    	$islogin = $exec['Data']['islogin'];
	    	if($islogin == 1){
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
	    }
	    echo json_encode($exec);
	}
	else{
		$response = array(
			'responsecode' => '401',
			'message' => 'Please check your captcha',
			'key' => $key,
			'captcha' => $captcha 
		);
		echo json_encode($response);
		// $this->session->set_flashdata('error_msg','Please check your captcha');
		// return FALSE;
	}
	$this->session->unset_userdata('captchaword',$captcha);
	// $this->session->unset_userdata($array_items);

    

	}

	public function forget_password(){
    $data = array(
    	'email' => $this->input->post('email'),
    	'secretkey' => $this->secretkey
    );

    $url = 'api/auth/forgetpassword/';
    $exec = $this->bs->post_curl($url,$data);
    echo json_encode($exec);
	}

	public function forget_pin(){
    $data = array(
    	'email' => $this->input->post('email'),
    	'secretkey' => $this->secretkey
    );

    $url = 'api/auth/forgetpin/';
    $exec = $this->bs->post_curl($url,$data);
    echo json_encode($exec);
	}

	


	public function request_otp(){
		$body = array(
	    	'id' => $this->input->post('id'),
	    	'email' => $this->input->post('email'),
	    	'secretkey' => $this->secretkey
	    );

	    $encrypted_string = $this->encrypt->encode(json_encode($body));
	    $data = array(
	    	'data' => $encrypted_string 
	    );

	    $url = 'api/auth/requestotp/';
	    $exec = $this->bs->post_curl($url,$data);
	    echo json_encode($exec);
	    
	}


	public function validate_otp(){
		$body = array(
	    	'otp' => $this->input->post('otp'),
	    	'email' => $this->input->post('email'),
	    	'secretkey' => $this->secretkey
	    );

		$encrypted_string = $this->encrypt->encode(json_encode($body));
	    $data = array(
	    	'data' => $encrypted_string 
	    );

	    $url = 'api/auth/validationotp/';
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


	public function logout(){
           
		$array_items = array(
		'session_token', 
		'session_email',
		'is_logged_in'
		);

        $this->session->unset_userdata($array_items);
        $this->session->set_flashdata('msg', 'User Signed Out Now!');
        redirect('Login');
    }


    public function register(){
		$body = array(
	    	'fullname' => $this->input->post('fullname'),
	    	'phonenumber' => $this->input->post('phonenumber'),
	    	'email' => $this->input->post('email'),
	    	'password' => $this->input->post('password'),
	    	'referral' => $this->input->post('referral'),
	    	'pin' => $this->input->post('pin'),
	    	'secretkey' => $this->secretkey
	    );

	    $encrypted_string = $this->encrypt->encode(json_encode($body));
	    $data = array(
	    	'data' => $encrypted_string 
	    );

	    $url = 'api/auth/register/';
	    $exec = $this->bs->post_curl($url,$data);
	    echo json_encode($exec);
	}


	public function check_session(){

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'http://localhost/jajanpulsa_api/api/auth/checksession',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS =>'{
		    "userid": "6820220416115622",
		    "session_id":"ac7aed549c50c4bb70a0bd1795e4d05b",
		    "secretkey": "asoy"
		}',
		  CURLOPT_HTTPHEADER => array(
		    'Content-Type: application/json'
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		// echo $response;

		$json = json_decode($response,true);
		echo $json['status'];

	}
}