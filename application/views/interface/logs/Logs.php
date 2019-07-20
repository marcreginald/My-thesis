<div class="col-md-12">
    <div class="borderBox light bordered card-box">
        <div class="borderBox-title tabbable-line">
            <div class="caption">
                <span class="caption-subject font-dark bold uppercase">Logs</span>
            </div>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="#tab_user_log" data-toggle="tab" class="active"> User Logs </a>
                </li>
                <li class="nav-item">
                    <a href="#tab_deleted_data" data-toggle="tab"> Deleted Data </a>
                </li>
            </ul>
        </div>
        <div class="borderBox-body">
            <div class="tab-content">
                <div class="tab-pane active" id="tab_user_log">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="tbl_user_log" style="width: 100%;">
                            <thead>
                                <th>User</th>
                                <th>Action</th>
                                <th>Date</th>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="tab_deleted_data">
                    <div class="row">
                        <!-- <div class="col-md-12 col-sm-12 col-12">
                            <div class="text-danger"><strong>Note:</strong> You can retrieve data</div>
                        </div> -->
                        <div class="col-md-3 col-sm-3 col-3">
                            <ul class="nav nav-tabs tabs-left">
                                <li class="nav-item">
                                    <a href="#tab_certificate" class="lnk_tab_show active show" id="lnk_tab_certificate" onclick="show_tab('tab_certificate')"  data-toggle="tab"> Certificate </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tab_user" class="lnk_tab_show" id="lnk_tab_user" onclick="show_tab('tab_user')" data-toggle="tab"> User </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tab_school" class="lnk_tab_show" id="lnk_tab_school" onclick="show_tab('tab_school')" data-toggle="tab"> School </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tab_qualification_program_title" class="lnk_tab_show" id="lnk_tab_qualification_program_title" onclick="show_tab('tab_qualification_program_title')" data-toggle="tab"> Qualification Program Titles </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tab_user_role" class="lnk_tab_show" id="lnk_tab_user_role" onclick="show_tab('tab_user_role')" data-toggle="tab"> User Role </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-9 col-sm-9 col-9">
                            <div class="tab-content">
                                <div class="tab-pane active show tab_pane_left" id="tab_certificate">
                                    <h4>Certificate</h4>
                                    <div class="table-scrollable">
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="tbl_certificate" style="width: 100%;">
                                            <thead>
                                                <th>Data</th>
                                                <th>Deleted By</th>
                                                <th>Date Deleted</th>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade tab_pane_left" id="tab_user">
                                    <h4>User</h4>
                                    <div class="table-scrollable">
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="tbl_user" style="width: 100%;">
                                            <thead>
                                                <th>Data</th>
                                                <th>Deleted By</th>
                                                <th>Date Deleted</th>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade tab_pane_left" id="tab_school">
                                    <h4>School</h4>
                                    <div class="table-scrollable">
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="tbl_school" style="width: 100%;">
                                            <thead>
                                                <th>Data</th>
                                                <th>Deleted By</th>
                                                <th>Date Deleted</th>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade tab_pane_left" id="tab_qualification_program_title">
                                    <h4>Qualification Program Titles</h4>
                                    <div class="table-scrollable">
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="tbl_qualification_program_title" style="width: 100%;">
                                            <thead>
                                                <th>Data</th>
                                                <th>Deleted By</th>
                                                <th>Date Deleted</th>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade tab_pane_left" id="tab_user_role">
                                    <h4>User Role</h4>
                                    <div class="table-scrollable">
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="tbl_user_role" style="width: 100%;">
                                            <thead>
                                                <th>Data</th>
                                                <th>Deleted By</th>
                                                <th>Date Deleted</th>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js" ></script>
<script src="<?= base_url() ?>assets/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js" ></script>

<script type="text/javascript">
    
    var tbl_user_log, 
        tbl_certificate, 
        tbl_user, 
        tbl_school, 
        tbl_qualification_program_title, 
        tbl_user_role;

    var tbl_user_log_data, 
        tbl_certificate_data, 
        tbl_user_data, 
        tbl_school_data, 
        tbl_qualification_program_title_data, 
        tbl_user_role_data;

    $(function(){

        tbl_user_log = $("#tbl_user_log").DataTable({
            order: [[2, 'desc']],
            ajax: {
                url: "<?= base_url('logs/get_user_logs') ?>",
                type: "POST",
                data: function() {
                    return tbl_user_log_data;
                }
            }
        });

        tbl_certificate = $("#tbl_certificate").DataTable({
            ajax: {
                url: "<?= base_url('logs/get_certificates') ?>",
                type: "POST",
                data: function() {
                    return tbl_certificate_data;
                }
            }
        });

        tbl_user = $("#tbl_user").DataTable({
            ajax: {
                url: "<?= base_url('logs/get_users') ?>",
                type: "POST",
                data: function() {
                    return tbl_user_data;
                }
            }
        });

        tbl_school = $("#tbl_school").DataTable({
            ajax: {
                url: "<?= base_url('logs/get_schools') ?>",
                type: "POST",
                data: function() {
                    return tbl_school_data;
                }
            }
        });

        tbl_qualification_program_title = $("#tbl_qualification_program_title").DataTable({
            ajax: {
                url: "<?= base_url('logs/get_qualification_program_titles') ?>",
                type: "POST",
                data: function() {
                    return tbl_qualification_program_title_data;
                }
            }
        });

        tbl_user_role = $("#tbl_user_role").DataTable({
            ajax: {
                url: "<?= base_url('logs/get_user_roles') ?>",
                type: "POST",
                data: function() {
                    return tbl_user_role_data;
                }
            }
        });

    });

    function show_tab(id){
        $(".tab_pane_left").each(function() {
            var tab_pane_left = $(this).attr('id');
            if (id == tab_pane_left) {
                $(this).addClass('active');
                $(this).addClass('show');
                if ($(this).hasClass('active')) {
                    $(this).removeClass('active');
                    $(this).removeClass('show');
                } else {
                    $(this).addClass('active');
                    $(this).addClass('show');
                }
            } else {
                $(this).removeClass('active');
                $(this).removeClass('show');
            }      
        });

        $(".lnk_tab_show").each(function() {
            var lnk_tab_show = $(this).attr('id');
            if ('lnk_'+id == lnk_tab_show) {
                $(this).addClass('active');
                $(this).addClass('show');
                if ($(this).hasClass('active')) {
                    $(this).removeClass('active');
                    $(this).removeClass('show');
                } else {
                    $(this).addClass('active');
                    $(this).addClass('show');
                }
            } else {
                $(this).removeClass('active');
                $(this).removeClass('show');
            }      
        });
    }

</script>