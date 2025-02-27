<!-- Content wrapper -->
<div class="content-wrapper">
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Detail /</span> <?php echo '#'.$this->uri->segment(4);?></h4>

<!-- Images -->
<div class="row mb-5">

<div class="col-md-12 col-xl-12">
<div class="card mb-3">

  <div class="card-body">
    <?php echo '#'.$this->uri->segment(4);?>
    <button class="btn btn-success btn-sm btn-block" onClick="exec_trx();">Execution Transaction</button>
    <button class="btn btn-primary btn-sm btn-block" onClick="check_status();">Check Status</button>
    <div style="padding: 10px;">
              <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Item</th>
                    <th>Description</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><b>Transaction ID</b></td>
                    <td><?php echo $trx_id;?></td>
                  </tr>
                  <tr>
                    <td><b>Type</b></td>
                    <td><?php echo $trx_type;?></td>
                  </tr>
                  <tr>
                    <td><b>Transaction Code</b></td>
                    <td><?php echo $trx_code;?></td>
                  </tr>
                  <tr>
                    <td><b>Trx Number</b></td>
                    <td><?php echo $trx_number;?></td>
                  </tr>
                  <tr>
                    <td><b>Operation</b></td>
                    <td><?php echo $trx_op;?></td>
                  </tr>
                  <tr>
                    <td><b>Detail</b></td>
                    <td><?php echo $trx_details;?></td>
                  </tr>
                  <tr>
                    <td><b>Total</b></td>
                    <td><?php echo $trx_price;?></td>
                  </tr>
                  <tr>
                    <td><b>Grand Total</b></td>
                    <td><?php echo 'Rp '.$trx_total;?></td>
                  </tr>
                  <tr>
                    <td><b>Payment Method</b></td>
                    <td><?php echo $payment_method;?></td>
                  </tr>
                  <!-- <tr>
                    <td><b>Payment Method</b></td>
                    <td><?php echo $payment_method;?></td>
                  </tr> -->
                  <tr>
                    <td><b>Transaction Date</b></td>
                    <td><?php echo $trx_date;?></td>
                  </tr>
                  <tr>
                    <td><b>Status Payment</b></td>
                    <td><?php echo strtoupper($status_payment);?></td>
                  </tr>
                  <tr>
                    <td><b>Status Transaction</b></td>
                    <td><?php echo $status_name;?></td>
                  </tr>

                  <?php 
                  if($upload_receipt == 1 && $id_payment_method == '2'){?>  

                  <tr>
                    <td><b>Detail Transfer</b></td>
                    <td>
                      <table class="table table-bordered" id="" width="100%" cellspacing="0" style="margin-top: 10px;">
                        <tr>
                          <th>Item</th>
                          <th>Value</th>
                        </tr>
                        <tr>
                          <td>Proof Transfer</td>
                          <td><img src="<?php echo $trf_img;?>" height="400px" width="200px"></td>
                        </tr>
                        <tr>
                          <td>Receive Bank</td>
                          <td><?php echo $rcv_bank;?></td>
                        </tr>
                        <tr>
                          <td>Sender Bank</td>
                          <td><?php echo $sender_bank;?></td>
                        </tr>
                        <?php if ($status_payment == 'unpaid' && $upload_receipt == '1') {?>
                        <tr>
                          <td>
                            Action
                          </td>
                          <td>
                            <marquee>Pastikan bukti transfer sesuai dengan transaksi yang masuk ke m-banking anda. Pastikan nominal dan sender name sesuai</marquee>
                            
                              <div class="form-group" style="padding: 10px;">
                                <label>OTP Code</label>
                                <button id="generate_otp" class="btn btn-info btn-sm" onClick="request_otp();">OTP</button>
                                <input type="number" class="form-control" name="otp" id="otp" maxlength="4">
                                <br/>
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" id="password">
                                <br/>
                                <button class="btn btn-primary btn-sm btn-block" onClick="confirm_paid();">Confirm</button>
                              </div>
                            
                          </td>
                        </tr>
                        <?php }?>
                      </table>
                    </td>
                  </tr>

                  <?php }?>




                  <?php 

                  if($is_refund == 0 && $status_transaction == '3'){?>
                  <tr>
                    <td><b>Complaint Img</b></td>
                    <td>
                      <img src="<?php echo $imageurl;?>">
                    </td>
                  </tr>
                  <tr>
                    <td><b>Action</b></td>
                    <td>
                      <div class="form-group">
                        <label>Sender Bank</label>
                        <input type="text" class="form-control" name="sender_bank" id="sender_bank">
                      </div>
                      <div class="form-group">
                        <label>Receiver Bank</label>
                        <input type="text" class="form-control" name="rcv_bank" id="rcv_bank">
                      </div>
                      <div class="form-group">
                        <label>Amount Refund</label>
                        <input type="text" class="form-control" name="amount_refund" id="amount_refund">
                      </div>
                      <div class="form-group">
                        <label>Confirmation Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="************">
                      </div>
                      <br/>
                      <button onClick="confirm_refund()" class="btn btn-primary btn-sm btn-block">Refund Transaction</button>
                    </td>
                  </tr>
                  <?php }?>
                </tbody>
              </table>
            </div>
            </div>
          </div>
        </div>


        <div class="row">
        <div class="col-lg-12">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Log Transaction</h6>
            </div>
            <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Log Date</th>
                  <th>User ID</th>
                  <th>Trx ID</th>
                  <th>Log Title</th>
                  <th>Log Request</th>
                  <th>Log Response</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php
                $json = json_encode($list_history_refund); 
                $json_decoded = json_decode($json); 
                foreach($json_decoded as $row){ ?>
                  <tr>
                    <td><b><?php echo $row->create_date;?></b></td>
                    <td><?php echo $row->userid;?></td>
                    <td><?php echo $row->trx_id;?></td>
                    <td><?php echo $row->log_title;?></td>
                    <td><?php echo $row->log_request;?></td>
                    <td><?php echo $row->log_response;?></td>
                  </tr>
                <?php }?>
              </tbody>
            </table>
          </div>
          </div>
          </div>
        </div>
      </div>
      <!--/ Images -->
      <div class="row">
        <div class="col-lg-12">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Complaint</h6>
            </div>
            <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Payment</th>
            <th>Payment Issuer</th>
            <th>WhatsApp</th>
            <th>Status</th>
            <th>Error RC</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
        <?php
        $json = json_encode($list_complaint); 
        $json_decoded = json_decode($json); 
        foreach($json_decoded as $row){ ?>
          <tr>
            <td>
              <a href="<?php echo base_url('agent/refund/detail')?>/<?php echo $row->trx_id;?>">
                <strong>#<?php echo $row->trx_id;?></strong>
                <br/>
                <?php echo $row->create_date;?>
              </a>
            </td>
            <td><?php echo $row->title_complaint;?></td>
            <td><?php echo $row->desc_complaint;?></td>
            <td><?php echo $row->payment_method;?></td>
            <td><?php echo $row->source_payment;?></td>
            <td><?php echo $row->phonenumber;?></td>
            <td><?php echo $row->status_complaint;?></td>
            <td><?php echo $row->rc_msg;?></td>
          </tr>
        <?php }?>
        </tbody>
      </table>
          </div>
          </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Refund</h6>
            </div>
            <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped">
        <thead>
          <tr>
            <th>Sender Bank</th>
            <th>Receiver Bank</th>
            <th>Amount Bank</th>
            <th>Create Date</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
        <?php
        $json = json_encode($log_refund); 
        $json_decoded = json_decode($json); 
        foreach($json_decoded as $row){ ?>
          <tr>
            <td><?php echo $row->sender_bank;?></td>
            <td><?php echo $row->rcv_bank;?></td>
            <td><?php echo 'Rp.'.number_format($row->amount);?></td>
            <td><?php echo $row->create_date;?></td>
          </tr>
        <?php }?>
        </tbody>
      </table>
          </div>
          </div>
          </div>
        </div>
      </div>

      <script type="text/javascript">
        function confirm_refund(){
              var _trx_id = '<?php echo $trx_id;?>';
              var _invoice_code = '<?php echo $trx_code;?>'+'.'+'<?php echo $trx_number;?>';
              var val_password = $('#password').val();

              var sender_bank = $('#sender_bank').val();
              var rcv_bank = $('#rcv_bank').val();
              var amount_refund = $('#amount_refund').val();

              // alert(_trx_id + val_password);
              //start
              $.ajax({
                  type: "GET",
                  dataType: 'json',
                  url: "<?php echo base_url();?>Auth/get_csrf", 
                  success: function (data) {
                    var csrf_token = data.csrf_token;
                    var csrf_name = '<?php echo $csrf_name;?>';
                    // alert(csrf_token);

                    //start
                    $.ajax({
                      url : "<?php echo base_url();?>agent/Transaction/confirm_refund",
                      method : "POST",
                      data : {
                        trx_id: _trx_id,
                        sender_bank: sender_bank,
                        rcv_bank : rcv_bank,
                        amount_refund : amount_refund,
                        invoice_id: _invoice_code,
                        password : val_password,
                        [csrf_name] : csrf_token,

                      },
                      async : false,
                      dataType : 'json',
                      success: function(data){
                        var status = data.status;
                        console.log(JSON.stringify(data));
                        if (status == 'Success') {
                          alert(data.message);
                          location.reload();
                        }else{
                          alert(data.message);
                          location.reload();
                        }
                      }
                    });
                    //end
                  }
              });
              //end

              
            }
      </script>
      <script type="text/javascript">
    function request_otp(){
            var id = '<?php echo $trx_id;?>';
            // alert(id);
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "<?php echo base_url();?>Auth/get_csrf", 
                success: function (data) {
                  var csrf_token = data.csrf_token;
                  var csrf_name = '<?php echo $csrf_name;?>';
                  // alert(csrf_token);

                  //start
                  $.ajax({
                    url : "<?php echo base_url();?>agent/Transaction/otp_paid",
                    method : "POST",
                    data : {
                      trx_id: id,
                      [csrf_name] : csrf_token,
                    },
                    async : false,
                    dataType : 'json',
                    success: function(data){
                      var status = data.status;
                      console.log(JSON.stringify(data));
                      if (status == 'Success') {
                        alert(data.message);
                        location.reload();
                      }else{
                        alert(data.message);
                        location.reload();
                      }
                    }
                  });
                  //end
                }
            });
    }


    //
    function confirm_paid(){

      var val_otp = $('#otp').val();
      var val_password = $('#password').val();

      //start
      $.ajax({
          type: "GET",
          dataType: 'json',
          url: "<?php echo base_url();?>Auth/get_csrf", 
          success: function (data) {
            var csrf_token = data.csrf_token;
            var csrf_name = '<?php echo $csrf_name;?>';
            // alert(csrf_token);

            //start
            $.ajax({
              url : "<?php echo base_url();?>agent/Transaction/confirm_paid",
              method : "POST",
              data : {
                trx_id: '<?php echo $trx_id;?>',
                otp : val_otp,
                password : val_password,
                [csrf_name] : csrf_token,

              },
              async : false,
              dataType : 'json',
              success: function(data){
                var status = data.status;
                console.log(JSON.stringify(data));
                if (status == 'Success') {
                  alert(data.message);
                  location.reload();
                }else{
                  alert(data.message);
                  location.reload();
                }
              }
            });
            //end
          }
      });
      //end

      
    }

    function exec_trx(){
      console.log('hit exec');
      //start
      $.ajax({
          type: "GET",
          dataType: 'json',
          url: "<?php echo base_url();?>Auth/get_csrf", 
          success: function (data) {
            var csrf_token = data.csrf_token;
            var csrf_name = '<?php echo $csrf_name;?>';
            // alert(csrf_token);
            console.log('hit -> '+csrf_token);
            //start
            $.ajax({
              url : "<?php echo base_url();?>agent/Transaction/dir_exec_trx",
              method : "POST",
              data : {
                trx_id: '<?php echo $trx_id;?>',
                [csrf_name] : csrf_token,

              },
              async : false,
              dataType : 'json',
              success: function(data){
                // var status = data.status;
                console.log(JSON.stringify(data));
                // if (status == 'Success') {
                  alert(JSON.stringify(data));
                  location.reload();
                // }else{
                //   alert(data.message);
                //   location.reload();
                // }
              }
            });
            //end
          }
      });
      //end

      
    }

    function check_status(){
      console.log('hit');
      //start
      $.ajax({
          type: "GET",
          dataType: 'json',
          url: "<?php echo base_url();?>Auth/get_csrf", 
          success: function (data) {
            var csrf_token = data.csrf_token;
            var csrf_name = '<?php echo $csrf_name;?>';
            // alert(csrf_token);
            console.log('hit -> '+csrf_token);
            //start
            $.ajax({
              url : "<?php echo base_url();?>agent/Transaction/dir_check_status",
              method : "POST",
              data : {
                trx_id: '<?php echo $trx_id;?>',
                [csrf_name] : csrf_token,

              },
              async : false,
              dataType : 'json',
              success: function(data){
                // var status = data.status;
                console.log(JSON.stringify(data));
                // if (status == 'Success') {
                  alert(JSON.stringify(data));
                  location.reload();
                // }else{
                //   alert(data.message);
                //   location.reload();
                // }
              }
            });
            //end
          }
      });
      //end

      
    }
    </script>

    </div>


  