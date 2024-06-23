

<!-- Content wrapper -->
<div class="content-wrapper">
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

  <!-- end -->
  <div class="row">

    <!-- Transaction have a problem -->
    <div class="col-md-12 col-lg-12 order-2 mb-12">
      <div class="demo-inline-spacing">
        <a type="button" href="<?php echo base_url('agent/Users/detail')?>/<?php echo $this->uri->segment(4);?>" class="btn btn-primary">
          <span class="tf-icons bx bx-arrow-back"></span>&nbsp; Back
        </a>
      </div>
      <hr/>
      <div class="card h-100">

        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="card-title m-0 me-2">Transaction Pending/Failed</h5>
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
                  <h6 class="mb-0"><?php echo $row->trx_op.' ['.$row->trx_date.']';?></h6>
                  <small class="text-muted"><?php echo $row->trx_number;?></small>

                  <!-- start status -->
                  <?php if($row->status_transaction < 2 && $row->status_payment == 'paid' ){ ?> 
                    <button id="check_status" class="btn btn-danger rounded-pill btn-sm" onClick="check_status(<?php echo $row->trx_id;?>);">Check Status</button>
                  <?php } else { ?> 
                    <span class="badge <?php echo $row->status_badges;?>"><?php echo $row->status_name;?></span>
                    
                  <?php } ?>
                  <!-- end status -->
                </div>
                <div class="user-progress">
                  <small class="fw-semibold"><?php echo 'Rp '.number_format($row->amount);?></small>
                  
                </div>
              </div>
            </li>
            <?php }?>
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

  function check_status(trx_id){
            var id = trx_id;
            alert(id);
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

