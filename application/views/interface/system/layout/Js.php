<script src="<?= base_url() ?>assets/plugins/popper/popper.js" ></script>
<script src="<?= base_url() ?>assets/plugins/jquery-blockui/jquery.blockui.min.js" ></script>
<script src="<?= base_url() ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- bootstrap -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.min.js" ></script>
<script src="<?= base_url() ?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js" ></script>
<!-- notifications -->
<script src="<?= base_url() ?>assets/plugins/jquery-toast/dist/jquery.toast.min.js" ></script>
<script src="<?= base_url() ?>assets/plugins/sparkline/jquery.sparkline.js" ></script>
<script src="<?= base_url() ?>assets/js/pages/sparkline/sparkline-data.js" ></script>
<!-- Common js-->
<script src="<?= base_url() ?>assets/js/app.js" ></script>
<script src="<?= base_url() ?>assets/js/layout.js" ></script>
<script src="<?= base_url() ?>assets/js/theme-color.js" ></script>
<!-- material -->
<script src="<?= base_url() ?>assets/plugins/material/material.min.js"></script>
<!-- summernote -->
<script src="<?= base_url() ?>assets/plugins/summernote/summernote.js" ></script>
<script src="<?= base_url() ?>assets/js/pages/summernote/summernote-data.js" ></script>
<script src="<?= base_url();?>vendor/tablexcel/src/jquery.table2excel.js"></script>

<!-- data tables -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js" ></script>
<script src="<?= base_url() ?>assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js" ></script>

<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.form.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/plugins/craftpip-jquery-confirm-479304a/dist/jquery-confirm.min.js"></script>

<!--select2-->
<script src="<?= base_url() ?>assets/plugins/select2/js/select2.js" ></script>
<!-- <script src="<?= base_url() ?>assets/js/pages/select2/select2-init.js" ></script> -->

<script type="text/javascript" src="<?= base_url() ?>assets/plugins/jasny/jasny-bootstrap.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/plugins/dist/sweetalert.min.js"></script>
<input type="hidden" name="user_name" value="<?= $user_name ?>">
<script type="text/javascript">
	
	$(function(){
		
		get_welcome_message();

	});

	function get_welcome_message() {
		var login_name = $("[name=user_name]").val();
		var login_date = "<?= $login_date ?>";
		var new_login_date = new Date(login_date);

		var hour = checkTime(new_login_date.getHours());
		var minute = checkTime(new_login_date.getMinutes());
		var second = checkTime(new_login_date.getSeconds()+5);

		var time = hour + ":" + minute + ":" + second;

		var good_message = "";
		// console.log(date('time') +'<='+ time);
		if (date('time') <= time) {

			if (date('time') >= '00:00:00' && date('time') <= '11:59:59') {
				good_message = "Good Morning";
			} else if (date('time') >= '12:00:00' && date('time') <= '12:59:59') {
				good_message = "Good Noon";
			} else if (date('time') >= '13:00:00' && date('time') <= '17:59:59') {
				good_message = "Good Afternoon";
			} else if (date('time') >= '18:00:00' && date('time') <= '23:59:59') {
				good_message = "Good Evening";
			}

		    setTimeout(function(){
		    	$.toast({
		            heading: 'Welcome to Tesda Affliated School',
		            text: good_message+', '+login_name,
		            position: 'top-right',
		            loaderBg:'#ff6849',
		            icon: 'info',
		            hideAfter: 3000, 
		            stack: 6
	          	});
		    }, 1300);

		}

	}

	function clear_form(form_id) {
		$("#"+form_id)[0].reset();
		$("#"+form_id).find("input[type='hidden']").each(function() {
			$(this).val("");
		});
		$("#"+form_id).find("input[type='checkbox']").each(function() {
			$(this).attr("checked", false);
		});
		$(".select2").val("").trigger("change");
	}

	function get_info(url, value, form_id) {
		$.post("<?= base_url() ?>" + url, 
			{ value: value }, 
			function(data) {
				var result = JSON.parse(data);
				$.each(result, function(k, v) {
					$("#"+form_id).each(function() {
						$("[name="+k+"]").val(v);
						$(".select2").trigger("change");
					});
				});
			}
		);
	}

	function delete_this(url, value, tbl) {
		$.confirm({
			theme: 'white',
			icon: 'fa fa-warning',
			title: 'Warning',
			content: 'Are you sure you want to delete this?',
			draggable: true,
			animation: 'rotateY',
    		closeAnimation: 'rotateY',
			buttons: {
		        danger: {
		            text: '<i class="fa fa-check"></i> Yes', // With spaces and symbols
		            action: function () {
		                $.post("<?= base_url() ?>" + url,
							{ value: value }, 
							function(data) {
								var d = JSON.parse(data);
								if(d.success == true) {
								   $.toast({
					                  heading: 'Success',
					                  text: d.msg,
					                  position: 'top-right',
					                  loaderBg:'#ff6849',
					                  icon: 'info',
					                  hideAfter: 3000, 
					                  stack: 6
					                });
								    for(var x=0; x < tbl.length; x++) {
								    	tbl[x].ajax.reload();
								    }
								} else {
								    $.toast({
					                  heading: 'Warning',
					                  text: d.msg,
					                  position: 'top-right',
					                  loaderBg:'#ff6849',
					                  icon: 'warning',
					                  hideAfter: 3500, 
					                  stack: 6
					                });
								}
							}
						);
		            }
		        },
		        info: {
		        	text: '<i class="fa fa-remove"></i> No',
		            btnClass: 'btn-primary',
		            action: function () {
		                $.alert('Your data is save!');
		            }
		        },
		    }
		});
	}

	function number_format(n) {
		return n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');
	}

	function date(value){
		var d = new Date();

		var month = d.getMonth()+1;
		var day = d.getDate();
		var year = d.getFullYear();

		var hour = checkTime(d.getHours());
		var minute = checkTime(d.getMinutes());
		var second = checkTime(d.getSeconds());

		var time = hour + ":" + minute + ":" + second;

		var fullyear = year + '-' + (month < 10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day;

		var fulltime = fullyear + ' ' + time;

		var output = '';

		if (value == 'month') {
			output = month;
		} else if (value == 'day') {
			output = day;
		} else if (value == 'year') {
			output = year;
		} else if (value == 'year') {
			output = year;
		} else if (value == 'hour') {
			output = hour;
		} else if (value == 'minute') {
			output = minute;
		} else if (value == 'second') {
			output = second;
		} else if (value == 'time') {
			output = time;
		} else if (value == 'fullyear') {
			output = fullyear;
		} else if (value == 'fulltime') {
			output = fulltime;
		}

		return output;
	}

	function checkTime(i) {
	    if (i < 10) {
	        i = "0" + i;
	    }
	    return i;
	}

</script>