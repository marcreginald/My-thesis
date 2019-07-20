<?php 
    $user_image = '';
    if ($images != null) {
        $user_image = base_url().$images;
    } else {
        if ($gender != null) {
            if ($gender == "male") {
                $user_image = base_url().'assets/images/avatar04.png';
            } else {
                $user_image = base_url().'assets/images/avatar3.png';
            }
        } else {
            $user_image = base_url().'assets/images/default.png';
        }
    }
 ?>

 <style type="text/css">
     .logo-icon {
        line-height: 32px !important;
        padding-top: 0px;
     }
 </style>
<!-- start header -->
<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner ">
        <!-- logo start -->
        <div class="page-logo">
            <a href="<?= base_url() ?>">
            <span class="logo-icon fa-rotate-45"><img src="<?= base_url() ?>assets/images/tesda_logo.png" style="width: 30px;"></span>
            <span class="logo-default">Tesda</span> </a>
        </div>
        <!-- logo end -->
		<ul class="nav navbar-nav navbar-left in">
			<li><a href="#" class="menu-toggler sidebar-toggler"><i class="icon-menu"></i></a></li>
		</ul>
        <!-- start mobile menu -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
            <span></span>
        </a>
       <!-- end mobile menu -->
        <!-- start header menu -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
            	<li><a href="javascript:;" class="fullscreen-btn"><i class="fa fa-arrows-alt"></i></a></li>
                <!-- end message dropdown -->
					<!-- start manage user dropdown -->
				<li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img alt="" class="img-circle " src="<?= $user_image ?>" />
                        <span class="username username-hide-on-mobile"> <?= $user_name ?> </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="user_profile.html">
                                <i class="icon-user"></i> Profile </a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>request_logout">
                                <i class="icon-logout"></i> Log Out </a>
                        </li>
                    </ul>
                </li>
                <!-- end manage user dropdown -->
                <li class="dropdown dropdown-quick-sidebar-toggler hidden">
                     <a id="headerSettingButton" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">
                       <i class="material-icons">more_vert</i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- end header -->