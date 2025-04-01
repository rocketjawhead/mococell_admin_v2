

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
                You have done <span class="fw-bold"><?php echo $percent_growth;?> %</span> more sales today. Yuk bisa yuk
              </p>

              <h2>Balance: <?php echo number_format($total_balance_system);?></h2>
              <!-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> 
                <?php echo number_format($total_balance_system);?></small> -->
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
        <div class="col-lg-3 col-md-12 col-6 mb-4">
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
              <span>Total</span>
              <h3 class="card-title text-nowrap mb-1">
                <?php echo number_format($total_transaction);?>
              </h3>

              <!-- <?php 
              if ($current_usr >= $previous_usr) {
                $txt_usr_label = 'text-success';
                $txt_usr_icon = 'bx bx-up-arrow-alt';
              }else{
                $txt_usr_label = 'text-danger';  
                $txt_usr_icon = 'bx bx-down-arrow-alt';
              }
              $txt_usr_value = $current_usr; 
              ?> -->
              <small class="<?php echo $txt_usr_label;?> fw-semibold">
                <!-- <i class="<?php echo $txt_usr_icon;?>"></i> <?php echo $txt_usr_value;?>% -->
              </small>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-12 col-6 mb-4">
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
              <span>Qty</span>
              <h3 class="card-title text-nowrap mb-1">
                <?php echo number_format($total_qty);?>
              </h3>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-12 col-6 mb-4">
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
              <span>Visitor</span>
              <h3 class="card-title text-nowrap mb-1"><?php echo number_format($total_visitor);?></h3>
              
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-12 col-6 mb-4">
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
              <span>Income</span>
              <h3 class="card-title text-nowrap mb-1"><?php echo number_format($total_income);?></h3>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Total Revenue -->
  </div>
  <!-- end -->

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

  <!-- list bank -->
  <div class="row">
    <div class="col-md-12 col-lg-12 order-2 mb-4">
      <div class="card h-100">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="card-title m-0 me-2">List Bank</h5>
          <a href="<?php echo base_url('agent/Dashboard/addbank');?>" class="btn btn-primary btn-sm lg">Add Bank +</a>
        </div>
        <div class="card-body">
          <div class="table-responsive text-nowrap">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Account Name</th>
                <th>Account Number</th>
                <th>Bank</th>
                <th>Code Bank</th>
                <th>Stataus</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            <?php
            $json = json_encode($list_bank); 
            $json_decoded = json_decode($json); 
            foreach($json_decoded as $row){ ?>
              <tr>
                <td><a href="<?php echo base_url('agent/Dashboard/detailbank/');?><?php echo $row->trx_id;?>"><?php echo $row->account_name;?></a></td>
                <td><?php echo $row->account_number;?></td>
                <td><?php echo $row->name_bank;?></td>
                <td><?php echo $row->code_bank;?></td>
                <td>
                  <a href="<?php echo base_url('agent/Dashboard/deactive_bank/');?><?php echo $row->trx_id;?>/<?php echo $row->status;?>">
                  <?php if($row->status == 1){echo 'Active';}else{ echo 'Deactive';}?>
                  </a>
                  </td>
              </tr>
            <?php }?>
            </tbody>
          </table>
        </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end list bank -->
  
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
            <tbody class="table-border-bottom-0">
            <?php
            $json = json_encode($current_month_error); 
            $json_decoded = json_decode($json); 
            foreach($json_decoded as $row){ ?>
              <tr>
                <td><?php echo $row->rc_hit;?></td>
                <td><?php echo $row->rc_msg;?></td>
                <td>
                  <span class="<?php echo $row->status_badge;?>"><?php echo $row->status;?></span>
                </td>
                <td><?php echo $row->transaction;?></td>
                <td><?php echo $row->partner_name;?></td>
                <td><?php echo $row->trx_date;?></td>
                <td><?php echo $row->qty;?></td>
              </tr>
            <?php }?>
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
          <button class="btn btn-primary btn-sm btn-block" onClick="refresh_item();">Refrest Item</button>
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
            <tbody class="table-border-bottom-0">
            <?php
            $json = json_encode($list_item_deactive); 
            $json_decoded = json_decode($json); 
            foreach($json_decoded as $row){ ?>
              <tr>
                <td><?php echo $row->buyer_sku_code;?></td>
                <td><?php echo $row->category;?></td>
                <td><?php echo $row->brand;?></td>
                <td><?php echo $row->product_name;?></td>
                <td><?php echo $row->desc_product;?></td>
                
              </tr>
            <?php }?>
            </tbody>
          </table>
        </div>
        </div>
      </div>
    </div>
    <!-- end error log rc -->

  </div>


  <div class="row">
    <!-- Order Statistics -->
    <div class="col-md-6 col-lg-6 col-xl-6 order-0 mb-4">
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
                  <h6 class="mb-0"><?php echo $row->trx_op;?></h6>
                  <small class="text-muted"><?php echo $row->trx_number;?></small>
                </div>
                <div class="user-progress">
                  <small class="fw-semibold"><?php echo number_format($row->amount);?></small>
                </div>
              </div>
            </li>
            <?php }?>
          </ul>
        </div>
      </div>
    </div>
    <!--/ Order Statistics -->


    <!-- Transactions -->
    <div class="col-md-6 col-lg-6 col-xl-6 order-2 mb-4">
      <div class="card h-100">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="card-title m-0 me-2">Last Deposit</h5>
        </div>
        <div class="card-body">
          <ul class="p-0 m-0">
            <!-- start -->
            <!-- <?php
            $json = json_encode($last_deposit); 
            $json_decoded = json_decode($json); 
            foreach($json_decoded as $row){ ?>
            <li class="d-flex mb-4 pb-1">
              <div class="avatar flex-shrink-0 me-3">
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
            <?php }?> -->
            <!-- end -->

          </ul>
        </div>
      </div>
    </div>
    <!--/ Transactions -->

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
          data: <?php echo $chart_trx_yearly;?>
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
        categories: <?php echo $chart_month_yearly;?>,
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

