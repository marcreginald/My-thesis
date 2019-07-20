<style>
    table.table-bordered.dataTable tbody th, table.table-bordered.dataTable tbody td{
        font-size: 12px;
        font-style: italic;
        text-align: center;
    }
    table.dataTable thead>tr>th.sorting_asc, table.dataTable thead>tr>th.sorting_desc, table.dataTable thead>tr>th.sorting, table.dataTable thead>tr>td.sorting_asc, table.dataTable thead>tr>td.sorting_desc, table.dataTable thead>tr>td.sorting{
        
        font-size: 12px;
        font-size: bold;
        width: 100%;
    }

</style>

<div class="col-md-12">
    <div class="card card-box">
        <div class="card-head">
            <header>User <small>List</small></header>
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
                        <a data-toggle="modal" onclick="clear_form('form_user')" href="#modal_user" title="Add User" class="btn btn-info">
                            Add New <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
                <!-- <div class="col-md-6 col-sm-6 col-6">
                    <div class="btn-group pull-right">
                        <a class="btn deepPink-bgcolor  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-print"></i> Print </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                            </li>
                        </ul>
                    </div>
                </div> -->
            </div>
            <div class="table-scrollable">
                <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="tbl_user" style="width: 100%;">
                  <thead>
                    <tr>
                      <th>Username</th>
                      <th>Fullname</th>
                      <th>Gender</th>
                      <th>Address</th>
                      <th>Email Address</th>
                      <th>Mobile Number</th>
                      <th>User Role</th>

                      <?php if ($this->session->login_school_id == 1): ?>
                        <th>School</th>
                      <?php endif ?>
                      
                      <th>Status</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table> 
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal" id="modal_user" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content animated bounceInRight">
        <?= form_open(base_url('user/insert_user'), 'id=form_user'); ?>
          <div class="modal-header text-center">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <i class="fa fa-user modal-icon"></i>
              <h4 class="modal-title">User</h4><small>Form</small>
          </div>
          <div class="modal-body">
              <input type="hidden" name="user_id">
              <div class="form-group">
                <label for="">Username <span class="text-danger">*</span></label>
                <input type="text" name="username" class="form-control input-sm" required>
              </div>
              <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control input-sm">
              </div>
              <div class="form-group">
                <label for="">Firstname <span class="text-danger">*</span></label>
                <input type="text" name="firstname" class="form-control input-sm" required>
              </div>
              <div class="form-group">
                <label for="">Middename</label>
                <input type="text" name="middlename" class="form-control input-sm">
              </div>
              <div class="form-group">
                <label for="">Lastname <span class="text-danger">*</span></label>
                <input type="text" name="lastname" class="form-control input-sm" required>
              </div>
              <div class="form-group">
                <label for="">Name Extension</label>
                <input type="text" name="name_ext" class="form-control input-sm">
              </div>
              <div class="form-group">
                <label for="">Gender <span class="text-danger">*</span></label>
                <select name="gender" class="form-control input-sm select2" required style="width: 100%;">
                  <option value="">Select</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Address</label>
                <textarea name="address" class="form-control input-sm" style="resize: vertical;"></textarea>
              </div>
              <div class="form-group">
                <label for="">Email Address</label>
                <input type="email" name="email_address" class="form-control input-sm">
              </div>
              <div class="form-group">
                <label for="">Mobile Number</label>
                <input type="number" name="mobile_number" class="form-control input-sm" min="0" step="any">
              </div>

              <?php if ($this->session->login_school_id == 1): ?>
                <div class="form-group">
                  <label for="">School <span class="text-danger">*</span></label>
                  <select name="school_id" class="form-control input-sm select2" required style="width: 100%;">
                    <option></option>
                  </select>
                </div>
              <?php endif ?>

              <div class="form-group">
                <label for="">User Role <span class="text-danger">*</span></label>
                <select name="user_role_id" class="form-control input-sm select2" required style="width: 100%;">
                  <option></option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Status <span class="text-danger">*</span></label>
                <select name="status" class="form-control input-sm select2" required style="width: 100%;">
                  <option value="1">Active</option>
                  <option value="0">Not Active</option>
                </select>
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button class="btn btn-info" id="user_btnSave">Save</button>
          </div>
        </form>
      </div>
  </div>
</div>

<script>

  var tbl_user;
  var tbl_user_data;

  $(function(){

    $("[name=user_role_id]").select2({
        placeholder: "Search",
        allowClear: true,
        data: <?= $user_roles ?>
    });

    $("[name=school_id]").select2({
        placeholder: "Search",
        allowClear: true,
        data: <?= $schools ?>
    });

    var user_form_options = {
        clearForm: false,
        resetForm: false,
        beforeSubmit: function() {
            $("#user_btnSave").attr("disabled", true);
            $("#user_btnSave").html("<span class=\"fa fa-spinner fa-pulse\"></span>");
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
                $("#user_btnSave").attr("disabled", false);
                $("#user_btnSave").html("<span class=\"fa fa-check\"></span> Save");
                $(".close").click();
                tbl_user.ajax.reload();
            } else {
                $("#user_btnSave").attr("disabled", false);
                $("#user_btnSave").html("Save");
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
    $("#form_user").ajaxForm(user_form_options);

    tbl_user = $("#tbl_user").DataTable({
        order: [[0, 'asc'], [1, 'asc'], [8, 'asc']],
        ajax: {
            url: "<?= base_url('user/get_users') ?>",
            type: "POST",
            data: function() {
              return tbl_user_data;
            }
        }
    });

  });

</script>