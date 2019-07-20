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
            <header>School <small>List</small></header>
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
                        <a data-toggle="modal" onclick="clear_form('form_school')" href="#modal_school" title="Add school" class="btn btn-info">
                            Add New <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="table-scrollable">
                <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="tbl_school" style="width: 100%;">
                    <thead>
          						<th>School</th>
                      <th>Contact No</th>
                      <th>Email Addrress</th>
                      <th>Address</th>
          						<th class="text-center">Action</th>
          					</thead>
					           <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal" id="modal_school" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
	    	<?= form_open(base_url('references/school/insert_school'), 'id=form_school'); ?>
	            <div class="modal-header text-center">
              		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-ticket modal-icon"></i>
	                <h4 class="modal-title">school</h4>
	                <small>Form</small>
	            </div>
	            <div class="modal-body">
                	<input type="hidden" name="school_id">
                  <div class="form-group">
                    <label for="">School Name <span class="text-danger">*</span></label>
	                	<input type="text" name="school" class="form-control input-sm" required>
	                </div>
                  <div class="form-group">
                    <label for="">Contact No</label>
                    <input type="text" name="contact_no" class="form-control input-sm">
                  </div>
                  <div class="form-group">
                    <label for="">Email Address</label>
                    <input type="email" name="email_address" class="form-control input-sm">
                  </div>
                  <div class="form-group">
                    <label for="">Address</label>
                    <textarea name="address" class="form-control" style="resize: vertical;"></textarea>
                  </div>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                <button class="btn btn-info" id="school_btnSave">Save</button>
	            </div>
	       	</form>
        </div>
    </div>
</div>

<script type="text/javascript">
	
	var tbl_school;
	var tbl_school_data;

	$(function(){

		var school_form_options = {
			clearForm	: false,
			resetForm: false,
			beforeSubmit: function() {
				$("#school_btnSave").attr("disabled", true);
				$("#school_btnSave").html("<span class=\"fa fa-spinner fa-pulse\"></span>");
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
					$("#school_btnSave").attr("disabled", false);
					$("#school_btnSave").html("<span class=\"fa fa-check\"></span> Save");
					$(".close").click();
					tbl_school.ajax.reload();
				} else {
					$("#school_btnSave").attr("disabled", false);
					$("#school_btnSave").html("Save");
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
		$("#form_school").ajaxForm(school_form_options);

		tbl_school = $("#tbl_school").DataTable({
            order: [[0, 'asc']],
			ajax: {
				url: "<?= base_url('references/school/get_schools') ?>",
				type: "POST",
				data: function() {
					return tbl_school_data;
				}
			}
		});

	});

</script>