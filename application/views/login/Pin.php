<!DOCTYPE html>

<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="<?php echo base_url()?>assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Mococell</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url()?>assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="<?php echo base_url()?>assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?php echo base_url()?>assets/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- login -->
          <div class="card">
            
            <!-- otp -->
            <div id="pin">
                <div class="card-body">
                  <h4 class="mb-2 text-center">PIN</h4>
                  <p class="mb-4 text-center">Masukkan PIN !</p>
                <input type="hidden" id="email">
                <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2 digit-group"> 
                    <input style="display:inline-block;padding:15px 10px;line-height:140%; border: 2px solid;" class="text-center form-control rounded" type="number" id="digit-1" name="digit-1" data-next="digit-2" maxlength="1" />
                    <input style="display:inline-block;padding:15px 10px;line-height:140%; border: 2px solid;" class="text-center form-control rounded" type="number" id="digit-2" name="digit-2" data-next="digit-3" data-previous="digit-1" maxlength="1" />
                    <input style="display:inline-block;padding:15px 10px;line-height:140%; border: 2px solid;" class="text-center form-control rounded" type="number" id="digit-3" name="digit-3" data-next="digit-4" data-previous="digit-2" maxlength="1"/>
                    <input style="display:inline-block;padding:15px 10px;line-height:140%; border: 2px solid;" class="text-center form-control rounded" type="number" id="digit-4" name="digit-4" data-next="digit-5" data-previous="digit-3" maxlength="1"/>
                </div>
                <p class="text-gray-600">Lupa PIN ? 
                <a href="<?php echo base_url('Login/reset_pin')?>"class="font-bold">Reset PIN</a></p>  
                </div>
            </div>
            <!-- end otp -->
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?php echo base_url()?>assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/libs/popper/popper.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/js/bootstrap.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="<?php echo base_url()?>assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="<?php echo base_url()?>assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <!-- <script async defer src="https://buttons.github.io/buttons.js"></script> -->
<script type="text/javascript">
    $('.digit-group').find('input').each(function() {
        $(this).attr('maxlength', 1);
        $(this).on('keyup', function(e) {
            var parent = $($(this).parent());
            
            if(e.keyCode === 8 || e.keyCode === 37) {
                var prev = parent.find('input#' + $(this).data('previous'));
                
                if(prev.length) {
                    $(prev).select();
                }
            } else if((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode === 39) {
                var next = parent.find('input#' + $(this).data('next'));
                
                if(next.length) {
                    $(next).select();
                } else {
                    if(parent.data('autosubmit')) {
                        parent.submit();
                    }
                }
            }
        });
    });
</script>


<script type="text/javascript">
    $('#pin').keyup(function(){
        // var email = $('#email').val();
        var pin = $('#pin').val();
        // console.log()
        var input1 = $('#digit-1').val();
        var input2 = $('#digit-2').val();
        var input3 = $('#digit-3').val();
        var input4 = $('#digit-4').val();
        var pin = input1+input2+input3+input4;
        // console.log(pin)

        // var csrf_name = '<?php echo $csrf_name;?>';
        // var csrf_token = '<?php echo $csrf_token;?>';

        if (pin.length == 4) {
            // alert('asd');


            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "<?php echo base_url();?>Auth/get_csrf", 
                success: function (data) {
                    var csrf_token = data.csrf_token;
                    var csrf_name = '<?php echo $csrf_name;?>';

                    $.ajax({
                      url : "<?php echo base_url();?>agent/pin/exec_pin",
                      method : "POST",
                      data : {
                        pin: pin,
                        [csrf_name] : csrf_token,
                      },
                      async : false,
                      dataType : 'json',
                      success: function(data){
                        console.log(data);
                        if (data.responsecode == '00') {
                            var url = "<?php echo base_url('agent/Dashboard/');?>"
                            window.location.href = url;
                        }else{
                            alert("Please Check Your PIN input");
                        }
                        
                      }
                });
                }
            });
            
        }
    });
</script>

  </body>
</html>
