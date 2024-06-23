<!-- Content wrapper -->
<div class="content-wrapper">
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Help /</span> Complaint</h4>

  <hr class="my-5" />

  <!-- Striped Rows -->
  <div class="card">
    <h5 class="card-header">Complaint</h5>
    <div class="table-responsive text-nowrap">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Category</th>
            <th>Subject</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
        <?php
        $json = json_encode($list_complaint); 
        $json_decoded = json_decode($json); 
        foreach($json_decoded as $row){ ?>
          <tr>
            <td>
              <a href="<?php echo base_url('agent/Help/detailcomplaint')?>/<?php echo $row->unique_id;?>">
                <strong>#<?php echo $row->unique_id;?></strong>
                <br/>
                <?php echo $row->create_date;?>
              </a>
            </td>
            <td><?php echo $row->category;?></td>
            <td><?php echo $row->subject;?></td>
            <td><?php echo $row->status_complaint;?></td>
            <td><span class="<?php echo $row->status_complaint_badge;?>"><?php echo $row->status_complaint;?></span></td>
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

