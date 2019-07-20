<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?= $system_title ?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	
	<!-- Favicon -->
	<link rel="icon" type="image/png" sizes="56x56" href="<?= base_url() ?>assets/public/images/fav-icon/icon.png">
	<?php $this->load->view('interface/publicWebsite/includes/Css'); ?>
</head>
<body>

	<!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->
	
	<?php $this->load->view('interface/publicWebsite/includes/Header'); ?>

	<!-- SLIDER  AREA -->
   
		
	
	<div class="course_area course_area_style2" id="course">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
					<div class="section-title  t_left">
						<!-- title -->
						<h2>Course</h2>						
						
					</div>	
				</div>
				<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
					<div class="row">
						<form id="form_filter">
							<div class="col-sm-3">
								<div class="form-group">
									<label for="">School</label>
									<select name="f_school_id" class="form-control input-sm filter">
										<option></option>
									</select>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="row">
				
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					 <div class="table-scrollable">
		                <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="tbl_course" style="width: 100%;">
		                    <thead>
		                        <th>School</th>
		                        <th>Qualification / Program Title</th>
		                    </thead>
		                    <tbody></tbody>
		                </table>
		            </div>
				
				</div>


				
			</div>
		</div>
	</div>
	
	<!-- CONTACT_AREA -->
	<div class="contact_area contact_onepage" id="contact" >
		<div class="container">		
			<div class="row">
				<div class="col-md-12">
					<div class="section-title  t_center">
						<!-- title -->
						<h2>Contact With Us</h2>						
							<!-- ICON -->
						<div class="em-icon">	
							<i class="fa fa-graduation-cap "></i>
						</div>
					</div>	
				</div>	
			</div>
			<div class="row contact_information">
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="contact_info">
						<div class="single_plases">
							<div class="single_plases_inner">
								<div class="plases_icon">
									<i class="fa fa-map-marker"></i>
								</div>
								<div class="plases_text">
									<p>Road-12, Block-D, Ulipur</p>
									<p>Kurigram, Dhaka</p>
								</div>
							</div>
							
						</div>
					</div>
					
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="contact_info">
					
						<div class="single_plases">
							<div class="single_plases_inner">
								<div class="plases_icon">
									<i class="fa fa-phone"></i>
								</div>
								<div class="plases_text">
									<p>+088 078 968 745</p>
									<p>+088 088 968 845</p>
									
								</div>
							</div>
							
						</div>
					</div>
					
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="contact_info">
						<div class="single_plases">
							<div class="single_plases_inner">
								<div class="plases_icon">
									<i class="fa fa-envelope"></i>
								</div>
								<div class="plases_text">
									<p>exam@gmail.com</p>
									<p>exam@gmail.com</p>
								</div>
							</div>
							
						</div>
					</div>
					
				</div>
				
			</div>

		</div>
	</div>
	<div class="google_map_area">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="google_map_area">
						<iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d7882.604223475783!2d125.53312082425423!3d8.944283724318588!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d8.948058!2d125.5417731!4m5!1s0x3301c04e04006b69%3A0x3e43fe42ecfb8907!2sTechnical+Education+and+Skills+Development+Authority+(TESDA)+-+Agusan+del+Norte+Provincial+Office%2C+Capitol+Compound%2C+Butuan+City%2C+Agusan+del+Norte!3m2!1d8.940514!2d125.53329599999999!5e0!3m2!1sen!2sph!4v1551258747151" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>	
					</div>
				</div>				
			</div>
		</div>
	</div>
	
	<?php $this->load->view('interface/publicWebsite/includes/Footer'); ?>

	<?php $this->load->view('interface/publicWebsite/includes/Js'); ?>

	<script type="text/javascript">

		var tbl_course;
	    var tbl_course_data;
		
		$(function(){

			$("[name=f_school_id]").select2({
	            placeholder: "Search",
	            allowClear: true,
	            data: <?= $schools ?>
	        });

	        $(".filter").on("change keyup", function() {
	            tbl_course_data = $("#form_filter").serializeArray();
	            tbl_course.ajax.reload();
	        });

	        tbl_course = $("#tbl_course").DataTable({
	            ajax: {
	                url: "<?= base_url('home/get_courses') ?>",
	                type: "POST",
	                data: function() {
	                    return tbl_course_data;
	                }
	            }
	        });

		});

	</script>

</body>
</html>