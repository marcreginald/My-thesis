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
<!-- start sidebar menu -->
<div class="sidebar-container">
	<div class="sidemenu-container navbar-collapse collapse fixed-menu">
	    <div id="remove-scroll" class="left-sidemenu">
	        <ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
	            <li class="sidebar-toggler-wrapper hide">
	                <div class="sidebar-toggler">
	                    <span></span>
	                </div>
	            </li>
	            <li class="sidebar-user-panel">
	                <div class="user-panel">
	                    <div class="pull-left image">
	                        <img src="<?= $user_image ?>" class="img-circle user-img-circle" alt="User Image" />
	                    </div>
	                    <div class="pull-left info">
	                        <p> <?= $user_name ?></p>
	                        <a href="#"><i class="fa fa-circle user-online"></i><span class="txtOnline"> Online</span></a>
	                    </div>
	                </div>
	            </li>
	            <li class="nav-item <?= ($this->uri->segment(1) == "dashboard" ? "active" : "") ?>">
	                <a href="<?= base_url().'dashboard' ?>" class="nav-link nav-toggle">
	                    <i class="material-icons">dashboard</i>
	                    <span class="title">Dashboard</span>
	                </a>
	            </li>
                <li class="nav-item <?= ($this->uri->segment(1) == "certificate" ? "active" : "") ?>">
                    <a href="<?= base_url().'certificate' ?>" class="nav-link nav-toggle">
                        <i class="fa fa-certificate"></i>
                        <span class="title">Certificate</span>
                    </a>
                </li>

                <li class="nav-item <?= ($this->uri->segment(1) == "student" ? "active" : "") ?>">
                    <a href="<?= base_url().'student' ?>" class="nav-link nav-toggle"> 
                        <i class="fa fa-user"></i>
                        <span class="title">Student</span> 
                    </a>
                </li>


                <li class="nav-item <?= ($this->uri->segment(1) == "user" ? "active" : "") ?>">
                    <a href="<?= base_url().'user' ?>" class="nav-link nav-toggle"> 
                        <i class="fa fa-user"></i>
                        <span class="title">User</span> 
                    </a>
                </li>
                
                <?php if ($this->session->login_school_id == 1): ?>
                    <li class="nav-item <?= ($this->uri->segment(1) == "references" ? "active" : "") ?>">
                        <a href="javascript:;" class="nav-link nav-toggle"> 
                            <i class="fa fa-registered"></i>
                            <span class="title">References</span> 
                            <span class="arrow <?= ($this->uri->segment(1) == "references" ? "open" : "") ?>"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item <?= ($this->uri->segment(2) == "school" ? "active" : "") ?>">
                                <a href="<?= base_url().'references/school' ?>" class="nav-link "> <span class="title">School</span>
                                </a>
                            </li> 
                            <li class="nav-item <?= ($this->uri->segment(2) == "qualification_program_title" ? "active" : "") ?>">
                                <a href="<?= base_url().'references/qualification_program_title' ?>" class="nav-link "> <span class="title">Qualification/ Program Title</span>
                                </a>
                            </li>                           
                            <li class="nav-item <?= ($this->uri->segment(2) == "user_role" ? "active" : "") ?>">
                                <a href="<?= base_url().'references/user_role' ?>" class="nav-link "> <span class="title">User Role</span>
                                </a>
                            </li>
                        </ul>
                    </li>   

                    <li class="nav-item <?= ($this->uri->segment(1) == "logs" ? "active" : "") ?>">
                        <a href="<?= base_url().'logs' ?>" class="nav-link nav-toggle"> 
                            <i class="fa fa-history"></i>
                            <span class="title">Logs</span> 
                        </a>
                    </li> 

                    <li class="nav-item <?= ($this->uri->segment(1) == "reports" ? "active" : "") ?>">
                        <a href="<?= base_url().'reports' ?>" class="nav-link nav-toggle"> 
                            <i class="fa fa-bar-chart"></i>
                            <span class="title">Analytics</span> 
                        </a>
                    </li>    

                    <li class="nav-item <?= ($this->uri->segment(1) == "evaluation" ? "active" : "") ?>">
                        <a href="<?= base_url().'evaluation' ?>" class="nav-link nav-toggle"> 
                            <i class="fa fa-bar-chart"></i>
                            <span class="title">Evaluation Report</span> 
                        </a>
                    </li>            
                <?php endif ?>              
	        </ul>
	    </div>
	</div>
</div>
<!-- end sidebar menu --> 