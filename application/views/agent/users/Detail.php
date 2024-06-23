

<!-- Content wrapper -->
<div class="content-wrapper">
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

  <!-- start -->
  <div class="row">

    <div class="col-lg-12">
      <div class="row">
        <div class="col-lg-6 col-md-12 col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img
                    src="<?php echo base_url()?>assets/img/icons/unicons/wallet-info.png"
                    alt="Credit Card"
                    class="rounded"
                  />
                </div>
              </div>
              <span>Deposit User</span>
              <h3 class="card-title text-nowrap mb-1"><?php echo number_format($total_deposit_user);?></h3>
              <?php 
              if ($current_depo >= $previous_depo) {
                $txt_depo_label = 'text-success';
                $txt_depo_icon = 'bx bx-up-arrow-alt';
              }else{
                $txt_depo_label = 'text-danger';  
                $txt_depo_icon = 'bx bx-down-arrow-alt';
              }
              if ($previous_depo > 0) {
                $val_previous_depo = $previous_depo;
              }else{
                $val_previous_depo = $current_depo;
              }

              if ($current_depo == 0) {
                $txt_depo_value = 0;
              } else {
                $txt_depo_value = ($current_depo/$val_previous_depo)*100;
              }
              
              
              ?>
              <small class="<?php echo $txt_depo_label;?> fw-semibold"><i class="<?php echo $txt_depo_icon;?>"></i> <?php echo $txt_depo_value;?>%</small>
              
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img
                    src="<?php echo base_url()?>assets/img/icons/unicons/wallet-info.png"
                    alt="Credit Card"
                    class="rounded"
                  />
                </div>
              </div>
              <span>Total Transaction</span>
              <h3 class="card-title text-nowrap mb-1"><?php echo number_format($total_transaction);?></h3>

              <?php 
              if ($current_transaction >= $previous_transaction) {
                $txt_transaction_label = 'text-success';
                $txt_transaction_icon = 'bx bx-up-arrow-alt';
              }else{
                $txt_transaction_label = 'text-danger';  
                $txt_transaction_icon = 'bx bx-down-arrow-alt';
              }
              if ($previous_transaction > 0) {
                $val_previous_transaction = $previous_transaction;
              }else{
                $val_previous_transaction = $current_transaction;
              }

              if ($current_transaction == 0) {
                $txt_transaction_value = 0;
              } else {
                $txt_transaction_value = ($current_transaction/$val_previous_transaction)*100;
              }

              
              ?>
              <small class="<?php echo $txt_transaction_label;?> fw-semibold"><i class="<?php echo $txt_transaction_icon;?>"></i> <?php echo $txt_transaction_value;?>%</small>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-6">
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
                        <td><b>Unique ID</b></td>
                        <td><?php echo $unique_id;?></td>
                      </tr>
                      <tr>
                        <td><b>Email</b></td>
                        <td><?php echo $email;?></td>
                      </tr>
                      <tr>
                        <td><b>Phonenumber</b></td>
                        <td><?php echo $phonenumber;?></td>
                      </tr>
                      <tr>
                        <td><b>Referral Code</b></td>
                        <td><?php echo $referral_code;?></td>
                      </tr>
                      <tr>
                        <td><b>Remarks</b></td>
                        <td><?php echo $remarks;?></td>
                      </tr>
                      <tr>
                        <td><b>Register Date</b></td>
                        <td><?php echo $reg_dtm;?></td>
                      </tr>
                      <tr>
                        <td><b>Status</b></td>
                        <td><?php echo $status;?></td>
                      </tr>
                      <tr>
                        <td><b>Lock Info</b></td>
                        <td>
                          <?php if($is_lock == 1){ ?> 
                            <?php echo $lock_status;?> 
                            <button id="activate_users" class="btn btn-danger rounded-pill btn-sm" onClick="activate_users();">Unlock</button>
                          <?php } else { ?> 
                            <?php echo $lock_status;?>
                          <?php } ?>
                        </td>
                      </tr>
                      <tr>
                        <td><b>Account Status</b></td>
                        <td><?php echo $account_status;?></td>
                      </tr>
                      <tr>
                        <td><b>Browser Info</b></td>
                        <td><?php echo $browser_info;?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
          </div>
        </div>
    </div>

    <!-- Transaction have a problem -->
    <div class="col-md-6 col-lg-6 order-2 mb-4">
      <div class="card h-100">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="card-title m-0 me-2">All Transaction</h5>
        </div>
        <div class="card-body">
          <ul class="p-0 m-0">
            <?php
            $json = json_encode($last_transaction_all); 
            $json_decoded = json_decode($json); 
            foreach($json_decoded as $row){ ?>
            <li class="d-flex mb-4 pb-1" style="padding:5px;
    text-transform: uppercase;
    display:inline; 
    list-style-type:none;
    list-style-position: inside;
    border-bottom: 1px solid rgba(0, 0, 0, .2);">
              <div class="avatar flex-shrink-0 me-3">
                <span class="avatar-initial rounded bg-label-primary"
                  ><i class="bx bx-mobile-alt"></i
                ></span>
              </div>
              <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                <div class="me-2">
                  <a href="<?php 
                    if($row->status_transaction == 1){
                      echo base_url('agent/Pending/detail')?>/<?php echo $row->trx_id;
                    }elseif($row->status_transaction == 3){
                      echo base_url('agent/Refund/detail')?>/<?php echo $row->trx_id;
                    }
                  ?>">
                    <h6><?php echo $row->trx_op.' ['.$row->trx_date.']';?></h6>
                  </a>
                  <span class="badge bg-label-primary"><?php echo '#'.$row->trx_id;?></span>
                  <span class="badge bg-label-info"><?php echo $row->trx_number;?></span>
                  <!-- <br/> -->

                  <!-- start status -->
                  <?php if($row->status_transaction < 2 && $row->status_payment == 'paid' && $row->create_date == date('Y-m-d') ){ ?> 
                    <button id="check_status" class="btn btn-danger rounded-pill btn-sm" onClick="check_status(<?php echo $row->trx_id;?>);">Check Status</button>
                  <?php } else { ?> 
                    <span class="badge <?php echo $row->status_badges;?>"><?php echo $row->status_name;?></span>
                  <?php } ?>
                  <!-- end status -->
                  
                </div>

                <div class="user-progress">
                  <h4 class="fw-semibold"><?php echo 'Rp '.number_format($row->amount);?></h4>
                </div>
              </div>
              <!-- <hr/> -->
            </li>
            <!-- <hr/> -->
            <?php }?>
          </ul>

        </div>

            <div class="card-header d-flex align-items-center justify-content-between">
                  
                  <h5 class="card-title m-0 me-2"><a href="<?php echo base_url('agent/Users/detail_pending')?>/<?php echo $this->uri->segment(4);?>">View More...</a></h5>
            </div>
      </div>
    </div>
    <!--/ Transactions -->


    
    <!--/ Total Revenue -->
  </div>
  <!-- end -->
  <hr/>
  <div class="row">
    <!-- Total Revenue -->
    <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
      <div class="card">
        <div class="row row-bordered g-0">
          <div class="col-md-8">
            <h5 class="card-header m-0 me-2 pb-3">Graph Transactions</h5>
            <div id="totalRevenueChart" class="px-2"></div>
          </div>
          <div class="col-md-4">
            <div class="card-body">
            </div>
            <div id="growthChart"></div>
            <div class="text-center fw-semibold pt-3 mb-2"><?php echo $percent_growth;?>% Transaction Growth</div>

            <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
              <div class="d-flex">
                <div class="me-2">
                  <span class="badge bg-label-primary p-2"><i class="bx bx-dollar text-primary"></i></span>
                </div>
                <div class="d-flex flex-column">
                  <small><?php echo date('Y')-1;?></small>
                  <h6 class="mb-0"><?php echo number_format($total_trx_previous);?></h6>
                </div>
              </div>
              <div class="d-flex">
                <div class="me-2">
                  <span class="badge bg-label-info p-2"><i class="bx bx-wallet text-info"></i></span>
                </div>
                <div class="d-flex flex-column">
                  <small><?php echo date('Y');?></small>
                  <h6 class="mb-0"><?php echo number_format($total_trx_current);?></h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Total Revenue -->
  </div>
  <div class="row">
    <!-- Order Statistics -->
    <div class="col-md-4 col-lg-4 col-xl-4 order-0 mb-4">
      <div class="card h-100">
        <div class="card-header d-flex align-items-center justify-content-between pb-0">
          <div class="card-title mb-0">
            <h5 class="m-0 me-2">Order Statistics</h5>
            <small class="text-muted"><?php echo number_format($total_sales_year); ?> Total Sales <?php echo date('Y');?></small>
          </div>
          
        </div>
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="d-flex flex-column align-items-center gap-1">
              <h2 class="mb-2"><?php echo number_format($total_sales_current);?></h2>
              <span>Total Orders (<?php echo date('d M Y');?>)</span>
            </div>
            <div id="orderStatisticsChart"></div>
          </div>
          <ul class="p-0 m-0">
            <?php
            $json = json_encode($last_transaction); 
            $json_decoded = json_decode($json); 
            foreach($json_decoded as $row){ ?>
            <li class="d-flex mb-4 pb-1">
              <div class="avatar flex-shrink-0 me-3">
                <span class="avatar-initial rounded bg-label-primary"
                  ><i class="bx bx-mobile-alt"></i
                ></span>
              </div>
              <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                <div class="me-2">

                  <a href="<?php 
                    if($row->status_transaction == 1){
                      echo base_url('agent/Pending/detail')?>/<?php echo $row->trx_id;
                    }elseif($row->status_transaction == 3){
                      echo base_url('agent/Refund/detail')?>/<?php echo $row->trx_id;
                    }
                  ?>">
                    <h6><?php echo $row->trx_op.' ['.$row->trx_date.']';?></h6>
                  </a>

                  
                  <span class="badge bg-label-primary"><?php echo '#'.$row->trx_id;?></span>
                  <span class="badge bg-label-info"><?php echo $row->trx_number;?></span>

                  
                </div>
                <!-- start status -->
                  <?php if($row->status_transaction < 2 && $row->status_payment == 'paid' && $row->create_date == date('Y-m-d') ){ ?> 
                    <button id="check_status" class="btn btn-danger rounded-pill btn-sm" onClick="check_status(<?php echo $row->trx_id;?>);">Check Status</button>
                  <?php } else { ?> 
                    <span class="badge <?php echo $row->status_badges;?>"><?php echo $row->status_name;?></span>
                    
                  <?php } ?>
                  <!-- end status -->
                <div class="user-progress">
                  <h4 class="fw-semibold"><?php echo 'Rp '.number_format($row->amount);?></h4>
                </div>

              </div>
                
            </li>
            <hr/>
            <?php }?>
          </ul>
        </div>
            <div class="card-header d-flex align-items-center justify-content-between">
                  <hr/>
                  <h5 class="card-title m-0 me-2"><a href="">View More...</a></h5>
            </div>
      </div>
    </div>
    <!--/ Order Statistics -->


    <!-- Deposit -->
    <div class="col-md-4 col-lg-4 order-2 mb-4">
      <div class="card h-100">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="card-title m-0 me-2">Last Deposit</h5>
        </div>
        <div class="card-body">
          <ul class="p-0 m-0">
            <!-- start -->
            <?php
            $json = json_encode($last_deposit); 
            $json_decoded = json_decode($json); 
            foreach($json_decoded as $row){ ?>
            <li class="d-flex mb-4 pb-1">
              <div class="avatar flex-shrink-0 me-3">
                <!-- image deposit di click modal -->
                <img src="<?php echo base_url()?>assets/img/icons/unicons/paypal.png" alt="User" class="rounded" />
              </div>
              <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                <div class="me-2">
                  <small class="text-muted d-block mb-1"><?php echo $row->user_phone;?></small>
                  <h6 class="mb-0"><?php echo $row->trx_date;?></h6>
                </div>
                <div class="user-progress d-flex align-items-center gap-1">
                  <h6 class="mb-0"><?php echo number_format($row->amount);?></h6>
                  <span class="text-muted">[<?php echo $row->name_bank;?>]</span>
                </div>
              </div>
            </li>
            <?php }?>
            <!-- end -->

          </ul>
        </div>
            <div class="card-header d-flex align-items-center justify-content-between">
                  <hr/>
                  <h5 class="card-title m-0 me-2"><a href="">View More...</a></h5>
            </div>
      </div>
    </div>
    <!--/ Deposit -->

    <!-- Transaction have a problem -->
    <div class="col-md-4 col-lg-4 order-2 mb-4">
      <div class="card h-100">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="card-title m-0 me-2">Transaction Pending/Failed  </h5>
        </div>
        <div class="card-body">
          <ul class="p-0 m-0">
            <?php
            $json = json_encode($last_transaction_pending); 
            $json_decoded = json_decode($json); 
            foreach($json_decoded as $row){ ?>
            <li class="d-flex mb-4 pb-1">
              <div class="avatar flex-shrink-0 me-3">
                <span class="avatar-initial rounded bg-label-primary"
                  ><i class="bx bx-mobile-alt"></i
                ></span>
              </div>
              <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                <div class="me-2">
                  <a href="<?php 
                    if($row->status_transaction == 1){
                      echo base_url('agent/Pending/detail')?>/<?php echo $row->trx_id;
                    }elseif($row->status_transaction == 3){
                      echo base_url('agent/Refund/detail')?>/<?php echo $row->trx_id;
                    }
                  ?>">
                    <h6><?php echo $row->trx_op.' ['.$row->trx_date.']';?></h6>
                  </a>
                  <span class="badge bg-label-primary"><?php echo '#'.$row->trx_id;?></span>
                  <span class="badge bg-label-info"><?php echo $row->trx_number;?></span>
                  <br/>
                  
                </div>

                
                  <!-- start status -->
                  <?php if($row->status_transaction < 2 && $row->status_payment == 'paid' && $row->create_date == date('Y-m-d') ){ ?> 
                    <button id="check_status" class="btn btn-danger rounded-pill btn-sm" onClick="check_status(<?php echo $row->trx_id;?>);">Check Status</button>
                  <?php } else { ?> 
                    <span class="badge <?php echo $row->status_badges;?>"><?php echo $row->status_name;?></span>
                  <?php } ?>
                  <!-- end status -->
                <div class="user-progress">
                  <h4 class="fw-semibold"><?php echo 'Rp '.number_format($row->amount);?></h4>
                </div>
              </div>
            </li>
            <hr/>
            <?php }?>
          </ul>

        </div>

            <div class="card-header d-flex align-items-center justify-content-between">
                  <hr/>
                  <h5 class="card-title m-0 me-2"><a href="<?php echo base_url('agent/Users/detail_pending')?>/<?php echo $this->uri->segment(4);?>">View More...</a></h5>
            </div>
      </div>
    </div>
    <!--/ Transactions -->

  </div>

  <!-- transaction log -->
  <!-- <div class="row">
    <div class="col-md-12 col-lg-12 order-2 mb-12">
      <div class="card h-100">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="card-title m-0 me-2">Transaction Log</h5>
        </div>


        <div class="card-body">
          <ul class="p-0 m-0">
            <?php
            $json = json_encode($transaction_log); 
            $json_decoded = json_decode($json); 
            foreach($json_decoded as $row){ ?>
            <li class="d-flex mb-4 pb-1">
              
              <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                <div class="me-2">
                  <h6><?php echo $row->trx_id.' ['.$row->trx_title.']'.' ['.$row->create_date.']';?></h6>
                  <p><?php echo $row->log_req;?></p>
                  <p><?php echo $row->log_res;?></p>
                  <br/>
                </div>
              </div>
            </li>
            <hr/>
            <?php }?>
          </ul>
        </div>

      </div>
    </div>
  </div> -->
  <!-- end transaction log -->

  <div class="card">
    <h5 class="card-header">Transaction Log</h5>
    <div class="table-responsive text-nowrap">
      <table class="table table-hover" style="width:100%">
        <thead>
          <tr>
            <th>Log Date</th>
            <th>Trx ID</th>
            <th>Title</th>
            <th style="width:10px">Log Req</th>
            <th style="width:10px">Log Res</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
        <?php
        $json = json_encode($transaction_log); 
        $json_decoded = json_decode($json); 
        foreach($json_decoded as $row){ ?>
          <tr>
            <td><?php echo $row->create_date;?></td>
            <td><?php echo $row->trx_id;?></td>
            <td><?php echo $row->trx_title;?></td>
            <td style="width:10px"><?php echo $row->log_req;?></td>
            <td style="width:10px"><?php echo $row->log_res;?></td>
          </tr>
        <?php }?>
        </tbody>
      </table>
    </div>
  </div>


</div>
<script src="<?php echo base_url()?>assets/vendor/libs/apex-charts/apexcharts.js"></script>
<!-- / Content -->
<script type="text/javascript">
    'use strict';

(function () {
  let cardColor, headingColor, axisColor, shadeColor, borderColor;

  cardColor = config.colors.white;
  headingColor = config.colors.headingColor;
  axisColor = config.colors.axisColor;
  borderColor = config.colors.borderColor;

  // Total Revenue Report Chart - Bar Chart
  // --------------------------------------------------------------------
  const totalRevenueChartEl = document.querySelector('#totalRevenueChart'),
    totalRevenueChartOptions = {
      series: [
        {
          name: '<?php echo date('Y');?>',
          data: [
          '<?php echo $chart_jan;?>',
          '<?php echo $chart_feb;?>',
          '<?php echo $chart_mar;?>',
          '<?php echo $chart_apr;?>',
          '<?php echo $chart_may;?>',
          '<?php echo $chart_jun;?>',
          '<?php echo $chart_jul;?>',
          '<?php echo $chart_aug;?>',
          '<?php echo $chart_sep;?>',
          '<?php echo $chart_oct;?>',
          '<?php echo $chart_nov;?>',
          '<?php echo $chart_dec;?>', 
          ]
        }
      ],
      chart: {
        height: 300,
        stacked: true,
        type: 'bar',
        toolbar: { show: false }
      },
      plotOptions: {
        bar: {
          horizontal: false,
          columnWidth: '33%',
          borderRadius: 12,
          startingShape: 'rounded',
          endingShape: 'rounded'
        }
      },
      colors: [config.colors.primary, config.colors.info],
      dataLabels: {
        enabled: false
      },
      stroke: {
        curve: 'smooth',
        width: 6,
        lineCap: 'round',
        colors: [cardColor]
      },
      legend: {
        show: true,
        horizontalAlign: 'left',
        position: 'top',
        markers: {
          height: 8,
          width: 8,
          radius: 12,
          offsetX: -3
        },
        labels: {
          colors: axisColor
        },
        itemMargin: {
          horizontal: 10
        }
      },
      grid: {
        borderColor: borderColor,
        padding: {
          top: 0,
          bottom: -8,
          left: 20,
          right: 20
        }
      },
      xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        labels: {
          style: {
            fontSize: '13px',
            colors: axisColor
          }
        },
        axisTicks: {
          show: false
        },
        axisBorder: {
          show: false
        }
      },
      yaxis: {
        labels: {
          style: {
            fontSize: '13px',
            colors: axisColor
          }
        }
      },
      responsive: [
        {
          breakpoint: 1700,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '32%'
              }
            }
          }
        },
        {
          breakpoint: 1580,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '35%'
              }
            }
          }
        },
        {
          breakpoint: 1440,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '42%'
              }
            }
          }
        },
        {
          breakpoint: 1300,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '48%'
              }
            }
          }
        },
        {
          breakpoint: 1200,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '40%'
              }
            }
          }
        },
        {
          breakpoint: 1040,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 11,
                columnWidth: '48%'
              }
            }
          }
        },
        {
          breakpoint: 991,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '30%'
              }
            }
          }
        },
        {
          breakpoint: 840,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '35%'
              }
            }
          }
        },
        {
          breakpoint: 768,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '28%'
              }
            }
          }
        },
        {
          breakpoint: 640,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '32%'
              }
            }
          }
        },
        {
          breakpoint: 576,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '37%'
              }
            }
          }
        },
        {
          breakpoint: 480,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '45%'
              }
            }
          }
        },
        {
          breakpoint: 420,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '52%'
              }
            }
          }
        },
        {
          breakpoint: 380,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '60%'
              }
            }
          }
        }
      ],
      states: {
        hover: {
          filter: {
            type: 'none'
          }
        },
        active: {
          filter: {
            type: 'none'
          }
        }
      }
    };
  if (typeof totalRevenueChartEl !== undefined && totalRevenueChartEl !== null) {
    const totalRevenueChart = new ApexCharts(totalRevenueChartEl, totalRevenueChartOptions);
    totalRevenueChart.render();
  }

  // Growth Chart - Radial Bar Chart
  // --------------------------------------------------------------------
  const growthChartEl = document.querySelector('#growthChart'),
    growthChartOptions = {
      series: [<?php echo $percent_growth;?>],
      labels: ['Growth'],
      chart: {
        height: 240,
        type: 'radialBar'
      },
      plotOptions: {
        radialBar: {
          size: 150,
          offsetY: 10,
          startAngle: -150,
          endAngle: 150,
          hollow: {
            size: '55%'
          },
          track: {
            background: cardColor,
            strokeWidth: '100%'
          },
          dataLabels: {
            name: {
              offsetY: 15,
              color: headingColor,
              fontSize: '15px',
              fontWeight: '600',
              fontFamily: 'Public Sans'
            },
            value: {
              offsetY: -25,
              color: headingColor,
              fontSize: '22px',
              fontWeight: '500',
              fontFamily: 'Public Sans'
            }
          }
        }
      },
      colors: [config.colors.primary],
      fill: {
        type: 'gradient',
        gradient: {
          shade: 'dark',
          shadeIntensity: 0.5,
          gradientToColors: [config.colors.primary],
          inverseColors: true,
          opacityFrom: 1,
          opacityTo: 0.6,
          stops: [30, 70, 100]
        }
      },
      stroke: {
        dashArray: 5
      },
      grid: {
        padding: {
          top: -35,
          bottom: -10
        }
      },
      states: {
        hover: {
          filter: {
            type: 'none'
          }
        },
        active: {
          filter: {
            type: 'none'
          }
        }
      }
    };
  if (typeof growthChartEl !== undefined && growthChartEl !== null) {
    const growthChart = new ApexCharts(growthChartEl, growthChartOptions);
    growthChart.render();
  }

  // Profit Report Line Chart
  // --------------------------------------------------------------------
  const profileReportChartEl = document.querySelector('#profileReportChart'),
    profileReportChartConfig = {
      chart: {
        height: 80,
        // width: 175,
        type: 'line',
        toolbar: {
          show: false
        },
        dropShadow: {
          enabled: true,
          top: 10,
          left: 5,
          blur: 3,
          color: config.colors.warning,
          opacity: 0.15
        },
        sparkline: {
          enabled: true
        }
      },
      grid: {
        show: false,
        padding: {
          right: 8
        }
      },
      colors: [config.colors.warning],
      dataLabels: {
        enabled: false
      },
      stroke: {
        width: 5,
        curve: 'smooth'
      },
      series: [
        {
          data: [110, 270, 145, 245, 205, 285]
        }
      ],
      xaxis: {
        show: false,
        lines: {
          show: false
        },
        labels: {
          show: false
        },
        axisBorder: {
          show: false
        }
      },
      yaxis: {
        show: false
      }
    };
  if (typeof profileReportChartEl !== undefined && profileReportChartEl !== null) {
    const profileReportChart = new ApexCharts(profileReportChartEl, profileReportChartConfig);
    profileReportChart.render();
  }

  // Order Statistics Chart
  // --------------------------------------------------------------------
  const chartOrderStatistics = document.querySelector('#orderStatisticsChart'),
    orderChartConfig = {
      chart: {
        height: 165,
        width: 130,
        type: 'donut'
      },
      labels: <?php echo json_encode($trx_group_op); ?>,
      series: <?php echo json_encode($trx_group_op_percentage); ?>,
      colors: [config.colors.primary, config.colors.secondary, config.colors.info, config.colors.success],
      stroke: {
        width: 5,
        colors: cardColor
      },
      dataLabels: {
        enabled: false,
        formatter: function (val, opt) {
          return parseInt(val) + '%';
        }
      },
      legend: {
        show: false
      },
      grid: {
        padding: {
          top: 0,
          bottom: 0,
          right: 15
        }
      },
      // plotOptions: {
      //   pie: {
      //     donut: {
      //       size: '75%',
      //       labels: {
      //         show: true,
      //         value: {
      //           fontSize: '1.5rem',
      //           fontFamily: 'Public Sans',
      //           color: headingColor,
      //           offsetY: -15,
      //           formatter: function (val) {
      //             return parseInt(val) + '%';
      //           }
      //         },
      //         name: {
      //           offsetY: 20,
      //           fontFamily: 'Public Sans'
      //         },
      //         total: {
      //           show: true,
      //           fontSize: '0.8125rem',
      //           color: axisColor,
      //           label: 'Weekly',
      //           formatter: function (w) {
      //             return '38%';
      //           }
      //         }
      //       }
      //     }
      //   }
      // }
    };
  if (typeof chartOrderStatistics !== undefined && chartOrderStatistics !== null) {
    const statisticsChart = new ApexCharts(chartOrderStatistics, orderChartConfig);
    statisticsChart.render();
  }

  // Income Chart - Area chart
  // --------------------------------------------------------------------
  

  // Expenses Mini Chart - Radial Chart
  // --------------------------------------------------------------------
  
})();
</script>
<script type="text/javascript">
  function activate_users(){
            var id = '<?php echo $unique_id;?>';
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
                    url : "<?php echo base_url();?>agent/Users/activate_users",
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

  function check_status(trx_id){
            var id = trx_id;
            var services_url = '<?php echo $service_url_apps ?>';
            var end_point = 'api/load/singlecheckstatus/'+trx_id;
            var full_url = services_url+end_point;

            $.ajax({
                type: "GET",
                url: full_url,
                dataType: "json"
            }).done(function(result){
               alert(JSON.stringify(result))
               location.reload();
            })
            // $.ajax({
            //     type: "GET",
            //     dataType: 'json',
            //     url: "<?php echo base_url();?>Auth/get_csrf", 
            //     success: function (data) {
            //       var csrf_token = data.csrf_token;
            //       var csrf_name = '<?php echo $csrf_name;?>';
            //       // alert(csrf_token);

            //       //start
            //       $.ajax({
            //         url : "<?php echo base_url();?>agent/transaction/check_status",
            //         method : "POST",
            //         data : {
            //           trx_id: id,
            //           [csrf_name] : csrf_token,
            //         },
            //         async : false,
            //         dataType : 'json',
            //         success: function(data){
            //           var status = data.status;
            //           console.log(JSON.stringify(data));
            //           if (status == 'Success') {
            //             alert(data.message);
            //             location.reload();
            //           }else{
            //             alert(data.message);
            //             location.reload();
            //           }
            //         }
            //       });
            //       //end
            //     }
            // });
  }
</script>

