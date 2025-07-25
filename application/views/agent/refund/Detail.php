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
                  <!-- <tr>
                    <td><b>Payment Method</b></td>
                    <td><?php echo $payment_method;?></td>
                  </tr> -->
                  <tr>
                    <td><b>Transaction Date</b></td>
                    <td><?php echo $create_date;?></td>
                  </tr>
                  <tr>
                    <td><b>Payment Status</b></td>
                    <td><?php echo $status_transaction_desc;?></td>
                  </tr>

                  <?php 

                  if($is_refund == 0 && $status_transaction == '3'){?>
                  <tr>
                    <td><b>Password</b></td>
                    <td><input type="password" class="form-control" name="password" id="password" placeholder="input password"></td>
                  </tr>
                  <tr>
                    <td><b>Action</b></td>
                    <td><button onClick="confirm_refund()" class="btn btn-primary btn-sm btn-block">Refund Transaction</button></td>
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

      <script type="text/javascript">
        function confirm_refund(){
              var _trx_id = '<?php echo $trx_id;?>';
              var _invoice_code = '<?php echo $trx_code;?>'+'.'+'<?php echo $trx_number;?>';
              var val_password = $('#password').val();

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
                        invoice_id: _invoice_code,
                        password : val_password,
                        [csrf_name] : csrf_token,

                      },
                      async : false,
                      dataType : 'json',
                      success: function(data){
                        // var status = data.status;
                        console.log(JSON.stringify(data));
                        // if (status == 'Success') {
                        //   alert(data.message);
                        //   location.reload();
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


  