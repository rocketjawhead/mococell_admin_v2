<!-- Content wrapper -->
<div class="content-wrapper">
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add Posting</span></h4>

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
                    <td><b>Title Post</b></td>
                    <td>
                      <input type="text" class="form-control title_blog" id="title_blog">    
                    </td>
                  </tr>
                  <tr>
                    <td><b>Desc Post</b></td>
                    <td>
                      <div id="editor" class="desc_blog">
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><b>Category</b></td>
                    <td>
                      <div class="form-group">
                        <select class="form-control category" id="category">
                          <option value="1">Blog</option>
                          <option value="2">Event</option>
                          <option value="3">Promo</option>
                        </select>
                      </div> 
                    </td>
                  </tr>
                  <tr>
                    <td><b>Meta</b></td>
                    <td>
                      <input type="text" class="form-control alt_img" id="alt_img" placeholder="Alt Img"><br/>
                      <input type="text" class="form-control meta_title" id="meta_title" placeholder="Meta Title"><br/>
                      <input type="text" class="form-control meta_desc" id="meta_desc" placeholder="Meta Desc"><br/>
                      <input type="text" class="form-control meta_robot" id="meta_robot" placeholder="Meta Robot"><br/>   
                    </td>
                  </tr>
                  <tr>
                    <td><b>URL Link</b></td>
                    <td>
                      <input type="text" class="form-control urldownload" id="urldownload">    
                    </td>
                  </tr>
                  <tr>
                    <td><b>Image</b></td>
                    <td>
                      <input type="hidden" id="base64_data" readonly>
                      <input type="file" class="form-control" onchange="btnImage(this);" class="">  
                      <img id="dataimage" style="height: 100px;width: 100px;" src="<?php echo base_url()?>assets/img/bgimage.jpg"/>
                    </td>
                  </tr>
                  <tr>
                    <td><b>Action</b></td>
                    <td>
                      <div class="form-check form-switch mb-2">
                        <input class="form-check-input is_stop" type="checkbox" id="is_stop" />
                        <label class="form-check-label" for="flexSwitchCheckChecked"
                          >is Top</label
                        >
                      </div>
                      <div class="form-group">
                        <button class="btn btn-primary btn-sm btn-block" onClick="add_post();">Confirm</button>
                        <a class="btn btn-danger btn-sm btn-block" href="<?php echo base_url('agent/blog/')?>">Back to Home</a>
                      </div>
                    </td>
                  </tr>
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
            
      

      var width_img = $(this).width();
      var height_img = $(this).height(); 

      var value_width = 2000;
      var value_height = 2500;

      if (height_img > value_height || width_img > value_width) {
        // alert('ukuran gambar terlalu besar, width :' + width_img + ' - Height :' + height_img)
        // location.reload();
        // clearInterval(count_down);
        // $("#exampleModalCenter").modal("show");
        $("#txt_modal").text('ukuran gambar terlalu besar, width :' + width_img + ' - Height :' + height_img);
        $(".modal-header").addClass("bg-danger");
        //close modal and refresh
        $('#exampleModalCenter').on('hidden', function () {
            location.reload();
        });
      }


      console.log($(this).width() + "x" + $(this).height())
      
      getBaseUrl();
      readDataImage(input);
      $('#myModalone').modal('hide');
      // readURLimage1(input);
  }
  function readDataImage(input) {
  
  if (input.files && input.files[0]) {
      // $("#myModalone").modal('toggle');
      var reader = new FileReader();
      reader.onload = function (e) {
            $('#dataimage')
              .attr('src', e.target.result)
              .width(200)
              .height(400);
          

          
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
        var conv_basestring = 0;
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
              conv_basestring = baseString.replace("data:image/png;base64,", "") ;
            }else if(type_str == 'data:application/pdf;base64'){
              // new
              $("#exampleModalCenter").modal("show");
              $("#txt_modal").text("file gambar tidak dikenali");
              $(".modal-header").addClass("bg-danger");
              //close modal and refresh
              $('#exampleModalCenter').on('hidden', function () {
                  location.reload();
              });
              //end new
            }else{
              // new
              $("#exampleModalCenter").modal("show");
              $("#txt_modal").text("file gambar tidak dikenali");
              $(".modal-header").addClass("bg-danger");
              //close modal and refresh
              $('#exampleModalCenter').on('hidden', function () {
                  location.reload();
              });
              //end new

            }

            if (conv_basestring == 0) {
              // location.reload();
              console.log('undefined file type');
            }else{
                document.getElementById("base64_data").value = conv_basestring;    
            }

            
        };
        reader.readAsDataURL(file);
    }
</script>
<script type="text/javascript">
    function add_post(){

          var title_blog = $('.title_blog').val();
          var desc_blog = CKEDITOR.instances['editor'].getData();
          var category = $('.category').prop('value');
          var alt_img = $('.alt_img').val();
          var meta_title = $('.meta_title').val();
          var meta_desc = $('.meta_desc').val();
          var meta_robot = $('.meta_robot').val();
          var urldownload = $('.urldownload').val();
          var base64image = $('#base64_data').val();
          var is_stop = $('#is_stop').is(":checked") ? 1 : 0;

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
                  url : "<?php echo base_url();?>agent/blog/insertblog",
                  method : "POST",
                  data : {
                    title_blog : title_blog,
                    desc_blog : desc_blog,
                    category : category,
                    alt_img : alt_img,
                    meta_title : meta_title,
                    meta_desc : meta_desc,
                    meta_robot : meta_robot,
                    urldownload : urldownload,
                    base64image : base64image,
                    is_stop : is_stop,
                    [csrf_name] : csrf_token,

                  },
                  async : false,
                  dataType : 'json',
                  success: function(data){
                    // var status = data.status;
                    console.log(JSON.stringify(data));
                    // if (status == 'Success') {
                      alert(JSON.stringify(data));
                      location.reload();
                    // }else{
                      // alert(data.message);
                      // location.reload();
                    // }
                  }
                });
                //end
              }
          });
          //end          
        }
</script>

<script src="http://localhost/mococell_admin/assets/js/ckeditor/ckeditor.js"></script>
<!-- <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script> -->
<script>
    CKEDITOR.replace( 'editor' );
</script>


  