<script src="<?php echo base_url();?>vendor/highcharts/code/highcharts.js"></script>
<script src="<?php echo base_url();?>vendor/highcharts/code/modules/data.js"></script>
<script src="<?php echo base_url();?>vendor/highcharts/code/modules/drilldown.js"></script>

<script type="text/javascript">
  var d = new Date();
  var dateYear = d.getFullYear();
</script>

<div class="col-md-12">
    <div class="card card-box">
        <div class="card-head">
            <header>Highest Percentage School</header>
            <div class="col-md-2">
                <input type="date" value="<?= Date('Y-m-d',strtotime(' -7300 days')); ?>" name="hpsFrom" id="hpsFrom" class="form-control">
            </div>To
            <div class="col-md-2">
                <input type="date" value="<?= Date('Y-m-d'); ?>" name="hpsTo" id="hpsTo" class="form-control">
            </div>
            <div class="col-md-2">
                <select name="schoolSelected" class="form-control" id="schoolSelected">
                    <?php 
                        $query = $this->db->query("SELECT * FROM schools WHERE soft_deleted=0 ORDER BY school");
                        $data = array();
                        $total = 0;
                        foreach ($query->result() as $row) {?>
                             <option value="<?= $row->school_id; ?>"><?= $row->school; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="col-md-2">
                <button class="btn btn-success btn-sm" onclick="viewNCperShool();">Go!</button>
            </div>
        </div>
        <div class="card-body ">
            <div class="row">
                <div class="col-sm-12">
                    <div id="viewNCperShool"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-box">
        <div class="card-head">
            <header>Scholars</header>
            <div class="col-md-2">
                <input type="date" value="<?= Date('Y-m-d',strtotime(' -7300 days')); ?>" name="schFrom" id="schFrom" class="form-control">
            </div>To
            <div class="col-md-2">
                <input type="date" value="<?= Date('Y-m-d'); ?>" name="schTo" id="schTo" class="form-control">
            </div>
            <div class="col-md-2">
                <button class="btn btn-success btn-sm" onclick="viewScholars();">Go!</button>
            </div>
        </div>
        <div class="card-body ">
            <div class="row">
                <div class="col-sm-12">
                    <div id="viewScholars"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-box">
        <div class="card-head">
            <header>National Certificates</header>
            <div class="col-md-2">
                <input type="date" value="<?= Date('Y-m-d',strtotime(' -7300 days')); ?>" name="ncFrom" id="ncFrom" class="form-control">
            </div>To
            <div class="col-md-2">
                <input type="date" value="<?= Date('Y-m-d'); ?>" name="ncTo" id="ncTo" class="form-control">
            </div>
            <div class="col-md-2">
                <button class="btn btn-success btn-sm" onclick="viewNCertificates();">Go!</button>
            </div>
        </div>
        <div class="card-body ">
            <div class="row">
                <div class="col-sm-12">
                    <div id="viewNCertificates"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-box">
        <div class="card-head">
            <header>NC per School Status</header>
            <div class="col-md-2">
                <input type="date" value="<?= Date('Y-m-d',strtotime(' -7300 days')); ?>" name="ncStateFrom" id="ncStateFrom" class="form-control">
            </div>To
            <div class="col-md-2">
                <input type="date" value="<?= Date('Y-m-d'); ?>" name="ncStateTo" id="ncStateTo" class="form-control">
            </div>
            <div class="col-md-2">
                <button class="btn btn-success btn-sm" onclick="viewncpershoolstatus();">Go!</button>
            </div>
        </div>
        <div class="card-body ">
            <div class="row">
                <div class="col-sm-12">
                    <div id="viewncpershoolstatus"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    viewNCperShool();
    viewScholars();
    viewNCertificates();
    viewncpershoolstatus();

    function viewNCperShool(){
        var hpsTo = new Date($('#hpsTo').val());
        var hpsFrom = new Date($('#hpsFrom').val());
        var arr = new Array();
        hpsTo = hpsTo.getFullYear();
        hpsFrom = hpsFrom.getFullYear();
        $.ajax({
            url: "<?= base_url('reports/viewNCperShoolDD') ?>",
            method: "GET",
            dataType: "json",
            data: {from:hpsFrom,to:hpsTo,schlId:$("#schoolSelected").val()},
            success: function(response) {
                arr=response;
            }
        });
        setTimeout(function(){
            $.ajax({
                url: "<?= base_url('reports/viewNCperShool') ?>",
                method: "GET",
                dataType: "json",
                data: {from:hpsFrom,to:hpsTo,schlId:$("#schoolSelected").val()},
                success: function(response) {
                    var ctx = document.getElementById("viewNCperShool");
                    if (ctx && response!=0) {
                        ctx.height = 200;
                        var myChart = new Highcharts.chart(ctx, {
                            
                            title: {
                                text: 'Highest Percentage School as of '+hpsFrom+' to '+hpsTo
                            },
                            // subtitle: {
                            //     text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
                            // },
                            xAxis: {
                                type: 'category'
                            },
                            yAxis: {
                                title: {
                                    text: 'Total Highest Percentage School'
                                }

                            },
                            legend: {
                                enabled: true
                            },
                            plotOptions: {
                                column: {
                                    borderWidth: 0,
                                    dataLabels: {
                                        enabled: true,
                                        format: '{point.b:.0f}%'
                                    }
                                },
                                spline: {
                                    borderWidth: 0,
                                    dataLabels: {
                                        //enabled: true,
                                        //format: 'b'
                                    }
                                }
                            },

                            tooltip: {
                                headerFormat: '',
                                pointFormat: '<span>{point.name}</span>: <b>{point.g:.0f}</b><br/>'+
                                             '<span>Percent</span>: <b>{point.b:.0f}%</b>'
                            },

                        //     data: {
                        //   labels: records_month,
                        //   datasets: [
                        //     {
                        //       label: "Normal",
                        //       data: normal,

                        //     }
                        //   ]
                        // },
                            "series": [
                                {   
                                    type: 'line',
                                    lineWidth: 5,
                                    "name": "Highest Percentage School",
                                    //"colorByPoint": true,
                                    "data": response["column"],
                                },{   
                                    type: 'line',
                                    "name": "Trendline",
                                    //"colorByPoint": true,
                                    "color": "red",
                                    "data": response["line"],
                                }
                            ],

                            "drilldown": {
                                    "series": arr
                                }
                        });
                    }else{
                        alert("No Records Found");
                    }
                }
            });
        },300);
    }

    function viewScholars(){
        var schTo = new Date($('#schTo').val());
        var schFrom = new Date($('#schFrom').val());
        var arr = new Array();
        schTo = schTo.getFullYear();
        schFrom = schFrom.getFullYear();
        $.ajax({
            url: "<?= base_url('reports/viewScholarsDD') ?>",
            method: "GET",
            dataType: "json",
            data: {from:schFrom,to:schTo},
            success: function(response) {
                arr=response;
            }
        });
        setTimeout(function(){
            $.ajax({
                url: "<?= base_url('reports/viewScholars') ?>",
                method: "GET",
                dataType: "json",
                data: {from:schFrom,to:schTo},
                success: function(response) {
                    var ctx = document.getElementById("viewScholars");
                    if (ctx && response!=0) {
                        ctx.height = 200;
                        var myChart = new Highcharts.chart(ctx, {
                            
                            title: {
                                text: 'Scholars as of '+schFrom+' to '+schTo
                            },
                            // subtitle: {
                            //     text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
                            // },
                            xAxis: {
                                type: 'category'
                            },
                            yAxis: {
                                title: {
                                    text: 'Total Percentage Scholars'
                                }

                            },
                            legend: {
                                enabled: true
                            },
                            plotOptions: {
                                column: {
                                    borderWidth: 0,
                                    dataLabels: {
                                        enabled: true,
                                        format: '{point.b:.0f}%'
                                    }
                                },
                                spline: {
                                    borderWidth: 0,
                                    dataLabels: {
                                        //enabled: true,
                                        //format: 'b'
                                    }
                                }
                            },

                            tooltip: {
                                headerFormat: '',
                                pointFormat: '<span>{point.name}</span>: <b>{point.g:.0f}</b><br/>'+
                                             '<span>Percent</span>: <b>{point.b:.0f}%</b>'
                            },

                        //     data: {
                        //   labels: records_month,
                        //   datasets: [
                        //     {
                        //       label: "Normal",
                        //       data: normal,

                        //     }
                        //   ]
                        // },
                            "series": [
                                {   
                                    type: 'column',
                                    "name": "Scholars",
                                    "colorByPoint": true,
                                    "data": response,
                                }
                            ],

                            "drilldown": {
                                    "series": arr
                                }
                        });
                    }else{
                        alert("No Records Found");
                    }
                }
            });
        },300);
    }

    function viewNCertificates(){
        var ncTo = new Date($('#ncTo').val());
        var ncFrom = new Date($('#ncFrom').val());
        var arr = new Array();
        ncTo = ncTo.getFullYear();
        ncFrom = ncFrom.getFullYear();
        $.ajax({
            url: "<?= base_url('reports/viewNCertificatesDD') ?>",
            method: "GET",
            dataType: "json",
            data: {from:ncFrom,to:ncTo},
            success: function(response) {
                arr=response;
            }
        });
        setTimeout(function(){
            $.ajax({
                url: "<?= base_url('reports/viewNCertificates') ?>",
                method: "GET",
                dataType: "json",
                data: {from:ncFrom,to:ncTo},
                success: function(response) {
                    var ctx = document.getElementById("viewNCertificates");
                    if (ctx && response!=0) {
                        ctx.height = 200;
                        var myChart = new Highcharts.chart(ctx, {
                            
                            title: {
                                text: 'NC Passers as of '+ncFrom+' to '+ncTo
                            },
                            // subtitle: {
                            //     text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
                            // },
                            xAxis: {
                                type: 'category'
                            },
                            yAxis: {
                                title: {
                                    text: 'Total Percentage of NC'
                                }

                            },
                            legend: {
                                enabled: true
                            },
                            plotOptions: {
                                column: {
                                    borderWidth: 0,
                                    dataLabels: {
                                        enabled: true,
                                        format: '{point.b:.0f}%'
                                    }
                                },
                                spline: {
                                    borderWidth: 0,
                                    dataLabels: {
                                        //enabled: true,
                                        //format: 'b'
                                    }
                                }
                            },

                            tooltip: {
                                headerFormat: '',
                                pointFormat: '<span>{point.name}</span>: <b>{point.g:.0f}</b><br/>'+
                                             '<span>Percent</span>: <b>{point.b:.0f}%</b>'
                            },

                        //     data: {
                        //   labels: records_month,
                        //   datasets: [
                        //     {
                        //       label: "Normal",
                        //       data: normal,

                        //     }
                        //   ]
                        // },
                            "series": [
                                {   
                                    type: 'bar',
                                    "name": "National Certificates",
                                    "colorByPoint": true,
                                    "data": response,
                                }
                            ],

                            "drilldown": {
                                    "series": arr
                                }
                        });
                    }else{
                        alert("No Records Found");
                    }
                }
            });
        },300);
    }

    function viewncpershoolstatus(){
        var ncStateTo = new Date($('#ncStateTo').val());
        var ncStateFrom = new Date($('#ncStateFrom').val());
        var arr = new Array();
        ncStateTo = ncStateTo.getFullYear();
        ncStateFrom = ncStateFrom.getFullYear();
        $.ajax({
            url: "<?= base_url('reports/viewncpershoolstatusDD') ?>",
            method: "GET",
            dataType: "json",
            data: {from:ncStateFrom,to:ncStateTo},
            success: function(response) {
                arr=response;
            }
        });
        setTimeout(function(){
            $.ajax({
                url: "<?= base_url('reports/viewncpershoolstatus') ?>",
                method: "GET",
                dataType: "json",
                data: {from:ncStateFrom,to:ncStateTo},
                success: function(response) {
                    var ctx = document.getElementById("viewncpershoolstatus");
                    if (ctx && response!=0) {
                        ctx.height = 200;
                        var myChart = new Highcharts.chart(ctx, {
                            
                            title: {
                                text: 'NC Passers Status as of '+ncStateFrom+' to '+ncStateTo
                            },
                            // subtitle: {
                            //     text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
                            // },
                            xAxis: {
                                type: 'category'
                            },
                            yAxis: {
                                title: {
                                    text: 'Total Percentage of NC status'
                                }

                            },
                            legend: {
                                enabled: true
                            },
                            plotOptions: {
                                column: {
                                    borderWidth: 0,
                                    dataLabels: {
                                        enabled: true,
                                        format: '{point.b:.0f}%'
                                    }
                                },
                                spline: {
                                    borderWidth: 0,
                                    dataLabels: {
                                        //enabled: true,
                                        //format: 'b'
                                    }
                                }
                            },

                            tooltip: {
                                headerFormat: '',
                                pointFormat: '<span>{point.name}</span>: <b>{point.g:.0f}</b><br/>'+
                                             '<span>Percent</span>: <b>{point.b:.0f}%</b>'
                            },

                        //     data: {
                        //   labels: records_month,
                        //   datasets: [
                        //     {
                        //       label: "Normal",
                        //       data: normal,

                        //     }
                        //   ]
                        // },
                            "series": [
                                {   
                                    type: 'pie',
                                    "name": "National Certificates",
                                    "colorByPoint": true,
                                    "data": response,
                                }
                            ],

                            "drilldown": {
                                    "series": arr
                                }
                        });
                    }else{
                        alert("No Records Found");
                    }
                }
            });
        },300);
    }

    
    
</script>
