<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<?php $this->load->view("partials/head.php") ?>
</head>
<body class="animsition">
	
	<!-- Header -->
	<header>
		<?php $this->load->view("partials/header.php") ?>
	</header>

	<?php $this->load->view("partials/cart.php") ?>

		
	<?php $this->load->view("partials/homepage/slider.php") ?>
	
	<?php $this->load->view("partials/homepage/banner.php") ?>


	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<?php $this->load->view("partials/footer.php") ?>
	</footer>


	<?php $this->load->view("partials/back_to_top.php") ?>

	<?php $this->load->view("partials/modals.php") ?>

<?php $this->load->view("partials/js.php") ?>

<script type="text/javascript">
	
		$(document).ready(function() {
			$("#x1").attr('class', 'active-menu')
		});
</script>

</body>
</html>