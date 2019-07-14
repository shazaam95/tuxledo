<!--===============================================================================================-->	
	<script src="<?php echo base_url('assets/jquery/jquery-3.2.1.min.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/animsition/js/animsition.min.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/bootstrap/js/popper.js') ?>"></script>
	<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/select2/select2.min.js') ?>"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/daterangepicker/moment.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/daterangepicker/daterangepicker.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/slick/slick.min.js') ?>"></script>
	<script src="<?php echo base_url('js/slick-custom.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/parallax100/parallax100.js') ?>"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/MagnificPopup/jquery.magnific-popup.min.js') ?>"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/isotope/isotope.pkgd.min.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/sweetalert/sweetalert.min.js') ?>"></script>
	
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script>const BASE_URL = "<?php echo site_url();?>";</script>
	<script src="<?php echo base_url('js/main.js') ?>"></script>
	<script src="<?php echo base_url('js/product.js') ?>"></script>