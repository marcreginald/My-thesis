<style>
	table.table-bordered.dataTable tbody th, table.table-bordered.dataTable tbody td{
		font-size: 12px;
		font-style: italic;
		text-align: center;
	}
	table.dataTable thead>tr>th.sorting_asc, table.dataTable thead>tr>th.sorting_desc, table.dataTable thead>tr>th.sorting, table.dataTable thead>tr>td.sorting_asc, table.dataTable thead>tr>td.sorting_desc, table.dataTable thead>tr>td.sorting{
		
		font-size: 12px;
		font-size: bold;
		
	}
</style>

<div class="col-md-12">
    <div class="card card-box">
        <div class="card-head">
            <header>Student <small>List</small></header>
            <div class="tools">
                <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-6">
                    <div class="btn-group">
                        <a data-toggle="modal" onclick="clear_form('form_student')" href="#modal_student" title="Add Student" class="btn btn-primary" style="margin-right: 5px;">
                            <i class="fa fa-plus"></i> Add New 
                        </a>

                        <a data-toggle="modal" href="#modal_student_multiple" title="Upload Student" class="btn btn-primary" style="margin-right: 5px;">
                            <i class="fa fa-upload"></i> Upload Student
                        </a>

                        <a href="<?=base_url('assets/attachments/Student_multiple_registration_template.xlsx');?>" title="Downloadable Student Excel Template" class="btn btn-default" style="margin-right: 5px;" download>
                                Downloadable Student Excel Template <i class="fa fa-download"></i>
                            </a> 

                        <buton onclick="downloadExcel()" title="Download Student Data" class="btn btn-success" style="margin-right: 5px;" download>
                            Download Student Data <i class="fa fa-download"></i>
                        </buton> 

                        <a title="Filter" class="btn btn-info" onclick="$('#panel_filter').slideToggle();">
                            <i class="fa fa-filter"></i> Fitler
                        </a>
                    </div>
                </div>
            </div>
            <div class="panel" id="panel_filter" style="display: none;">
		        <div class="panel-body" style="border: 1.5px solid #428BCA;">
		            <form id="form_filter">
		                <div class="row">
		                	<?php if ($this->session->login_school_id == 1): ?>
								<div class="col-sm-4">
									<div class="form-group">
				                        <label for="">School <span class="text-danger">*</span></label>
				                        <select name="f_school_id" class="form-control input-sm select2 filter" style="width: 100%;">
				                            <option></option>
				                        </select>
				                    </div>
								</div>
			                    <script type="text/javascript">
			                    	$(function(){
			                    		$("[name=f_school_id]").select2({
								          placeholder: "Select School",
								          allowClear: true,
								          data: <?= $schools ?>
								        });	
			                    	});
			                    </script>				
							<?php endif ?>
		                    <div class="col-sm-4"> 
		                        <div class="form-group">
		                            <label>Gender</label>
		                            <select name="f_gender" class="form-control select2 filter" style="width: 100%;">
		                                <option value="">Select</option>
		                                <option value="Male">Male</option>
		                                <option value="Female">Female</option>
		                            </select>
		                        </div>
		                    </div>
		                    <div class="col-sm-4"> 
		                        <div class="form-group">
		                            <label>Graduate Status</label>
		                            <select name="f_graduate_status" class="form-control select2 input-sm filter" style="width: 100%;">
		                                <option value="">Select</option>
		                                <option value="1">Yes</option>
		                                <option value="0">No</option>
		                            </select>
		                        </div>
		                    </div>
		                    <div class="col-sm-4"> 
		                        <div class="form-group">
		                            <label>Assessed Status</label>
		                            <select name="f_assessed_status" class="form-control select2 input-sm filter" style="width: 100%;">
		                                <option value="">Select</option>
		                                <option value="1">Yes</option>
		                                <option value="0">No</option>
		                            </select>
		                        </div>
		                    </div>
		                </div>
		            </form>
		        </div>
		    </div>
            <div class="table-scrollable">

                <table id="expTable" style="display:none;">
                            <thead>
                                <tr>
                                    <th class=""> FIRSTNAME</th>
                                    <th class=""> MIDDLENAME</th>
                                    <th class=""> LASTNAME</th>
                                    <th class=""> GENDER</th>
                                    <th class=""> ADDRESS</th>
                                    <th class=""> BIRTHDATE</th>
                                    <th class=""> SCHOOL</th>
                                    <th class=""> STATUS</th>
                                    <th class=""> GRADUATE</th>
                                    <th class=""> ASSESSED</th>
                                    <th class=""> SCHOLAR</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="tbl_student" style="width: 100%;">
                  <thead>
                    <tr>
                      <th style="width: 80px;">Student Name</th>
                      <th style="width: 80px;">Gender</th>
                      <th style="width: 80px;">Birthdate</th>
                      <th style="width: 80px;">Phone Number</th>
                      <th style="width: 80px;">Email Address</th>
                      <th style="width: 80px;">Address</th>
                      <th style="width: 80px;">School</th>
                      <th>Status</th>
                      <th style="width: 80px;">Graduate Status</th>
                      <th style="width: 80px;">Assessed Status</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table> 
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal" id="modal_student" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
	    	<?= form_open(base_url('student/insert_student'), 'id=form_student'); ?>
	            <div class="modal-header text-center">
              		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-ticket modal-icon"></i>
	                <h4 class="modal-title">Student</h4>
	                <small>Form</small>
	            </div>
	            <div class="modal-body">
                	<input type="hidden" name="student_id">
                    <div class="form-group">
                        <label for="">Firstname <span class="text-danger">*</span></label>
	                	<input type="text" name="firstname" onkeypress="return /[a-z]/i.test(event.key)" onblur="if (this.value == '') {this.value = 'Type Letters Only';}"
    onfocus="if (this.value == 'Type Letters Only') {this.value = '';}" class="form-control input-sm" required>
	                </div>
                    <div class="form-group">
                        <label for="">Middlename <span class="text-danger">*</span></label>
	                	<input type="text" name="middlename" onkeypress="return /[a-z]/i.test(event.key)" onblur="if (this.value == '') {this.value = 'Type Letters Only';}"
    onfocus="if (this.value == 'Type Letters Only') {this.value = '';}" class="form-control input-sm">
	                </div>
                    <div class="form-group">
                        <label for="">Lastname <span class="text-danger">*</span></label>
	                	<input type="text" name="lastname" onkeypress="return /[a-z]/i.test(event.key)" onblur="if (this.value == '') {this.value = 'Type Letters Only';}"
    onfocus="if (this.value == 'Type Letters Only') {this.value = '';}" class="form-control input-sm" required>
	                </div>
                    <div class="form-group">
                        <label for="">Name Extension <span class="text-danger">*</span></label>
	                	<input type="text" name="name_ext" onkeypress="return /[a-z]/i.test(event.key)" onblur="if (this.value == '') {this.value = 'Type Letters Only';}"
    onfocus="if (this.value == 'Type Letters Only') {this.value = '';}" class="form-control input-sm">
	                </div>
                    <div class="form-group">
                        <label for="">Gender <span class="text-danger">*</span></label>
	                	<select name="gender" class="form-control input-sm select2" required>
	                		<option value="">Select</option>
	                		<option value="male">Male</option>
	                		<option value="female">Female</option>
	                	</select>
	                </div>
                    <div class="form-group">
                        <label for="">Address <span class="text-danger">*</span></label>
	                	<textarea name="address" class="form-control input-sm" required style="resize: vertical;"></textarea>
	                </div>
                    <div class="form-group">
                        <label for="">Birthdate <span class="text-danger">*</span></label>
	                	<input type="date" name="birthdate" class="form-control input-sm" required>
	                </div>
                    <div class="form-group">
                        <label for="">Mobile No <span class="text-danger">*</span></label>
	                	<input type="number" name="mobile_no" class="form-control input-sm" required>
	                </div>
                    <div class="form-group">
                        <label for="">Email Address <span class="text-danger">*</span></label>
	                	<input type="email" name="email_address" class="form-control input-sm" required>
	                </div>
                    
					<?php if ($this->session->login_school_id == 1): ?>
						<div class="form-group">
	                        <label for="">School <span class="text-danger">*</span></label>
	                        <select name="school_id" class="form-control input-sm select2" required style="width: 100%;">
	                            <option></option>
	                        </select>
	                    </div>
	                    <script type="text/javascript">
	                    	$(function(){
	                    		$("[name=school_id]").select2({
						          placeholder: "Select School",
						          allowClear: true,
						          data: <?= $schools ?>
						        });	
	                    	});
	                    </script>				
					<?php endif ?>

                    <div class="form-group">
                        <label for="">Status <span class="text-danger">*</span></label>
	                	<select name="status" class="form-control input-sm select2" required>
	                		<option value="">Select</option>
	                		<option value="1">Enrolled</option>
	                		<option value="2">Dropped Out</option>
	                	</select>
	                </div>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                <button class="btn btn-info" id="student_btnSave">Save</button>
	            </div>
	       	</form>
        </div>
    </div>
</div>

<div class="modal inmodal" id="modal_student_multiple" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-file-excel-o modal-icon"></i>
                <h4 class="modal-title">Upload Excel<small></small></h4>
            </div>

            <div class="modal-body">
	            <div class="row">
	            	<div class="col-sm-12">
	            		<?= form_open_multipart(base_url("student/upload_student_multiple"), "id='form_upload_student_multiple'"); ?>
	            			<div class="row">
	            				<div class="col-sm-6">
	            					<input type="hidden" name="alert">
				                    <div class="form-group">
				                        <label for="upload_excel">Excel File:</label>
									    <input type="file" name="file" class="form-control-file" id="upload_excel">
				                    </div>
	            				</div>

	            				<?php if ($this->session->login_school_id == 1): ?>
								<div class="col-sm-6">
									<div class="form-group">
				                        <label for="">School <span class="text-danger">*</span></label>
				                        <select name="m_school_id" class="form-control input-sm select2 filter" style="width: 100%;">
				                            <option></option>
				                        </select>
				                    </div>
								</div>
			                    <script type="text/javascript">
			                    	$(function(){
			                    		$("[name=m_school_id]").select2({
								          placeholder: "Select School",
								          allowClear: true,
								          data: <?= $schools ?>
								        }).on('change', function() {
				                    		if ($(this).val() != null) {
				                    			$("[name=im_school_id]").val($(this).val());
				                    		}
				                    	});	
			                    	});
			                    </script>				
								<?php endif ?>

			                    <div class="col-sm-12">
			                    	<button type="submit" class="btn btn-primary" id="upload_student_multiple_btnSave">Submit</button>
			                    	<br><br>
			                    </div>
	            			</div>
			            </form>
	            	</div>

	            	<div class="col-sm-12">
	            		<?= form_open(base_url('student/insert_student_multiple'), 'id=form_student_multiple'); ?>
	            			<input type="hidden" name="im_school_id">
			            	<div class="row" id="div_student_multiple_info">
			            		<div class="col-sm-12">
			            			<div id="div_student_multiple_info_msg" class="text-danger"></div>
			            			<div id="div_student_multiple_info_count" class="text-danger"></div>
			            			<div class="table-responsive">

			            				<table class="table table-bordered table-hover table-striped" id="tbl_student_multiple_info">
				            				<thead>
				            					<tr>
				            						<th>Firstname</th>
				            						<th>Middlename</th>
				            						<th>Lastname</th>
				            						<th>Name Extension</th>
				            						<th>Gender</th>
				            						<th>Address</th>
				            						<th>Birthdate</th>
				            						<th>Mobile No</th>
				            						<th>Email Address</th>
				            						<th>Status</th>
				            						<th>Graduate Status</th>
				            						<th>Assessed Status</th>
				            						<th>Checked</th>
				            					</tr>
				            				</thead>

				            				<tbody></tbody>

				            				<tfoot style="display: none;">
				            					<tr>
				            						<td class="text-center">
				            							<button type="button" class="btn btn-primary btn-sm" id="student_multiple_btnSave" style="margin-bottom:0px !important;">Submit</button>
				            						</td>
				            						<td colspan="12"></td>
				            					</tr>
				            				</tfoot>
				            			</table>
			            			</div>
			            		</div>
			            	</div>
						</form>
	            	</div>
	            </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

	var tbl_student;
	var tbl_student_data;

    function downloadExcel(){
        $.ajax({
            url: "<?= base_url('student/viewAllStudent') ?>",
            //method: "GET",
            dataType: "json",
            //data: {from:hpsT5From,to:hpsT5To,schlId:$("#schoolSelected").val()},
            success: function(response) {
                $("#expTable tbody").empty();
                for(var i=0;i<response.length;i++){
                    $("#expTable tbody").append("<tr>"+
                        "<td>"+response[i]['0']+"</td>"+
                        "<td>"+response[i]['1']+"</td>"+
                        "<td>"+response[i]['2']+"</td>"+
                        "<td>"+response[i]['3']+"</td>"+
                        "<td>"+response[i]['4']+"</td>"+
                        "<td>"+response[i]['5']+"</td>"+
                        "<td>"+response[i]['6']+"</td>"+
                        "<td>"+response[i]['7']+"</td>"+
                        "<td>"+response[i]['8']+"</td>"+
                        "<td>"+response[i]['9']+"</td>"+
                        "<td>"+response[i]['10']+"</td>"+
                    "</tr>");
                }
            }
        });
        setTimeout(function(){
            $("#expTable").table2excel({
            });
        },2000);
    }
	
	$(function(){

		var student_form_options = {
			clearForm	: false,
			resetForm: false,
			beforeSubmit: function() {
				$("#student_btnSave").attr("disabled", true);
				$("#student_btnSave").html("<span class=\"fa fa-spinner fa-pulse\"></span>");
			},
			success: function(data) {
				var d = JSON.parse(data);
				if(d.success == true) {
					$.toast({
			            heading: 'Success',
			            text: d.msg,
			            position: 'top-right',
			            loaderBg:'#ff6849',
			            icon: 'success',
			            hideAfter: 3000, 
			            stack: 6
			        });
					$("#student_btnSave").attr("disabled", false);
					$("#student_btnSave").html("<span class=\"fa fa-check\"></span> Save");
					$(".close").click();
					tbl_student.ajax.reload();
				} else {
					$("#student_btnSave").attr("disabled", false);
					$("#student_btnSave").html("Save");
					$.toast({
						heading: 'Warning',
						text: d.msg,
						position: 'top-right',
						loaderBg:'#ff6849',
						icon: 'warning',
						hideAfter: 3000, 
						stack: 6
					});
				}
			}
		};
		$("#form_student").ajaxForm(student_form_options);

		$("#form_upload_student_multiple [name=file]").on("change", function(){
            var ext = this.value.match(/\.([^\.]+)$/)[1];
            switch(ext)
            {
                case 'xls':
                case 'xlsx':
                case 'csv':
                    break;
                default:
                    swal({
                        title: "Warning",
                        text: "Your file uploaded is not allowed!",
                        type: "warning"
                    });
                    this.value='';
            }
        });
        var upload_student_multiple_form_options = {
            clearForm   : false,
            resetForm: false,
            beforeSubmit: function() {
                $("#upload_student_multiple_btnSave").attr("disabled", true);
                $("#upload_student_multiple_btnSave").html("<span class=\"fa fa-spinner fa-pulse\"></span>");
            },
            success: function(data) {
                var d = JSON.parse(data);
                
                if(d.success == true) {

                    $.toast({
			            heading: 'Success',
			            text: d.msg,
			            position: 'top-right',
			            loaderBg:'#ff6849',
			            icon: 'success',
			            hideAfter: 3000, 
			            stack: 6
			        });

                	$("#div_student_multiple_info").slideDown();

                    $("#upload_student_multiple_btnSave").attr("disabled", false);
                    $("#upload_student_multiple_btnSave").html("<span class=\"fa fa-check\"></span> Uploaded");

                    $("#tbl_student_multiple_info tbody").empty();
                    $("#div_student_multiple_info_msg").html(d.msg);

                    $("#div_student_multiple_info_count").html('Data count: '+d.count);

                    $("#tbl_student_multiple_info tfoot").show();

                    $.each(d.data_excel, function(k, v) {
                    	$("#tbl_student_multiple_info tbody").append('<tr>\
											                    		<input type="hidden" name="firstname[]" value="'+( v.firstname != null ? v.firstname:"" )+'">\
											                    		<input type="hidden" name="middlename[]" value="'+( v.middlename != null ? v.middlename:"" )+'">\
											                    		<input type="hidden" name="lastname[]" value="'+( v.lastname != null ? v.lastname:"" )+'">\
											                    		<input type="hidden" name="name_ext[]" value="'+( v.name_ext != null ? v.name_ext:"" )+'">\
											                    		<input type="hidden" name="gender[]" value="'+( v.gender != null ? v.gender:"" )+'">\
											                    		<input type="hidden" name="address[]" value="'+( v.address != null ? v.address:"" )+'">\
											                    		<input type="hidden" name="birthdate[]" value="'+( v.birthdate != null ? v.birthdate:"" )+'">\
											                    		<input type="hidden" name="mobile_no[]" value="'+( v.mobile_no != null ? v.mobile_no:"" )+'">\
											                    		<input type="hidden" name="email_address[]" value="'+( v.email_address != null ? v.email_address:"" )+'">\
											                    		<input type="hidden" name="status[]" value="'+( v.status != null ? v.status:"" )+'">\
											                    		<input type="hidden" name="graduate_status[]" value="'+( v.graduate_status != null ? v.graduate_status:"" )+'">\
											                    		<input type="hidden" name="assessed_status[]" value="'+( v.assessed_status != null ? v.assessed_status:"" )+'">\
            															<td>'+(v.firstname ? v.firstname : "")+'</td>\
            															<td>'+(v.middlename ? v.middlename : "")+'</td>\
            															<td>'+(v.lastname ? v.lastname : "")+'</td>\
            															<td>'+(v.name_ext ? v.name_ext : "")+'</td>\
            															<td>'+(v.gender ? v.gender : "")+'</td>\
            															<td>'+(v.address ? v.address : "")+'</td>\
            															<td>'+(v.birthdate ? v.birthdate : "")+'</td>\
            															<td>'+(v.mobile_no ? v.mobile_no : "")+'</td>\
            															<td>'+(v.email_address ? v.email_address : "")+'</td>\
            															<td>'+(v.status == 1 ? 'Enrolled':'Not Enrolled')+'</td>\
            															<td>'+(v.graduate_status == 1 ? 'Yes':'No')+'</td>\
            															<td>'+(v.assessed_status == 1 ? 'Yes':'No')+'</td>\
            															<td>'+(v.checked != 0 ? "Exist":"Not Existed")+'</td>\
            														</tr>');
                    });
                } else {
                    $.toast({
						heading: 'Warning',
						text: d.msg,
						position: 'top-right',
						loaderBg:'#ff6849',
						icon: 'warning',
						hideAfter: 3000, 
						stack: 6
					});
                    $("#upload_student_multiple_btnSave").attr("disabled", false);
                    $("#upload_student_multiple_btnSave").html("Submit");
                }
            }
        };
        $("#form_upload_student_multiple").ajaxForm(upload_student_multiple_form_options);      

        $("#student_multiple_btnSave").on("click", function(){
        	swal({
	            html: true,
	            title: "Are you sure?",
	            text: "You want to save this data now?",
	            type: "warning",
	            showCancelButton: true,
	            confirmButtonColor: "#18a689",
	            confirmButtonText: "Yes, save it!",
	            cancelButtonText: "No, cancel plx!",
	            closeOnConfirm: true,
	            closeOnCancel: false 
	        },
	        function (isConfirm) {
	            if (isConfirm) {
	                $("#student_multiple_btnSave").attr("disabled", false);
	                $("#student_multiple_btnSave").html("<span class=\"fa fa-check\"></span> Save");
	                $("#form_student_multiple").submit();
	            } else {
	                swal("Cancelled", "Your data are not save :)", "error");
	                $("#student_multiple_btnSave").attr("disabled", false);
	                $("#student_multiple_btnSave").html("Save");
	            }
	        });
        });

        var student_multiple_form_options = {
            clearForm   : false,
            resetForm: false,
            beforeSubmit: function() {
                $("#student_multiple_btnSave").attr("disabled", true);
                $("#student_multiple_btnSave").html("<span class=\"fa fa-spinner fa-pulse\"></span>");
            },
            success: function(data) {
                var d = JSON.parse(data);
                if(d.success == true) {
                    $.toast({
			            heading: 'Success',
			            text: d.msg,
			            position: 'top-right',
			            loaderBg:'#ff6849',
			            icon: 'success',
			            hideAfter: 3000, 
			            stack: 6
			        });
                    $("#student_multiple_btnSave").attr("disabled", false);
                    $("#student_multiple_btnSave").html("<span class=\"fa fa-check\"></span> Submitted");
	                // $(".close").click();
	                location.reload();
                } else {
                    $.toast({
						heading: 'Warning',
						text: d.msg,
						position: 'top-right',
						loaderBg:'#ff6849',
						icon: 'warning',
						hideAfter: 3000, 
						stack: 6
					});
                    $("#student_multiple_btnSave").attr("disabled", false);
                    $("#student_multiple_btnSave").html("Submit");
                }
            }
        };
        $("#form_student_multiple").ajaxForm(student_multiple_form_options);  

        $(".filter").on("change keyup", function() {
            tbl_student_data = $("#form_filter").serializeArray();
            tbl_student.ajax.reload();
        });

		tbl_student = $("#tbl_student").DataTable({
            order: [[0, 'asc'], [6, 'asc'], [7, 'desc']],
            ajax: {
                url: "<?= base_url('student/get_students') ?>",
                type: "POST",
                data: function() {
                    return tbl_student_data;
                }
            }
        });

	});

	function change_status(student_id, status, status_no) {
		$.post('<?= base_url('student/change_status') ?>', 
			{ student_id, status, status_no }, 
			function(data) {
				var d = JSON.parse(data);
				if(d.success == true) {
					$.toast({
			            heading: 'Success',
			            text: d.msg,
			            position: 'top-right',
			            loaderBg:'#ff6849',
			            icon: 'success',
			            hideAfter: 3000, 
			            stack: 6
			        });
					tbl_student.ajax.reload();
				} else {
					$.toast({
						heading: 'Warning',
						text: d.msg,
						position: 'top-right',
						loaderBg:'#ff6849',
						icon: 'warning',
						hideAfter: 3000, 
						stack: 6
					});
				}
		});
	}

</script>