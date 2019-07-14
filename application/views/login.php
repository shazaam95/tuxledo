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
<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<center>
			<div class="row">
				<div class="col">
					<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
						<div class="sufee-alert alert with-close alert-warning alert-dismissible fade show" style="text-align: left;">
	                        You must login first
	                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                        <span aria-hidden="true">&times;</span>
	                        </button>
                    	</div>
                    	<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show error" style="text-align: left;">
                            <p id="errorp"></p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
						<form action="" method="post" id="login">
							<h4 class="mtext-105 cl2 txt-center p-b-30">
								Login
							</h4>

							<div class="bor8 m-b-20 how-pos4-parent">
								<input class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30" type="text" name="username" placeholder="Username" id="username">
								
							</div>

							<div class="bor8 m-b-20 how-pos4-parent">
								<input class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30" type="password" name="password" placeholder="Password" id="password">
							</div>

							<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" type="submit">
								Login
							</button>
						</form>
					</div>
				</div>
			</div></center>
		</div>
</section>

<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<?php $this->load->view("partials/footer.php") ?>
	</footer>

	<?php $this->load->view("partials/js.php") ?>
	<script src="<?php echo base_url('js/auth.js') ?>"></script>

</body>
</html>