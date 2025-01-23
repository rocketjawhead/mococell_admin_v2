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

                <?php if ($qty_waiting > 0){?>
                <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-primary">3</span>
                <?php }?>


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

                <?php if ($qty_refund > 0){?>
                <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger"><?php echo $qty_refund;?></span>
                <?php }?>
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
                <tbody class="table-border-bottom-0">
                <?php
                $json = json_encode($list_history_trx); 
                $json_decoded = json_decode($json); 
                foreach($json_decoded as $row){ ?>
                  <tr>
                    <td>
                      <a href="<?php echo base_url('agent/History/detail')?>/<?php echo $row->trx_id;?>">
                        <strong>#<?php echo $row->trx_id;?></strong>
                        <br/>
                        <?php echo $row->trx_date;?>
                      </a>
                    </td>
                    <td>[<?php echo $row->trx_op;?>] <?php echo $row->trx_number;?></td>
                    <td><?php echo $row->trx_code;?></td>
                    <td><?php echo 'Rp '.number_format($row->trx_price);?></td>
                    <td><?php echo 'Rp '.number_format($row->trx_total);?></td>
                    <td><?php echo $row->payment_method;?></td>
                    <td><span class="<?php echo $row->status_badges;?>"><?php echo $row->status_name;?></span></td>
                  </tr>
                <?php }?>
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
                <tbody class="table-border-bottom-0">
                <?php
                $json = json_encode($list_history_pending); 
                $json_decoded = json_decode($json); 
                foreach($json_decoded as $row){ ?>
                  <tr>
                    <td>
                      <a href="<?php echo base_url('agent/History/detail')?>/<?php echo $row->trx_id;?>">
                        <strong>#<?php echo $row->trx_id;?></strong>
                        <br/>
                        <?php echo $row->trx_date;?>
                      </a>
                    </td>
                    <td>[<?php echo $row->trx_op;?>] <?php echo $row->trx_number;?></td>
                    <td><?php echo $row->trx_code;?></td>
                    <td><?php echo 'Rp '.number_format($row->trx_price);?></td>
                    <td><?php echo 'Rp '.number_format($row->trx_total);?></td>
                    <td><?php echo $row->payment_method;?></td>
                    <td><span class="<?php echo $row->status_badges;?>"><?php echo $row->status_name;?></span></td>
                  </tr>
                <?php }?>
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
                <tbody class="table-border-bottom-0">
                <?php
                $json = json_encode($list_history_refund); 
                $json_decoded = json_decode($json); 
                foreach($json_decoded as $row){ ?>
                  <tr>
                    <td>
                      <a href="<?php echo base_url('agent/History/detail')?>/<?php echo $row->trx_id;?>">
                        <strong>#<?php echo $row->trx_id;?></strong>
                        <br/>
                        <?php echo $row->trx_date;?>
                      </a>
                    </td>
                    <td>[<?php echo $row->trx_op;?>] <?php echo $row->trx_number;?></td>
                    <td><?php echo $row->trx_code;?></td>
                    <td><?php echo 'Rp '.number_format($row->trx_price);?></td>
                    <td><?php echo 'Rp '.number_format($row->trx_total);?></td>
                    <td><?php echo $row->payment_method;?></td>
                    <td><span class="<?php echo $row->status_badges;?>"><?php echo $row->status_name;?></span></td>
                  </tr>
                <?php }?>
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




