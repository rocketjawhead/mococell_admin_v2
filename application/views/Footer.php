



  <!-- ======= Footer ======= -->
  
  <footer id="footer">

    <!-- <div class="footer-newsletter" data-aos="fade-up">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div> -->

    <div class="footer-top" style="margin-top: 30px;">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact" data-aos="fade-up" data-aos-delay="100">
            <h3>JAJANPULSA.ID</h3>
            <p>
              JL. Kedoya Raya No 100 <br>
              Pondok Cina - Margonda Raya<br>
              Depok - Jawa Barat <br><br>
              <strong>Telephone:</strong> 081385745050<br>
              <strong>Email:</strong> info@jajanpulsa.id<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="200">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Beranda</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Cek Transaksi</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Layanan</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Mitra</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Masuk</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="300">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Paket Pulsa</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Paket Internet/Data</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Listrik</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Tagihan</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">E-Wallet</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="400">
            <h4>Our Social Networks</h4>
            <p>Ikuti sosial media kami untuk info dan promo lainnya</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>HEY IO - JAJANPULSA</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/ -->
        Powered By <a href="http://hey-io.com/">HEY IO</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  
  
</body>
<!-- <script src="<?php echo base_url()?>assets/assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url()?>assets/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="<?php echo base_url()?>assets/assets/vendor/php-email-form/validate.js"></script>
<script src="<?php echo base_url()?>assets/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?php echo base_url()?>assets/assets/vendor/venobox/venobox.min.js"></script> -->
<!-- <script src="<?php echo base_url()?>assets/assets/vendor/owl.carousel/owl.carousel.min.js"></script> -->
<script src="<?php echo base_url()?>assets/assets/vendor/aos/aos.js"></script>
<!-- Template Main JS File -->
<script src="<?php echo base_url()?>assets/assets/js/main.js"></script>

<script type="text/javascript">
  $( document ).ready(function() {

      var path = '<?php echo $this->uri->segment(1);?>'+'/'+'<?php echo $this->uri->segment(2);?>';
      $.ajax({
        url : "<?php echo base_url();?>dashboard/visitor",
        method : "POST",
        data : {
          url_path: path
        },
        async : false,
        dataType : 'json',
        success: function(data){
          // var status = data.status;
          console.log(path);
        }
      });
  });
</script>
</html>