

<!-- Content wrapper -->
<div class="content-wrapper">
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

  <!-- start -->
  <div class="row">
    <div class="col-lg-12 mb-4 order-0">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-sm-12">
            <div class="card-body">
              <h5 class="card-title text-primary">Find a Users</h5>
              <div class="mb-4">
                <div class="form-group">
                  <input type="text" class="form-control phonenumber" id="phonenumber" placeholder="Input Phone Number">
                  <br/>
                  <button class="btn btn-primary btn-sm btn-block" onClick="find_users();">Search</button>
                </div>
              </div>

              <!-- <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Total Revenue -->
  </div>
  <!-- end -->

  
</div>
<script src="<?php echo base_url()?>assets/vendor/libs/apex-charts/apexcharts.js"></script>
<!-- / Content -->
<script type="text/javascript">
  function find_users(){

      var phonenumber = $('#phonenumber').val();
      var url = '<?php echo base_url();?>agent/Users/detail/'+phonenumber;
      window.location = url;
      
    }
</script>

