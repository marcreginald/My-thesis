<?php if ($this->session->login_school_id != 1): ?>
  <?php redirect(base_url('dashboard')) ?>
<?php endif ?>
<div class="col-md-12">
    <div class="card card-box">
        <div class="card-head">
            <header>User Role <small>List</small></header>
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
                        <a data-toggle="modal" onclick="clear_form('form_user_role')" href="#modal_user_role" title="Add User Role" class="btn btn-info">
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
                <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="tbl_user_role" style="width: 100%;">
                    <thead>
                        <th>User Role</th>
                        <th class="text-center">Action</th>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="modal inmodal" id="modal_user_role" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <?= form_open(base_url('references/user_role/insert_user_role'), 'id=form_user_role'); ?>
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-tasks modal-icon"></i>
                    <h4 class="modal-title">User Role</h4>
                    <small>Form</small>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">User Role <span class="text-danger">*</span></label>
                        <input type="hidden" name="user_role_id">
                        <input type="text" name="user_role" class="form-control input-sm" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button class="btn btn-info" id="user_role_btnSave">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    
    var tbl_user_role;
    var tbl_user_role_data;

    $(function(){

        var user_role_form_options = {
            clearForm   : false,
            resetForm: false,
            beforeSubmit: function() {
                $("#user_role_btnSave").attr("disabled", true);
                $("#user_role_btnSave").html("<span class=\"fa fa-spinner fa-pulse\"></span>");
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
                    $("#user_role_btnSave").attr("disabled", false);
                    $("#user_role_btnSave").html("<span class=\"fa fa-check\"></span> Save");
                    $(".close").click();
                    tbl_user_role.ajax.reload();
                } else {
                    $("#user_role_btnSave").attr("disabled", false);
                    $("#user_role_btnSave").html("Save");
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
        $("#form_user_role").ajaxForm(user_role_form_options);

        tbl_user_role = $("#tbl_user_role").DataTable({
            order: [[0, 'asc']],
            ajax: {
                url: "<?= base_url('references/user_role/get_user_roles') ?>",
                type: "POST",
                data: function() {
                    return tbl_user_role_data;
                }
            }
        });

    });

</script>