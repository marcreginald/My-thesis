<?php if (isset($this->session->login_id)): ?>
    <?= redirect(base_url('dashboard')); exit; ?>
<?php endif ?>
<!DOCTYPE html>
<html>

<!-- Mirrored from radixtouch.in/templates/admin/smart/source/light/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Jul 2018 08:53:38 GMT -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />

    <title><?= $page_title ?> | <?= $system_title ?></title>

    <!-- google font -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />
	<!-- icons -->
    <link href="<?= base_url() ?>assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/iconic/css/material-design-iconic-font.min.css">
    <!-- bootstrap -->
	<link href="<?= base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/pages/extra_pages.css">
	<!-- favicon -->
    <link rel="shortcut icon" href="http://radixtouch.in/templates/admin/smart/source/assets/img/favicon.ico" /> 
    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js" ></script>
    <style type="text/css">
		.page-background {
			background-image: url('<?= base_url() ?>assets/images/desktop-background.png') !important;
		}
	</style>
</head>
<body>
    <div class="limiter">
		<div class="container-login100 page-background">
			<div class="wrap-login100">
				<?= form_open(base_url('request_login'), 'class="login100-form validate-form"'); ?>
					<span class="login100-form-logo">
						<img alt="" src="<?= base_url() ?>assets/images/tesda_logo.png" class="img-thumbnail">
					</span>
					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>
					<?php if ($this->input->get("login_attempt") == md5(0)): ?>
		                <h5 class='text-danger text-center'>Invalid Username or Password. Please try again.</h5>
		            <?php elseif ($this->input->get("login_attempt") == md5(1)): ?>
		                <h5 class="text-danger text-center" style="line-height: 17px;">Sorry, you are block in this website! <br> For more information. <br> Please contact admistrator.</h5>
		            <?php endif ?>
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username" autofocus>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
					<div class="text-center p-t-30">
						<a class="txt1" href="forgot_password.html">
							Forgot Password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
    <!-- start js include path -->
    <!-- bootstrap -->
    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.min.js" ></script>
    <script src="<?= base_url() ?>assets/js/pages/extra-pages/pages.js" ></script>
    <!-- end js include path -->
    
</body>
</html>