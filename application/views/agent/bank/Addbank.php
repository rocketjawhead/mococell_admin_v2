<!-- Content wrapper -->
<div class="content-wrapper">
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Detail /</span> <?php echo '#'.$this->uri->segment(4);?></h4>

<!-- Images -->
<div class="row mb-5">

        <div class="col-md-12 col-xl-12">
          <div class="card mb-3">
          <div class="card-body">
          <div style="padding: 10px;">
              <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Item</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><b>Account Name</b></td>
                    <td>
                      <div class="form-group">
                        <input type="text" class="form-control" id="account_name">
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <td><b>Account Number</b></td>
                    <td>
                      <div class="form-group">
                        <input type="text" class="form-control" id="account_number">
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <td><b>Name Bank</b></td>
                    <td>
                      <div class="form-group">
                        <input type="text" class="form-control" id="name_bank">
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <td><b>Code Bank</b></td>
                    <td>
                      <div class="form-group">
                        <input type="text" class="form-control" id="code_bank">
                      </div>
                    </td>
                  </tr>
                  
                  <tr>
                    <td><b>Action</b></td>
                    <td>
                      <div class="form-group">
                        <button class="btn btn-primary btn-sm btn-block" onClick="execute();">Save</button>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            </div>
          </div>
        </div>
      <!--/ Images -->
    </div>
<script type="text/javascript">
    function execute(){

          var account_number = $('#account_number').val();
          var account_name = $('#account_name').val();
          var name_bank = $('#name_bank').val();
          var code_bank = $('#code_bank').val();

          var csrf_name = '<?php echo $csrf_name;?>';
          var csrf_token = '<?php echo $csrf_token;?>';

          // alert(_trx_id + val_password);
          //start
          $.ajax({
            url : "<?php echo base_url();?>agent/Dashboard/insert_bank",
            method : "POST",
            data : {
              account_name: account_name,
              account_number : account_number,
              name_bank : name_bank,
              code_bank : code_bank,
              [csrf_name] : csrf_token,
            },
            async : false,
            dataType : 'json',
            success: function(data){
              alert(data.message);
              var url = '<?php echo base_url();?>agent/Dashboard/';
              window.location = url;
            }
          });
          //end          
        }
</script>



  