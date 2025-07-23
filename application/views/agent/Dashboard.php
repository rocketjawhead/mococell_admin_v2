

<!-- Content wrapper -->
<div class="content-wrapper">
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

  <!-- start -->
  <div class="row">
    <div class="col-lg-12 mb-4 order-0">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-sm-7">
            <div class="card-body">
              <h5 class="card-title text-primary">Semangattt untuk hari ini John! 🎉</h5>
              <p class="mb-4">
                You have done <span class="fw-bold trx_today" id="trx_today">
                  Volume Rp <span id="success_month_qty">0</span> & 
                  Qty <span id="success_month_qty">0</span></span> 
                more sales month. Yuk bisa yuk
              </p>

              <h2 class="balance_system" id="balance_system">Balance: <span id="total_balance_system">0</span></h2>
            </div>
          </div>
          <div class="col-sm-5 text-center text-sm-left">
            <!-- start -->
            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse" style="margin-right: 10px;">
              <ul class="navbar-nav flex-row align-items-center ms-auto">
                

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="<?php echo base_url()?>assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="<?php echo base_url()?>assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">John Doe</span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="auth-login-basic.html">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
            <!-- end -->
            <div class="card-body pb-0 px-0 px-md-4">
              <img
                src="<?php echo base_url()?>assets/img/illustrations/man-with-laptop-light.png"
                height="140"
                alt="View Badge User"
                data-app-dark-img="illustrations/man-with-laptop-dark.png"
                data-app-light-img="illustrations/man-with-laptop-light.png"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-12 col-md-4 order-1">
      <div class="row">
        <div class="col-lg-4 col-md-12 col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-3">
                  <img
                    src="<?php echo base_url()?>assets/img/icons/unicons/wallet-info.png"
                    alt="Credit Card"
                    class="rounded"
                  />
                </div>
                <div class="col-md-9">
                  <span>Pending</span>
                  <h3 class="card-title text-nowrap mb-1">
                    <div class="pending_today_qty" id="pending_today_qty"></div>
                    <span><i class="bx bx-right-arrow-alt text-success pending_yesterday_qty" id="pending_yesterday_qty"></i></span> 
                  </h3>
                </div>
              </div>
              
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12 col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-3">
                  <img
                    src="<?php echo base_url()?>assets/img/icons/unicons/wallet-info.png"
                    alt="Credit Card"
                    class="rounded"
                  />
                </div>
                <div class="col-md-9">
                  <span>Success</span>
                  <h3 class="card-title text-nowrap mb-1">
                    <div class="success_today_qty" id="success_today_qty"></div>
                    <span><i class="bx bx-right-arrow-alt text-success success_yesterday_qty" id="success_yesterday_qty"></i></span>
                  </h3>
                </div>
              </div>
              
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12 col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-3">
                  <img
                    src="<?php echo base_url()?>assets/img/icons/unicons/wallet-info.png"
                    alt="Credit Card"
                    class="rounded"
                  />
                </div>
                <div class="col-md-9">
                  <span>Volume</span>
                  <h3 class="card-title text-nowrap mb-1">
                    <div class="success_today_balance" id="success_today_balance"></div>
                    <span><i class="bx bx-right-arrow-alt text-success success_yesterday_balance" id="success_yesterday_balance"></i></span>
                  </h3>
                </div>
              </div>
              
            </div>
          </div>
        </div>


      </div>
    </div>
    <!--/ Total Revenue -->
  </div>
  <!-- end -->
  
  <div class="row">
    <!-- error log rc -->
    <div class="col-md-12 col-lg-12 order-2 mb-4">
      <div class="card h-100">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="card-title m-0 me-2">Error RC Payment</h5>
        </div>
        <div class="card-body">
          <div class="table-responsive text-nowrap">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>RC</th>
                <th>Message</th>
                <th>Status</th>
                <th>Transaction</th>
                <th>Parnert Name</th>
                <th>Trx Date</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0 list_current_month_error" id="list_current_month_error">
              
            </tbody>
          </table>
        </div>
        </div>
      </div>
    </div>
    <!-- end error log rc -->

    <!-- error log rc -->
    <div class="col-md-12 col-lg-12 order-2 mb-4">
      <div class="card h-100">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="card-title m-0 me-2">Item Deactive</h5>
        </div>
        <div class="card-body">
          <div class="table-responsive text-nowrap">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Code</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Product Name</th>
                <th>Product Description</th>
                
              </tr>
            </thead>
            <tbody class="table-border-bottom-0 list_item_deactive" id="list_item_deactive">

            </tbody>
          </table>
        </div>
        </div>
      </div>
    </div>
    <!-- end error log rc -->

  </div>

</div>
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
                  url : "<?php echo base_url();?>agent/dashboard/viewdata_dashboard/",
                  method : "POST",
                  data : {
                    [csrf_name] : csrf_token,
                  },
                  async : false,
                  dataType : 'json',
                  success: function(data){
                    var response = data;
                    var response_current_month_error = data.Data.current_month_error;
                    var response_list_item_deactive = data.Data.list_item_deactive;

                    var success_month_qty = response.Data.success_month_qty;
                    var success_month_balance = response.Data.trx_success_month_balance;
                    var total_balance_system = response.Data.total_balance_system;
                    var success_today_qty = response.Data.trx_success_today_qty;
                    var success_today_balance = response.Data.trx_success_today_balance;
                    var success_yesterday_qty = response.Data.trx_success_yesterday_qty;
                    var success_yesterday_balance = response.Data.trx_success_yesterday_balance;
                    var pending_today_qty = response.Data.trx_pending_today_qty;
                    var pending_yesterday_qty = response.Data.trx_pending_yesterday_qty;

                    console.log('pending_today_qty '+ pending_today_qty);


                    $('#success_month_qty').text(success_month_qty);
                    $('#success_month_balance').text(success_month_balance);
                    $('#total_balance_system').text(total_balance_system);
                    $('#success_today_qty').text(success_today_qty);
                    $('#success_today_balance').text(success_today_balance);
                    $('#success_yesterday_qty').text(success_yesterday_qty);
                    $('#success_yesterday_balance').text(success_yesterday_balance);
                    $('#pending_today_qty').text(pending_today_qty);
                    $('#pending_yesterday_qty').text(pending_yesterday_qty);


                    
                    // console.log('post response '+JSON.stringify(response_list_item_deactive));

                    //start
                    response_current_month_error.forEach(item => {
                        $('#list_current_month_error').append(`
                          <tr>
                            <td>${item.rc_hit}</td>
                            <td>${item.rc_msg}</td>
                            <td>
                              <span class="${item.status_badge}">${item.status}</span>
                            </td>
                            <td>${item.transaction}</td>
                            <td>${item.partner_name}</td>
                            <td>${item.trx_date}</td>
                            <td>${item.qty}</td>
                          </tr>`);
                    });
                    //end

                    //start
                    response_list_item_deactive.forEach(item => {
                        $('#list_item_deactive').append(`
                          <tr>
                            <td>${item.buyer_sku_code}</td>
                            <td>${item.category}</td>
                            <td>${item.brand}</td>
                            <td>${item.product_name}</td>
                            <td>${item.desc_product}</td>
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
<script type="text/javascript">
    function refresh_item(){        
      $.ajax({
          url: "https://servicesapi.mococell.com/api/load/inquiryprepaid",
          type: 'GET',
          dataType: 'json', // added data type
          success: function(res) {
              console.log(JSON.stringify(res));
              alert(JSON.stringify(res));
              location.reload();
          }
      });
    }
</script>

