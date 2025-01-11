<footer class="footer">
  <div class="footer-container">
    <!-- Footer Left Section -->
    <div class="footer-left">
      <h3 class="footer-title">Linh Shop Home Decor</h3>
      <p class="footer-description">"Your home, made better."</p>
    </div>

    <!-- Footer Center Section -->
    <div class="footer-center">
      <h4 class="footer-heading">Quick Links</h4>
      <ul class="footer-links">
        <li><a href="#">Home</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </div>

    <!-- Footer Right Section -->
    <div class="footer-right">
      <h4 class="footer-heading">Follow Us</h4>
      <div class="social-links">
        <a href="#" class="social-link facebook" aria-label="Facebook"><i class="fa fa-facebook"></i></a>
        <a href="#" class="social-link twitter" aria-label="Twitter"><i class="fa fa-twitter"></i></a>
        <a href="#" class="social-link instagram" aria-label="Instagram"><i class="fa fa-instagram"></i></a>
        <a href="#" class="social-link linkedin" aria-label="LinkedIn"><i class="fa fa-linkedin"></i></a>
      </div>
    </div>
  </div>


</footer>



<!-- Back to top -->
<div class="go-top-button" id="myBtn">
    <span class="go-top-button-sym">
        <i class="zmdi zmdi-chevron-up"></i>
    </span>
</div>


<!--===============================================================================================-->
<script src="/template/assets/jquery/jquery-3.2.1.min.js"></script>
<script src="/template/assets/bootstrap/js/popper.js"></script>
<script src="/template/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/template/assets/select2/select2.min.js"></script>
<script>
    $(".js-select2").each(function () {
        $(this).select2({
            minimumResultsForSearch: 20,
            dropdownParent: $(this).next('.dropDownSelect2')
        });
    })
</script>
<!--===============================================================================================-->
<script src="/template/assets/daterangepicker/moment.min.js"></script>
<script src="/template/assets/daterangepicker/daterangepicker.js"></script>
<script src="/template/assets/slick/slick.min.js"></script>
<script src="/template/js/slick-custom.js"></script>
<script src="/template/assets/parallax100/parallax100.js"></script>
<script>
    $('.parallax100').parallax100();
</script>
<script src="/template/assets/MagnificPopup/jquery.magnific-popup.min.js"></script>
<script>
    $('.gallery-lb').each(function () { // the containers for all your galleries
        $(this).magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
                enabled: true
            },
            mainClass: 'mfp-fade'
        });
    });
</script>
<!--===============================================================================================-->
<script src="/template/assets/isotope/isotope.pkgd.min.js"></script>
<script src="/template/assets/sweetalert/sweetalert.min.js"></script>
<script>
    $('.js-addwish-b2').on('click', function (e) {
        e.preventDefault();
    });

    $('.js-addwish-b2').each(function () {
        var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
        $(this).on('click', function () {
            swal(nameProduct, "is added to wishlist !", "success");

            $(this).addClass('js-addedwish-b2');
            $(this).off('click');
        });
    });

    $('.js-addwish-detail').each(function () {
        var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

        $(this).on('click', function () {
            swal(nameProduct, "is added to wishlist !", "success");

            $(this).addClass('js-addedwish-detail');
            $(this).off('click');
        });
    });

    /*---------------------------------------------*/

    $('.js-addcart-detail').each(function () {
        var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
        $(this).on('click', function () {
            swal(nameProduct, "is added to cart !", "success");
        });
    });

</script>
<!--===============================================================================================-->
<script src="/template/assets/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script>
    $('.js-pscroll').each(function () {
        $(this).css('position', 'relative');
        $(this).css('overflow', 'hidden');
        var ps = new PerfectScrollbar(this, {
            wheelSpeed: 1,
            scrollingThreshold: 1000,
            wheelPropagation: false,
        });

        $(window).on('resize', function () {
            ps.update();
        })
    });
</script>
<!--===============================================================================================-->
<script src="/template/js/main.js"></script>
<script src="/template/js/public.js"></script>
