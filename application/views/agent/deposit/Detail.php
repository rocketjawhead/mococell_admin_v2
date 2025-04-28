<!-- Content wrapper -->
<div class="content-wrapper">
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Detail /</span> <?php echo '#'.$this->uri->segment(4);?></h4>

<!-- Images -->
<div class="row mb-5">
<div class="col-md-6 col-xl-6">
<div class="card mb-3">
      <?php if ($upload_receipt == '1') {?>
      <img style="padding: 10px;border-radius: 10px;" src="<?php echo $imageurl;?>">
      <?php }else{?>
      <img style="padding: 10px;border-radius: 10px;" src="<?php echo base_url()?>assets/admin/img/noimage.png">
      <center>
        <h4>Ready to Waiting Upload by Customer</h4>
      </center>
      <?php }?>
      <marquee>Pastikan bukti transfer sesuai dengan transaksi yang masuk ke m-banking anda. Pastikan nominal dan sender name sesuai</marquee>
      <?php if ($status_payment == 'unpaid' && $upload_receipt == '1') {?>
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
      <?php }?>
</div>
</div>
<div class="col-md-6 col-xl-6">
<div class="card mb-3">
  <div class="card-body">
    <div style="padding: 10px;">
      <button class="btn btn-success btn-sm btn-block" onClick="exec_trx();">Execution Transaction</button><hr/>
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
                  <!-- <tr>
                    <td><b>Trx Number</b></td>
                    <td><?php echo $trx_number;?></td>
                  </tr> -->
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
                  <tr>
                    <td><b>Transaction Date</b></td>
                    <td><?php echo $create_date;?></td>
                  </tr>
                  <tr>
                    <td><b>Payment Status</b></td>
                    <td><?php echo $status_payment;?></td>
                  </tr>

                  <tr>
                    <td><b>Remarks</b></td>
                    <td><?php echo $remarks_deposit;?></td>
                  </tr>

                  <tr>
                    <td><b>Sender Name</b></td>
                    <td><?php echo $sender_name;?></td>
                  </tr>
                </tbody>
              </table>
            </div>
            </div>
          </div>
        </div>
      </div>
      <!--/ Images -->


    </div>
    <!-- / Content -->
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
</script>
<script type="text/javascript">
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
</script>
