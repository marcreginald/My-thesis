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
            <header>Evaluation Report</header>
            <div class="col-md-7">
                <select name="ncselected" class="form-control" id="ncselected">
                    <?php 
                        $query = $this->db->query("SELECT DISTINCT(qualification_program_title) aa FROM qualification_program_titles ORDER BY qualification_program_title");
                        $data = array();
                        $total = 0;
                        foreach ($query->result() as $row) {?>
                             <option value="<?= $row->aa; ?>"><?= $row->aa; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="col-md-2">
                <button class="btn btn-success btn-sm" onclick="evaluationReport();">Go!</button>
            </div>
        </div>
        <div class="card-body ">
            <div class="row">
                <div class="col-sm-12">
                    <div id="evaluationReport"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-box">
        <div class="card-head">
            <header>Recommendation</header>
            <div class="col-md-7">
                <select name="schlselected" class="form-control" id="schlselected">
                    <?php 
                        $query = $this->db->query("SELECT * FROM schools ORDER BY school");
                        $data = array();
                        $total = 0;
                        foreach ($query->result() as $row) {?>
                             <option value="<?= $row->school_id; ?>"><?= $row->school; ?></option>
                    <?php } ?>
                </select>
            </div>


            <div class="col-md-2">
                <button class="btn btn-success btn-sm" onclick="recommendReport();">Go!</button>
            </div>
        </div>


        <div class="card-body ">
            <div class="row">
                <div class="col-sm-12">
                    <div id="recommendReport"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    evaluationReport();
    recommendReport();

    function evaluationReport(){
        var nc = $('#ncselected').val();
        var arr = new Array();
        $.ajax({
            url: "<?= base_url('evaluation/evaluationReportDD') ?>",
            method: "GET",
            dataType: "json",
            data: {nc:nc},
            success: function(response) {
                arr=response;
            }
        });
        setTimeout(function(){
            $.ajax({
                url: "<?= base_url('evaluation/evaluationReport') ?>",
                method: "GET",
                dataType: "json",
                data: {nc:nc},
                success: function(response) {
                    var ctx = document.getElementById("evaluationReport");
                    if (ctx && response!=0) {
                        ctx.height = 200;
                        var myChart = new Highcharts.chart(ctx, {
                            
                            title: {
                                text: 'Evaluation Report'// as of '+ncpaFrom+' to '+evaluationReport
                            },
                            // subtitle: {
                            //     text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
                            // },
                            xAxis: {
                                type: 'category'
                            },
                            yAxis: {
                                title: {
                                    text: 'Total Evaluation Report'
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
                                             '<span>Percent</span>: <b>{point.b:.0f}%</b><br/>'+
                                             '<span>Year Range</span>: <b>{point.yd}</b>'
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
                                    lineWidth: 5,
                                    "name": "Evaluation Report",
                                    "colorByPoint": true,
                                    "data": response["column"],
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

    function recommendReport(){
        var schl = $('#schlselected').val();
        var arr = new Array();
        $.ajax({
            url: "<?= base_url('evaluation/recommendReportDD') ?>",
            method: "GET",
            dataType: "json",
            data: {schl:schl},
            success: function(response) {
                arr=response;
            }
        });
        setTimeout(function(){
            $.ajax({
                url: "<?= base_url('evaluation/recommendReport') ?>",
                method: "GET",
                dataType: "json",
                data: {schl:schl},
                success: function(response) {
                    var ctx = document.getElementById("recommendReport");
                    if (ctx && response!=0) {
                        ctx.height = 200;
                        var myChart = new Highcharts.chart(ctx, {
                            
                            title: {
                                text: 'Recommendation Report'// as of '+ncpaFrom+' to '+recommendReport
                            },
                            // subtitle: {
                            //     text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
                            // },
                            xAxis: {
                                type: 'category'
                            },
                            yAxis: {
                                title: {
                                    text: 'Total Recommendation Report'
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
                                             '<span>Percent</span>: <b>{point.b:.0f}%</b><br/>'+
                                             '<span>Year Range</span>: <b>{point.yRA}</b><br/>'+
                                             '<span>Examinee</span>: <b>{point.TE}</b><br/>'+
                                             '<span>Passers</span>: <b>{point.E}</b><br/>'+
                                             '<span>Pssing Rate</span>: <b>{point.PE:.0f}%</b><br/>'
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
                                    lineWidth: 5,
                                    "name": "Recommendation Report",
                                    //"colorByPoint": true,
                                    "data": response["column"],
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
