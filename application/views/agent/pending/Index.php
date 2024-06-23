<!-- Content wrapper -->
<div class="content-wrapper">
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Transaction /</span> Pending</h4>

  <hr class="my-5" />

  <!-- Striped Rows -->
  <div class="card">
    <h5 class="card-header">History</h5>
    <div class="table-responsive text-nowrap">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Mitra ID</th>
            <th>Number</th>
            <th>Sku Code</th>
            <th>Amount</th>
            <th>Total Trx</th>
            <th>Operator / Type</th>
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
              <a href="<?php echo base_url('agent/Pending/detail')?>/<?php echo $row->trx_id;?>">
                <strong>#<?php echo $row->trx_id;?></strong>
                <br/>
                <?php echo $row->trx_date;?>
              </a>
            </td>
            <td><?php echo $row->user_id;?></td>
            <td><?php echo $row->trx_number;?></td>
            <td><?php echo $row->trx_code;?></td>
            <td><?php echo 'Rp '.number_format($row->trx_price);?></td>
            <td><?php echo 'Rp '.number_format($row->trx_total);?></td>
            <td><?php echo $row->trx_type.' / '.$row->trx_op;?></td>
            <td><span class="<?php echo $row->status_badges;?>"><?php echo $row->status_name;?></span></td>
          </tr>
        <?php }?>
        </tbody>
      </table>
    </div>
  </div>
  <!--/ Striped Rows -->

  <hr class="my-5" />

</div>
<!-- / Content -->

