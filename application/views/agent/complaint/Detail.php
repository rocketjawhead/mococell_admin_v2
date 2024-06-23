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
                    <th>Description</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><b>Image</b></td>
                    <td><?php echo $imageurl;?></td>
                  </tr>
                  <tr>
                    <td><b>Transaction ID</b></td>
                    <td><?php echo $unique_id;?></td>
                  </tr>
                  <tr>
                    <td><b>Subject</b></td>
                    <td><?php echo $subject;?></td>
                  </tr>
                  <tr>
                    <td><b>Description</b></td>
                    <td><?php echo $desc_cmp;?></td>
                  </tr>
                  <tr>
                    <td><b>Category</b></td>
                    <td><?php echo $category;?></td>
                  </tr>
                  <tr>
                    <td><b>Status</b></td>
                    <td><span class="<?php echo $status_complaint_badge;?>"><?php echo $status_complaint;?></span></td>
                  </tr>
                  <tr>
                    <td><b>Action</b></td>
                    <td>
                      <div class="form-group">
                        <select class="form-control status" id="status">
                          <option value="0">On Progress</option>
                          <option value="1">Closed</option>
                        </select>
                      </div>
                      <hr/>
                      <div class="form-group">
                        <button class="btn btn-primary btn-sm btn-block" onClick="execute_update_complaint();">Confirm</button>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            </div>
          </div>
        </div>

        <div class="col-md-12 col-xl-12">
          <div class="card mb-3">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Add Log</h6>
            </div>
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
                    <td><b>title log</b></td>
                    <td>
                      <div class="form-group">
                        <input type="text" class="form-control txt_complaint" id="txt_complaint" name="txt_complaint">
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><b>remarks</b></td>
                    <td>
                      <div class="form-group">
                        <input type="text" class="form-control remarks" id="remarks" name="remarks">
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><b>image</b></td>
                    <td>
                      <div class="form-group">
                        <input type="file" style="width: 30%;" class="form-control" onchange="btnImage(this);" required>
                        <input type="hidden" id="base64_data" class="base64_data" readonly>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><b>Action</b></td>
                    <td><button class="btn btn-primary btn-sm btn-block" onClick="execute();">Confirm</button></td>
                  </tr>
                </tbody>
              </table>
            </div>
            </div>
          </div>
        </div>


        <div class="row">
        <div class="col-lg-12">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Log Transaction</h6>
            </div>
            <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Log Date</th>
                  <th>Txt Complaint</th>
                  <th>Remarks</th>
                  <th>imageurl</th>         
                </tr>
              </thead>
              <tbody>
                <?php
                $json = json_encode($list_detail_complaint); 
                $json_decoded = json_decode($json); 
                foreach($json_decoded as $row){ ?>
                  <tr>
                    <td><b><?php echo $row->create_date;?></b></td>
                    <td><?php echo $row->txt_complaint;?></td>
                    <td><?php echo $row->remarks;?></td>
                    <td><?php echo $row->imageurl;?></td>
                  </tr>
                <?php }?>
              </tbody>
            </table>
          </div>
          </div>
          </div>
        </div>


      </div>
      <!--/ Images -->

    </div>
    <script type="text/javascript">
  function btnImage(input){
      $("#myModalone").modal('toggle');
      document.getElementById("base64_data").value = '';
      getBaseUrl();
      readDataImage(input);
      $('#myModalone').modal('hide');
      // readURLimage1(input);
  }
</script>
<script type="text/javascript">
  function readDataImage(input) {
  
  if (input.files && input.files[0]) {
      // $("#myModalone").modal('toggle');
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#dataimage')
              .attr('src', e.target.result)
              .width(500)
              .height(350);
      };
          reader.readAsDataURL(input.files[0]);
      }
  }
</script>
<script type="text/javascript">
  function getBaseUrl ()  {

        var file = document.querySelector('input[type=file]')['files'][0];
        // alert(file);
        var reader = new FileReader();
        var baseString;
        reader.onloadend = function () {
            baseString = reader.result;
            type_str = baseString.split(',')[0];
            // alert(type_str);
            if (type_str == 'data:image/jpg;base64') {
              //jpg
              conv_basestring = baseString.replace("data:image/jpg;base64,", "") ;
            }else if(type_str == 'data:image/jpeg;base64'){
              //jpeg
              conv_basestring = baseString.replace("data:image/jpeg;base64,", "") ;
            }else if(type_str == 'data:image/png;base64'){
              //png
              conv_basestring = baseString.replace("data:image/png;base64", "") ;
            }else{
              //type not found
              alert('type not allowed')
            }
            
            document.getElementById("base64_data").value = conv_basestring;
        };
        reader.readAsDataURL(file);
    }
</script>
<script type="text/javascript">
    function execute(){

          var base64image = $('#base64_data').val();
          var txt_complaint = $('#txt_complaint').val();
          var remarks = $('#remarks').val();

          var csrf_name = '<?php echo $csrf_name;?>';
          var csrf_token = '<?php echo $csrf_token;?>';

          // alert(_trx_id + val_password);
          //start
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
                  url : "<?php echo base_url();?>agent/Help/addlogcomplaint",
                  method : "POST",
                  data : {
                    unique_id : '<?php echo $unique_id;?>',
                    txt_complaint: txt_complaint,
                    remarks: remarks,
                    base64image : base64image,
                    [csrf_name] : csrf_token,

                  },
                  async : false,
                  dataType : 'json',
                  success: function(data){
                    var status = data.status;
                    // console.log(JSON.stringify(data));
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
          //end          
        }
</script>

<script type="text/javascript">
    function execute_update_complaint(){

          // alert('asd');
          var status = $('#status').val();

          var csrf_name = '<?php echo $csrf_name;?>';
          var csrf_token = '<?php echo $csrf_token;?>';

          //start
          $.ajax({
              type: "GET",
              dataType: 'json',
              url: "<?php echo base_url();?>Auth/get_csrf", 
              success: function (data) {
                var csrf_token = data.csrf_token;
                var csrf_name = '<?php echo $csrf_name;?>';

                //start
                $.ajax({
                  url : "<?php echo base_url();?>agent/Help/updatecomplaint",
                  method : "POST",
                  data : {
                    unique_id : '<?php echo $unique_id;?>',
                    status: status,
                    [csrf_name] : csrf_token,

                  },
                  async : false,
                  dataType : 'json',
                  success: function(data){
                    // var status = data.status;
                    // console.log(JSON.stringify(data));
                    if (status == 'Success') {
                      alert(data.message);
                      var url = '<?php echo base_url();?>agent/Help/complaint/';
                      window.location = url;
                    }else{
                      alert(data.message);
                      location.reload();
                    }
                  }
                });
                //end
              }
          });
          //end          
        }
</script>


  