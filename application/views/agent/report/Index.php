<!-- Content wrapper -->
<div class="content-wrapper">
            <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Report /</span> GL</h4>
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
                <i class="tf-icons bx bx-home"></i> Transaction
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
                <i class="tf-icons bx bx-sync"></i> Balance 
              </button>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Trx ID</th>
                    <th>Credit</th>
                    <th>Debit</th>
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
                    <td><?php echo 'Rp '.number_format($row->credit);?></td>
                    <td><?php echo 'Rp '.number_format($row->debit);?></td>
                  </tr>
                <?php }?>
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="navs-justified-profile" role="tabpanel">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Trx ID</th>
                    <th>Credit</th>
                    <th>Debit</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                <?php
                $json = json_encode($list_history_balance); 
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
                    <td><?php echo 'Rp '.number_format($row->credit);?></td>
                    <td><?php echo 'Rp '.number_format($row->debit);?></td>
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




