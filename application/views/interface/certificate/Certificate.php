<style>
    table.table-bordered.dataTable tbody th, table.table-bordered.dataTable tbody td{
        font-size: 12px;
        font-style: italic;
        text-align: center;
    }
    table.dataTable thead>tr>th.sorting_asc, table.dataTable thead>tr>th.sorting_desc, table.dataTable thead>tr>th.sorting, table.dataTable thead>tr>td.sorting_asc, table.dataTable thead>tr>td.sorting_desc, table.dataTable thead>tr>td.sorting{
        
        font-size: 12px;
        font-size: bold;
        width: 200px;
    }

</style>

<div class="col-md-12">
    <div class="card card-box">
        <div class="card-head">
            <header>Certificate <small>List</small></header>

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
                        <a data-toggle="modal" href="#modal_certificate" onclick="clear_form('form_certificate')" id="btn_add_certificate" title="Add Certificate" class="btn btn-primary" style="margin-right: 5px;">
                                Add New <i class="fa fa-plus"></i>
                            </a> 

                        <a data-toggle="modal" href="#modal_certificate_upload" onclick="clear_form('form_certificate_upload')" id="btn_add_certificate_upload" title="Add Certificate Upload" class="btn btn-primary" style="margin-right: 5px;">
                                Upload Certificates <i class="fa fa-upload"></i>
                            </a> 

                        <a href="<?=base_url('assets/attachments/certificate_format.xlsx');?>" title="Downloadable Certificate Excel Template" class="btn btn-default" style="margin-right: 5px;" download>
                                Downloadable Certificate Excel Template <i class="fa fa-download"></i>
                            </a> 

                        <a href="javascript:;" onclick="$('#form_filter').slideToggle()" title="Form Filter" class="btn btn-info">
                            Advanced Filter <i class="fa fa-filter"></i>
                        </a>  
                    </div>
                </div>
            </div>

            <form id="form_filter" style="display: none;">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="">Qualification / Program Title</label>
                                    <select name="f_qualification_program_title_id" class="form-control select2 filter" style="width: 100%;">
                                        <option></option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select name="f_status" class="form-control select2 filter" style="width: 100%;">
                                        <option value="">Select</option>
                                        <option value="Active">Active</option>
                                        <option value="Expired in 3 months">Expired in 3 months</option>
                                        <option value="Expired in 2 months">Expired in 2 months</option>
                                        <option value="Expired in 1 month">Expired in 1 month</option>
                                        <option value="Expired">Expired</option>
                                    </select>
                                </div>
                            </div>
                            <?php if ($this->session->login_school_id == 1): ?>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="">School</label>
                                        <select name="f_school_id" class="form-control select2 filter" style="width: 100%;">
                                            <option></option>
                                        </select>
                                    </div>
                                </div>                                
                            <?php endif ?>
                        </div>
                    </div>
                </div>                
            </form>

            <div class="table-scrollable">
                <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="tbl_certificate" style="width: 100%;">
                    <thead>
                        <th>Student Name</th>
                        <th>Qualification / Program Title</th>

                        <?php if ($this->session->login_school_id == 1): ?>
                            <th>School</th>
                        <?php endif ?>

                        <th>Date Received</th>
                        <th>Expired From</th>
                        <th>Expired Until</th>
                        <th>Status</th>
                        <?php if ($this->session->login_school_id == 1): ?>
                            <th class="text-center">Action</th>
                        <?php endif ?>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modal_certificate" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <?= form_open(base_url('certificate/insert_certificate'), 'id=form_certificate'); ?>
                <div class="modal-header">
                    <h4 class="modal-title">Certificate <small>Form</small></h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="certificate_id">
                    <div class="form-group">
                        <label for="">Student Name <span class="text-danger">*</span></label>
                        <select name="student_id" class="form-control input-sm select2" required style="width: 100%;">
                            <option></option>
                        </select>
                    </div> 
                    <div class="form-group">
                        <label for="">Qualification / Program Title <span class="text-danger">*</span></label>
                        <select name="qualification_program_title_id" class="form-control select2" required style="width: 100%;">
                            <option></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Date Received <span class="text-danger">*</span></label>
                        <input type="date" name="date_received" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="">Date from <span class="text-danger">*</span></label>
                        <input type="date" name="date_from" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="">Date until <span class="text-danger">*</span></label>
                        <input type="date" name="date_to" class="form-control input-sm" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="close" data-dismiss="modal">Close</button>
                    <button class="btn btn-info" id="certificate_btnSave">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    
    var tbl_certificate;
    var tbl_certificate_data;

    $(function(){

        $("[name=student_id]").select2({
            placeholder: "Search",
            allowClear: true,
            templateResult: select_format,
            // dropdownAutoWidth: true,
            data: <?= $students ?>
        });
        
        $("[name=qualification_program_title_id]").select2({
            placeholder: "Search",
            allowClear: true,
            data: <?= $qualification_program_titles ?>
        });

        $("[name=f_qualification_program_title_id]").select2({
            placeholder: "Search",
            allowClear: true,
            data: <?= $qualification_program_titles ?>
        });

        $("[name=f_school_id]").select2({
            placeholder: "Search",
            allowClear: true,
            data: <?= $schools ?>
        });

        var certificate_form_options = {
            clearForm   : false,
            resetForm: false,
            beforeSubmit: function() {
                $("#certificate_btnSave").attr("disabled", true);
                $("#certificate_btnSave").html("<span class=\"fa fa-spinner fa-pulse\"></span>");
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
                    $("#certificate_btnSave").attr("disabled", false);
                    $("#certificate_btnSave").html("<span class=\"fa fa-check\"></span> Save");
                    window.location.reload();
                } else {
                    $("#certificate_btnSave").attr("disabled", false);
                    $("#certificate_btnSave").html("Save");
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
        $("#form_certificate").ajaxForm(certificate_form_options);

        $(".filter").on("change keyup", function() {
            tbl_certificate_data = $("#form_filter").serializeArray();
            tbl_certificate.ajax.reload();
        });

        tbl_certificate = $("#tbl_certificate").DataTable({
            order: [[5, 'desc'], [6, 'desc']],
            ajax: {
                url: "<?= base_url('certificate/get_certificates') ?>",
                type: "POST",
                data: function() {
                    return tbl_certificate_data;
                }
            }
        });

    });


    function get_certificate_info(value){
        clear_form("form_certificate");
        $.post('<?= base_url('certificate/get_certificate_info') ?>', 
            { value }, 
            function(data){
                var d = JSON.parse(data);
                $.each(d, function(k,v){
                    $("#form_certificate").each(function() {
                        $("[name="+k+"]").val(v);
                        $(".select2").trigger("change");
                    });
                });
            }
        );
    }

    function select_format(state) {
        if (!state.id) { return state.text; }
        var $state = $(
            "<table style='width: 100%; font-size: 12px;'>\
                <tr>\
                    <td style='width: 40%; padding: 10px; vertical-align: text-top;'>"+state.text+"</td>\
                    <td style='width: 60%; padding: 10px; vertical-align: text-top;'>"+state.col1+"</td>\
                </tr>\
            </table>"
        );
        return $state;
    }

</script>

<div class="modal inmodal" id="modal_certificate_upload" role="dialog" aria-hidden="true">
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
                        <?= form_open_multipart(base_url("certificate/upload_certificate"), "id='form_certificate_upload'"); ?>
                            <input type="hidden" name="alert">
                            <div class="row">
                                <div class="col-md-6">
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
                                    <button type="submit" class="btn btn-primary" id="upload_certificate_btnSave">Submit</button>
                                    <br><br>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-sm-12">
                        <?= form_open(base_url('certificate/insert_certificate_multiple'), 'id=form_certificate_multiple'); ?>
                            <input type="hidden" name="im_school_id">
                            <div class="row" id="div_certificate_multiple_info">
                                <div class="col-sm-12">
                                    <div id="div_certificate_multiple_info_msg" class="text-danger"></div>
                                    <div id="div_certificate_multiple_info_count" class="text-danger"></div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped" id="tbl_certificate_multiple_info">
                                            <thead>
                                                <tr>
                                                    <th>Firstname</th>
                                                    <th>Middlename</th>
                                                    <th>Lastname</th>
                                                    <th>Name Extension</th>
                                                    <th>Qualification Program Title</th>
                                                    <th>Date Received</th>
                                                    <th>Expired From</th>
                                                    <th>Expired Until</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>

                                            <tbody></tbody>

                                            <tfoot style="display: none;">
                                                <tr>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-primary btn-sm" id="certificate_multiple_btnSave" >Submit</button>
                                                    </td>
                                                    <td colspan="8"></td>
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
    
    $(function(){
        $("#form_certificate_upload [name=file]").on("change", function(){
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
                $("#upload_certificate_btnSave").attr("disabled", true);
                $("#upload_certificate_btnSave").html("<span class=\"fa fa-spinner fa-pulse\"></span>");
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

                    $("#div_certificate_multiple_info").slideDown();
                    $("#upload_certificate_btnSave").attr("disabled", false);
                    $("#upload_certificate_btnSave").html("<span class=\"fa fa-check\"></span> Uploaded");
                    $("#tbl_certificate_multiple_info tbody").empty();
                    $("#div_certificate_multiple_info_msg").html(d.msg);
                    $("#div_certificate_multiple_info_count").html('Data count: '+d.count);
                    $("#tbl_certificate_multiple_info tfoot").show();

                    $.each(d.data_excel, function(k, v) {
                        $("#tbl_certificate_multiple_info tbody").append('<tr>\
                                                                        <input type="hidden" name="student_id[]" value="'+( v.student_id != null ? v.student_id:"" )+'">\
                                                                        <input type="hidden" name="qualification_program_title_id[]" value="'+( v.qualification_program_title_id != null ? v.qualification_program_title_id:"" )+'">\
                                                                        <input type="hidden" name="checked[]" value="'+( v.checked != null ? v.checked:1 )+'">\
                                                                        <input type="hidden" name="date_received[]" value="'+( v.date_received != null ? v.date_received:"" )+'">\
                                                                        <input type="hidden" name="expired_from[]" value="'+( v.expired_from != null ? v.expired_from:"" )+'">\
                                                                        <input type="hidden" name="expired_until[]" value="'+( v.expired_until != null ? v.expired_until:"" )+'">\
                                                                        <td class="'+(v.student_id == 0 ? "text-danger" : "")+'">'+v.firstname+'</td>\
                                                                        <td class="'+(v.student_id == 0 ? "text-danger" : "")+'">'+v.middlename+'</td>\
                                                                        <td class="'+(v.student_id == 0 ? "text-danger" : "")+'">'+v.lastname+'</td>\
                                                                        <td class="'+(v.student_id == 0 ? "text-danger" : "")+'">'+v.name_ext+'</td>\
                                                                        <td class="'+(v.qualification_program_title_id == 0 ? "text-danger" : "")+'">'+v.qualification_program_title+'</td>\
                                                                        <td>'+v.date_received+'</td>\
                                                                        <td>'+v.expired_from+'</td>\
                                                                        <td>'+v.expired_until+'</td>\
                                                                        <td>\
                                                                            '+(v.checked == 0 ? "" : "Certificate: Exist")+'<br>\
                                                                            '+(v.student_id == 0 ? "Student Not Existed in the school or in the system" : "")+'<br>\
                                                                            '+(v.qualification_program_title_id == 0 ? "Qualification Program Title Not Exist in the school or system" : "")+'\
                                                                        </td>\
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
                    $("#upload_certificate_btnSave").attr("disabled", false);
                    $("#upload_certificate_btnSave").html("Submit");
                }
            }
        };
        $("#form_certificate_upload").ajaxForm(upload_student_multiple_form_options);      

        $("#certificate_multiple_btnSave").on("click", function(){
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
                    $("#certificate_multiple_btnSave").attr("disabled", false);
                    $("#certificate_multiple_btnSave").html("<span class=\"fa fa-check\"></span> Save");
                    $("#form_certificate_multiple").submit();
                } else {
                    swal("Cancelled", "Your data are not save :)", "error");
                    $("#certificate_multiple_btnSave").attr("disabled", false);
                    $("#certificate_multiple_btnSave").html("Save");
                }
            });
        });

        var certificate_multiple_form_options = {
            clearForm   : false,
            resetForm: false,
            beforeSubmit: function() {
                $("#certificate_multiple_btnSave").attr("disabled", true);
                $("#certificate_multiple_btnSave").html("<span class=\"fa fa-spinner fa-pulse\"></span>");
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
                    $("#certificate_multiple_btnSave").attr("disabled", false);
                    $("#certificate_multiple_btnSave").html("<span class=\"fa fa-check\"></span> Submitted");
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
                    $("#certificate_multiple_btnSave").attr("disabled", false);
                    $("#certificate_multiple_btnSave").html("Submit");
                }
            }
        };
        $("#form_certificate_multiple").ajaxForm(certificate_multiple_form_options);  
    });

</script>