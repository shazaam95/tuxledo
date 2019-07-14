<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product</title>
<?php $this->load->view("partials/head.php") ?>
</head>
<body class="animsition">
	
	<!-- Header -->
	<header class="header-v4">
		<?php $this->load->view("partials/header.php") ?>
	</header>

	<?php $this->load->view("partials/cart.php") ?>

	<?php $this->load->view("partials/products.php") ?>


	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<?php $this->load->view("partials/footer.php") ?>
	</footer>


	<?php $this->load->view("partials/back_to_top.php") ?>

	<?php $this->load->view("partials/modals.php") ?>

<?php $this->load->view("partials/js.php") ?>

<script type="text/javascript">
	
		$(document).ready(function() {
			$("#x2").attr('class', 'active-menu label1')
		});
</script>
</body>
</html>
