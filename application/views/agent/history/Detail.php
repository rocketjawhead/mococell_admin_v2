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
    <!-- <button class="btn btn-success btn-sm btn-block" onClick="exec_trx();">Execution Transaction</button> -->
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
                    <td><p class="trx_id" id="trx_id"></p></td>
                  </tr>
                  <tr>
                    <td><b>Type</b></td>
                    <td class="trx_type" id="trx_type"></td>
                  </tr>
                  <tr>
                    <td><b>Transaction Code</b></td>
                    <td id="trx_code"></td>
                  </tr>
                  <tr>
                    <td><b>Trx Number</b></td>
                    <td id="trx_number"></td>
                  </tr>
                  <tr>
                    <td><b>Operation</b></td>
                    <td id="trx_op"></td>
                  </tr>
                  <tr>
                    <td><b>Detail</b></td>
                    <td id="trx_details"></td>
                  </tr>
                  <tr>
                    <td><b>Total</b></td>
                    <td id="trx_price"></td>
                  </tr>
                  <tr>
                    <td><b>Grand Total</b></td>
                    <td id="trx_total"></td>
                  </tr>
                  <tr>
                    <td><b>Payment Method</b></td>
                    <td id="payment_method"></td>
                  </tr>
                  <tr>
                    <td><b>Transaction Date</b></td>
                    <td id="trx_date"></td>
                  </tr>
                  <tr>
                    <td><b>Status Payment</b></td>
                    <td id="status_payment"></td>
                  </tr>
                  <tr>
                    <td><b>Status Transaction</b></td>
                    <td id="status_name"></td>
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
              <tbody id="list_history_refund">
                  
              </tbody>
            </table>
          </div>
          </div>
          </div>
        </div>
      </div>
      <!--/ Images -->

<!--       <script type="text/javascript">
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
      // console.log('hit');
      //start
      $.ajax({
          type: "GET",
          dataType: 'json',
          url: "<?php echo base_url();?>Auth/get_csrf", 
          success: function (data) {
            var csrf_token = data.csrf_token;
            var csrf_name = '<?php echo $csrf_name;?>';
            // alert(csrf_token);
            // console.log('hit -> '+csrf_token);
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
    </script> -->

<script src="<?php echo base_url()?>assets/vendor/libs/jquery/jquery.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
        detail_trx();

    });

  function detail_trx(){
    $.ajax({
            type: "GET",
            dataType: 'json',
            url: "<?php echo base_url();?>Auth/get_csrf", 
            success: function (data) {
                // console.log('asd');
                var csrf_token = data.csrf_token;
                var csrf_name = '<?php echo $csrf_name;?>';
                var trx_id = '<?php echo $this->uri->segment(4);?>';
                //submit req
                $.ajax({
                  url : "<?php echo base_url();?>agent/history/view_detail/",
                  method : "POST",
                  data : {
                    trx_id:trx_id,
                    [csrf_name] : csrf_token,
                  },
                  async : false,
                  dataType : 'json',
                  success: function(data){
                    var response = data;
                    history_refund();

                    var trx_id = data.Data.trx_id;
                    var trx_date = data.Data.trx_date;
                    var trx_code = data.Data.trx_code;
                    var trx_op = data.Data.trx_op;
                    var trx_type = data.Data.trx_type;
                    var trx_number = data.Data.trx_number;
                    var trx_details = data.Data.trx_details;
                    var trx_price = data.Data.trx_price;
                    var trx_fee = data.Data.trx_fee;
                    var trx_total = data.Data.trx_total;
                    var status_payment = data.Data.status_payment;
                    var payment_method = data.Data.payment_method;
                    var status_name = data.Data.status_name;
                    var rc_callback = data.Data.rc_callback;

                    $('#trx_id').text(trx_id);
                    $('#trx_date').text(trx_date);
                    $('#trx_code').text(trx_code);
                    $('#trx_op').text(trx_op);
                    $('#trx_type').text(trx_type);
                    $('#trx_number').text(trx_number);
                    $('#trx_details').text(trx_details);
                    $('#trx_price').text(trx_price);
                    $('#trx_fee').text(trx_fee);
                    $('#trx_total').text(trx_total);
                    $('#status_payment').text(status_payment);
                    $('#status_name').text(status_name);
                    $('#rc_callback').text(rc_callback);
                    console.log('post trx_id '+JSON.stringify(response));
                  }
                });
                //end submit
            }
            });
  }

  function history_refund(){
    $.ajax({
            type: "GET",
            dataType: 'json',
            url: "<?php echo base_url();?>Auth/get_csrf", 
            success: function (data) {
                // console.log('asd');
                var csrf_token = data.csrf_token;
                var csrf_name = '<?php echo $csrf_name;?>';
                var trx_id = '<?php echo $this->uri->segment(4);?>';
                //submit req
                $.ajax({
                  url : "<?php echo base_url();?>agent/history/view_history_refund/",
                  method : "POST",
                  data : {
                    trx_id:trx_id,
                    [csrf_name] : csrf_token,
                  },
                  async : false,
                  dataType : 'json',
                  success: function(data){
                    var response = data;

                    console.log('post view_history_refund '+JSON.stringify(response));

                    var response_list_history_refund = data.Data;
                    //start
                    response_list_history_refund.forEach(item => {
                        $('#list_history_refund').append(`
                        <tr>
                          <td><b>${item.create_date}</b></td>
                          <td>${item.userid}</td>
                          <td>${item.trx_id}</td>
                          <td>${item.log_title}</td>
                          <td>${item.log_request}</td>
                          <td>${item.log_response}</td>
                        </tr>
                        `);
                    });
                    //end
                  }
                });
                //end submit
            }
            });
  }
</script>

</div>


  