<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />

    <!-- logo -->
	<link rel="icon" type="image/png" href="<?= $system_logo ?>">

    <!-- Page title -->
    <title><?= $page_title ?> | <?= $system_title ?></title>

    <!-- Css -->
    <?php $this->load->view('interface/system/layout/Css'); ?>
  
    <script src="<?= base_url() ?>assets/js/jquery-2.1.1.js"></script>

</head>
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-blue logo-blue dark-sidebar-color rtls">
	
	<div class="page-wrapper">

		<?php $this->load->view('interface/system/layout/Header'); ?>
		
		<!-- start page container -->
		<div class="page-container">

			<?php $this->load->view('interface/system/layout/Sidemenu'); ?>
 			
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                	<div class="row">
                		<?php foreach ($content as $data): ?>
                	    	<?= $data ?> 	
		               	<?php endforeach ?>   
                	</div>            
                </div>
            </div>
            <!-- end page content -->
        </div>
		<!-- end page container -->

		<?php $this->load->view('interface/system/layout/Footer'); ?>

	</div>
    
    <!-- < ?php $this->load->view('interface/chat/Main'); ?> -->

	<?php $this->load->view('interface/system/layout/Js'); ?>

</body>
</html>