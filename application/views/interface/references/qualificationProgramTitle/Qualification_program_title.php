<?php if ($this->session->login_school_id != 1): ?>
  <?php redirect(base_url('dashboard')) ?>
<?php endif ?>

<style>
	table.table-bordered.dataTable tbody th, table.table-bordered.dataTable tbody td{
		font-size: 12px;
		font-style: italic;
		text-align: center;
	}
	table.dataTable thead>tr>th.sorting_asc, table.dataTable thead>tr>th.sorting_desc, table.dataTable thead>tr>th.sorting, table.dataTable thead>tr>td.sorting_asc, table.dataTable thead>tr>td.sorting_desc, table.dataTable thead>tr>td.sorting{
		
		font-size: 12px;
		font-size: bold;
		text-align: center;
		width: 200px;
	}

</style>

<div class="col-md-12">
    <div class="card card-box">
        <div class="card-head">
            <header>Qualification / Program Title <small>List</small></header>
            <div class="tools">
                <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
            </div>
        </div>
        <div class="card-body ">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-6">
                    <div class="btn-group">
                        <a data-toggle="modal" onclick="clear_form('form_qualification_program_title')" href="#modal_qualification_program_title" title="Add Qualification / Program Title" class="btn btn-info">
                            Add New <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="table-scrollable">
                <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="tbl_qualification_program_title" style="width: 100%;">
                    <thead>
						<th>Qualification / Program Title</th>
						<th>School</th>
						<th class="text-center">Action</th>
					</thead>
		           <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal" id="modal_qualification_program_title" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
	    	<?= form_open(base_url('references/qualification_program_title/insert_qualification_program_title'), 'id=form_qualification_program_title'); ?>
	            <div class="modal-header text-center">
              		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-ticket modal-icon"></i>
	                <h4 class="modal-title">Qualification / Program Title</h4>
	                <small>Form</small>
	            </div>
	            <div class="modal-body">
                	<input type="hidden" name="qualification_program_title_id">
                    <div class="form-group">
                        <label for="">Qualification / Program Title <span class="text-danger">*</span></label>
	                	<input type="text" name="qualification_program_title" class="form-control input-sm" required>
	                </div>
                    <div class="form-group">
                        <label for="">School <span class="text-danger">*</span></label>
	                	<select name="school_id" class="form-control input-sm select2" required style="width: 100%;">
	                		<option></option>
	                	</select>
	                </div>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                <button class="btn btn-info" id="qualification_program_title_btnSave">Save</button>
	            </div>
	       	</form>
        </div>
    </div>
</div>

<script type="text/javascript">
	
	var tbl_qualification_program_title;
	var tbl_qualification_program_title_data;

	$(function(){

		$("[name=school_id]").select2({
			placeholder: "Search",
			allowClear: true,
			data: <?= $schools ?>
		});

		var qualification_program_title_form_options = {
			clearForm	: false,
			resetForm: false,
			beforeSubmit: function() {
				$("#qualification_program_title").attr("disabled", true);
				$("#qualification_program_title").html("<span class=\"fa fa-spinner fa-pulse\"></span>");
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
					$("#qualification_program_title").attr("disabled", false);
					$("#qualification_program_title").html("<span class=\"fa fa-check\"></span> Save");
					$(".close").click();
					tbl_qualification_program_title.ajax.reload();
				} else {
					$("#qualification_program_title").attr("disabled", false);
					$("#qualification_program_title").html("Save");
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
		$("#form_qualification_program_title").ajaxForm(qualification_program_title_form_options);

		tbl_qualification_program_title = $("#tbl_qualification_program_title").DataTable({
			order: [[0, 'asc'], [1, 'asc']],
			ajax: {
				url: "<?= base_url('references/qualification_program_title/get_qualification_program_titles') ?>",
				type: "POST",
				data: function() {
					return tbl_qualification_program_title_data;
				}
			}
		});

	});

</script>