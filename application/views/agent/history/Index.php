<!-- Content wrapper -->
<div class="content-wrapper">
            <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">History /</span> Transaction</h4>
    <div class="row">
      <div class="col-xl-12">
        <div class="nav-align-top mb-4">
          <ul class="nav nav-tabs nav-fill" role="tablist">
            <li class="nav-item">
              <button
                type="button"
                class="nav-link active"
                role="tab"
                data-bs-toggle="tab"
                data-bs-target="#navs-justified-home"
                aria-controls="navs-justified-home"
                aria-selected="true"
              >
                <i class="tf-icons bx bx-home"></i> All
              </button>
            </li>
            <li class="nav-item">
              <button
                type="button"
                class="nav-link"
                role="tab"
                data-bs-toggle="tab"
                data-bs-target="#navs-justified-profile"
                aria-controls="navs-justified-profile"
                aria-selected="false"
              >
                <i class="tf-icons bx bx-sync"></i> Pending 

                <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-primary total_pending" id="total_pending"></span>
                


              </button>
            </li>
            <li class="nav-item">
              <button
                type="button"
                class="nav-link"
                role="tab"
                data-bs-toggle="tab"
                data-bs-target="#navs-justified-messages"
                aria-controls="navs-justified-messages"
                aria-selected="false"
              >
                <i class="tf-icons bx bx-message-error"></i> Refund 
                <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger total_refund" id="total_refund"></span>
              </button>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Number</th>
                    <th>Sku Code</th>
                    <th>Amount</th>
                    <th>Total Trx</th>
                    <th>Payment</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0 list_history_all" id="list_history_all">
                  
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="navs-justified-profile" role="tabpanel">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Number</th>
                    <th>Sku Code</th>
                    <th>Amount</th>
                    <th>Total Trx</th>
                    <th>Payment</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0 list_history_pending" id="list_history_pending">
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="navs-justified-messages" role="tabpanel">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Number</th>
                    <th>Sku Code</th>
                    <th>Amount</th>
                    <th>Total Trx</th>
                    <th>Payment</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0 list_history_refund" id="list_history_refund">
                
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Tabs -->
  </div>
  <!-- / Content -->
<script src="<?php echo base_url()?>assets/vendor/libs/jquery/jquery.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $.ajax({
            type: "GET",
            dataType: 'json',
            url: "<?php echo base_url();?>Auth/get_csrf", 
            success: function (data) {
                // console.log('asd');
                var csrf_token = data.csrf_token;
                var csrf_name = '<?php echo $csrf_name;?>';
                //submit req
                $.ajax({
                  url : "<?php echo base_url();?>agent/history/viewdata_dashboard/",
                  method : "POST",
                  data : {
                    [csrf_name] : csrf_token,
                  },
                  async : false,
                  dataType : 'json',
                  success: function(data){
                    var response = data;
                    var response_list_history_all = data.Data.list_history_all;
                    
                    var response_list_history_pending = data.Data.list_history_pending;
                    var total_pending = response.Data.list_history_pending.length;
                    $('#total_pending').text(total_pending);

                    var response_list_history_refund = data.Data.list_history_refund;
                    var total_refund = response.Data.list_history_refund.length;
                    $('#total_refund').text(total_refund);

                    var qty_waiting = response.Data.qty_waiting;
                    var qty_refund = response.Data.qty_refund;



                    
                    console.log('post response_list_history_pending '+JSON.stringify(response_list_history_pending));

                    //start
                    response_list_history_all.forEach(item => {
                        $('#list_history_all').append(`
                          <tr>
                          <td>
                            <a href="<?php echo base_url('agent/History/detail')?>/${item.trx_id}">
                              <strong>#${item.trx_id}</strong>
                              <br/>
                              ${item.trx_date}
                            </a>
                          </td>
                          <td>[${item.trx_op}] ${item.trx_number}</td>
                          <td>${item.trx_code}</td>
                          <td>${item.trx_price}</td>
                          <td>${item.trx_total}</td>
                          <td>${item.payment_method}</td>
                          <td><span class="${item.status_badges}">${item.status_name}</span></td>
                        </tr>`);
                    });
                    //end
                    //start
                    response_list_history_pending.forEach(item => {
                        $('#list_history_pending').append(`
                          <tr>
                          <td>
                            <a href="<?php echo base_url('agent/History/detail')?>/${item.trx_id}">
                              <strong>#${item.trx_id}</strong>
                              <br/>
                              ${item.trx_date}
                            </a>
                          </td>
                          <td>[${item.trx_op}] ${item.trx_number}</td>
                          <td>${item.trx_code}</td>
                          <td>${item.trx_price}</td>
                          <td>${item.trx_total}</td>
                          <td>${item.payment_method}</td>
                          <td><span class="${item.status_badges}">${item.status_name}</span></td>
                        </tr>`);
                    });
                    //end
                    //start
                    response_list_history_refund.forEach(item => {
                        $('#list_history_refund').append(`
                          <tr>
                          <td>
                            <a href="<?php echo base_url('agent/History/detail')?>/${item.trx_id}">
                              <strong>#${item.trx_id}</strong>
                              <br/>
                              ${item.trx_date}
                            </a>
                          </td>
                          <td>[${item.trx_op}] ${item.trx_number}</td>
                          <td>${item.trx_code}</td>
                          <td>${item.trx_price}</td>
                          <td>${item.trx_total}</td>
                          <td>${item.payment_method}</td>
                          <td><span class="${item.status_badges}">${item.status_name}</span></td>
                        </tr>`);
                    });
                    //end


                  }
                });
                //end submit
            }
        });
});
</script>




