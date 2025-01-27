<?php
class M_base extends CI_Model {

      public function __construct()
      {
              parent::__construct();
              $this->service_url = $this->config->item("service_url");
              $this->service_url_mobile = $this->config->item("service_url_mobile");

              $this->secretkey = $this->config->item('secretkey');
              $this->random_code = rand(100000,999999);
      }
     

      //CURL PHP
    function post_curl($url,$data){

            $random_code = $this->random_code;
            $content = json_encode($data);

            $service_url = $this->service_url.$url;

            date_default_timezone_set('Asia/Jakarta');

            $start_curl_post = date('Y-m-d h:i:s');

            $curl = curl_init($service_url);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST"); 
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER,array("Content-type: application/json",'Content-Length: ' . strlen($content)));
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_TIMEOUT, 15);//10 detik timedelay simulator
            curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);

            //log_activity
            $this->post_curl_activity($url,$data,$random_code);
            //log activity

            $response = curl_exec($curl);
            $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);    
            //log_activity
            $this->post_curl_activity($url,json_decode($response),$random_code);
            //log activity
            curl_close($curl);
            return $response = json_decode($response,true);
    }

    function check_session($session_userid,$session_id){

      $body = array(
        'userid' => $session_userid,
        'session_id' => $session_id,
        'secretkey' => $this->secretkey
      );

      $encrypted_string = $this->encrypt->encode(json_encode($body));
      $data_req = array(
        'data' => $encrypted_string 
      );

      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => $this->service_url.'api/auth/checksession',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($data_req),
        CURLOPT_HTTPHEADER => array(
          'Content-Type: application/json'
        ),
      ));

      $response = curl_exec($curl);

      curl_close($curl);
      // echo $response;

      $json = json_decode($response,true);
      // echo $json['responsecode'];
      // die();
      return $json['responsecode'];
    }

    function post_curl_token($session_userid,$session_id,$url,$data){

      //checking session id

      $checking_session = $this->check_session($session_userid,$session_id);

      if ($checking_session == '00') {
        $random_code = $this->random_code;
        $content = json_encode($data);
        $service_url = $this->service_url.$url;
        $token = 'Bearer '.$this->session->userdata('session_token');
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => $service_url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => $content,
          CURLOPT_HTTPHEADER => array(
            'Authorization:'.$token,
            'Content-Type: application/json',
          ),
        ));

        $response = curl_exec($curl);

        //log_activity
        $this->post_curl_activity($url,$data,$random_code);
        //log activity

        //log_activity
        $this->post_curl_activity($url,json_decode($response),$random_code);
        //log activity


        curl_close($curl);
        // return $response;
        if (isset($response)) {
            $decode = json_decode($response);
            // if ($decode->status == 'Expired token') {
            if ($decode->responsecode == '501') {
              redirect('agent/pin/index');
            }else{
              return $response = json_decode($response,true);
            }
          }else{
            $data = array(
              'status' => 'Failed',
              'message' => 'Request Time Out',
              'responsecode' => 500 
            );

            return json_encode($data);
          }
      }else{
        redirect('Login/logout');
        // echo "different session ID";
        // die();
      }
      
    }
    //curl bearer token


    function post_curl_activity($url,$data,$random_code){

            $content = array(
              'userid' => $this->session->userdata('session_userid'),
              'url_path' => $url,
              'json_param' => json_encode($data),
              'random_code' => $random_code,
              'secretkey' => $this->secretkey
            );
            $content = json_encode($content);
            // echo json_encode($content);
            // die();

            $url_service = 'api/base/logactivity/';
            $service_url = $this->service_url.$url_service;

            date_default_timezone_set('Asia/Jakarta');

            $start_curl_post = date('Y-m-d h:i:s');

            $curl = curl_init($service_url);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST"); 
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER,array("Content-type: application/json",'Content-Length: ' . strlen($content)));
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_TIMEOUT, 15);//10 detik timedelay simulator
            curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);

            $response = curl_exec($curl);
            $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);    

            curl_close($curl);
            $response = json_decode($response,true);

    }

    function main_menu(){
      $session_userid = $this->session->userdata('session_userid'); 
      $session_id = $this->session->userdata('session_id');

      $data = array(
        'secretkey' => $this->secretkey
      );

      $encrypted_string = $this->encrypt->encode(json_encode($data));
      $data_req = array(
            'data' => $encrypted_string 
      );

      $url = 'api/settings/mainmenu';
      $get_menu = $this->post_curl_token($session_userid,$session_id,$url,$data_req);
      return json_encode($get_menu['Data']);
    }

    function post_curl_direct($url,$data){

            $random_code = $this->random_code;
            $content = json_encode($data);

            $service_url = $this->service_url_mobile.$url;

            // echo $service_url;
            date_default_timezone_set('Asia/Jakarta');

            $start_curl_post = date('Y-m-d h:i:s');

            $curl = curl_init($service_url);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST"); 
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER,array("Content-type: application/json",'Content-Length: ' . strlen($content)));
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_TIMEOUT, 15);//10 detik timedelay simulator
            curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);

            //log_activity
            $this->post_curl_activity($url,$data,$random_code);
            //log activity

            $response = curl_exec($curl);
            $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);    
            //log_activity
            $this->post_curl_activity($url,json_decode($response),$random_code);
            //log activity
            curl_close($curl);
            return $response = json_decode($response,true);
    }

  //   function create_captcha(){
  //   $options = array(
  //     'img_path'  => './captcha/',
  //     'img_url' => base_url('captcha'),
  //     // 'img_url'  => '/ci-chapca/captcha/',
  //     'img_width' => '150',
  //     'img_height'=> '30',
  //     'word_length' => 5,
  //     'font_size'  => 26,
  //     'expiration'=> 7200
  //   );

  //   $cap = create_captcha($options);
  //   $image = $cap['image'];

  //   $this->session->set_userdata('captchaword',$cap['word']);

  //   return $image;
  // }


    
}
?>