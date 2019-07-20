<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery-migrate-1.2.1.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/jqplot/jquery.jqplot.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/jqplot/syntaxhighlighter/scripts/shCore.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/jqplot/syntaxhighlighter/scripts/shBrushJScript.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/jqplot/syntaxhighlighter/scripts/shBrushXml.min.js"></script>

<script type="text/javascript" src="<?= base_url() ?>assets/js/jqplot/plugins/jqplot.dateAxisRenderer.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/jqplot/plugins/jqplot.barRenderer.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/jqplot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/jqplot/plugins/jqplot.cursor.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/jqplot/plugins/jqplot.highlighter.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/jqplot/plugins/jqplot.dragable.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/jqplot/plugins/jqplot.trendline.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/jqplot/plugins/jqplot.canvasTextRenderer.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/jqplot/plugins/jqplot.canvasAxisLabelRenderer.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/jqplot/plugins/jqplot.canvasAxisTickRenderer.js"></script>

<!-- Flot -->
<script src="<?php echo base_url() ?>assets/js/pages/flot/jquery.flot.js"></script>
<script src="<?php echo base_url() ?>assets/js/pages/flot/jquery.flot.tooltip.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/pages/flot/jquery.flot.spline.js"></script>
<script src="<?php echo base_url() ?>assets/js/pages/flot/jquery.flot.resize.js"></script>
<script src="<?php echo base_url() ?>assets/js/pages/flot/jquery.flot.pie.js"></script>
<script src="<?php echo base_url() ?>assets/js/pages/flot/jquery.flot.symbol.js"></script>
<script src="<?php echo base_url() ?>assets/js/pages/flot/jquery.flot.time.js"></script>
<script src="<?php echo base_url();?>vendor/highcharts/code/highcharts.js"></script>
<script src="<?php echo base_url();?>vendor/highcharts/code/modules/data.js"></script>
<script src="<?php echo base_url();?>vendor/highcharts/code/modules/drilldown.js"></script>

<style type="text/css">
	
	.jqplot-yaxis-label
    {
        left: -30px !important;
        color: #1ab394;
    }

</style>

<script type="text/javascript">
  var d = new Date();
  var dateYear = d.getFullYear();
</script>

<!-- predicted scholar student next year -->
<!-- <div class="col-md-12">
    <div class="card card-box">
      <div class="card-head">
        <header>School Enrolled Student</header>
        <div class="tools">
          
        </div>
      </div>
      <div class="card-body ">
          <div class="row">
            <div class="col-sm-4">
              <button class="btn btn-default btn-sm" id="btn_left_school_enrolled_student" style="margin-left: 15px;"><i class="fa fa-arrow-left"></i></button>
              <button class="btn btn-default btn-sm" id="btn_now_school_enrolled_student">NOW</button>
              <button class="btn btn-default btn-sm" id="btn_right_school_enrolled_student"><i class="fa fa-arrow-right"></i></button>
            </div>
            <div class="col-sm-4 text-center"><span class="span_year_school_enrolled_student"></span></div>
            <div class="col-sm-4">
              <div class="input-group text-right">
                  <span class="input-group-btn">
                      <button class="btn btn-primary btn-sm paginate_number_btn_prev"><i class="fa fa-arrow-left"></i></button>
                  </span>
                  <select class="form-control input-sm paginate_number_select"></select>
                  <div class="input-group-btn">
                      <button class="btn btn-primary btn-sm paginate_number_btn_next"><i class="fa fa-arrow-right"></i></button>
                  </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div style="padding-left: 15px">
                  <div class="example-plot" id="school_enrolled_student" style="height:700px;"></div>
              </div>
            </div>
          </div>
      </div>
    </div>
</div> -->

<!-- <script type="text/javascript">
  $(function(){
    $(".span_year_school_enrolled_student").text(dateYear);
    $(window).load(function() {
      var paginate_number = $(".paginate_number_select").val();  
      console.log(paginate_number);
      get_school_enrolled_student_data(dateYear, paginate_number);
    });

    $("#btn_left_school_enrolled_student").on('click', function(event) {
      var dateYear = $(".span_year_predict_number_student").text();
      dateYear--;
      var paginate_number = $(".paginate_number_select").val();  
      get_school_enrolled_student_data(dateYear, paginate_number);
      $(".span_year_school_enrolled_student").text(dateYear);
    });
    $("#btn_now_school_enrolled_student").on('click', function(event) {
      // var year = d.getFullYear();
      var paginate_number = $(".paginate_number_select").val();  
      get_school_enrolled_student_data(dateYear, paginate_number);
      $(".span_year_school_enrolled_student").text(dateYear);
    });
    $("#btn_right_school_enrolled_student").on('click', function(event) {
      var dateYear = $(".span_year_school_enrolled_student").text();
      dateYear++;
      var paginate_number = $(".paginate_number_select").val();  
      get_school_enrolled_student_data(dateYear, paginate_number);
      $(".span_year_school_enrolled_student").text(dateYear);
    });
  });

  get_school_count();
  function get_school_count(){
    $.post('< ?= base_url('dashboard/get_school_count') ?>', 
          function(data) {
              paginate_number_select_data(parseInt(JSON.parse(data)));
      });
  }

  function get_school_enrolled_student_data(year, paginate_number){
    $.post('< ?= base_url('dashboard/get_school_enrolled_student_data') ?>', 
      { year, paginate_number }, 
      function(data) {
        get_school_enrolled_student_graph(year, JSON.parse(data));
    });
  }

  $(".paginate_number_select").on('change', function() {
      var offset = $(this).val();
      $('.paginate_number_select').val(offset);

      if (offset == 0) {
          $('.paginate_number_btn_prev').attr('disabled',true);
      } else {
          $('.paginate_number_btn_prev').attr('disabled',false);
      }
      if (offset == $('.paginate_number_select option:last-child').val()) {
          $('.paginate_number_btn_next').attr('disabled',true);
          $('.paginate_number_btn_prev').attr('disabled',false);
      }

      var year = $(".span_year_school_enrolled_student").html();
      get_school_enrolled_student_data(year, offset);

  });

  $(".paginate_number_btn_prev").on('click', function() {
      var paginate_number_select = $(".paginate_number_select").val();
      paginate_number_select = parseInt(paginate_number_select) - 10;

      $('.paginate_number_select option[value='+paginate_number_select+']').attr('selected','selected');
      $('.paginate_number_btn_next').prop('disabled',false);
      if (paginate_number_select == 0) {
          $('.paginate_number_btn_prev').prop('disabled',true);
      }

      var year = $(".span_year_school_enrolled_student").html();
      get_school_enrolled_student_data(year, paginate_number_select);
  });
  $(".paginate_number_btn_next").on('click', function() {
      var paginate_number_select = $(".paginate_number_select").val();
      paginate_number_select = parseInt(paginate_number_select) + 10;
      $('.paginate_number_select option[value='+paginate_number_select+']').attr('selected','selected');
      $('.paginate_number_btn_prev').prop('disabled',false);
      if (paginate_number_select == $('.paginate_number_select option:last-child').val()) {
          $('.paginate_number_btn_next').prop('disabled',true);
          $('.paginate_number_btn_prev').prop('disabled',false);
      }
      var year = $(".span_year_school_enrolled_student").html();
      get_school_enrolled_student_data(year, paginate_number_select);
  });

  function paginate_number_select_data(data){
      var pages_count = 0;
      if (data > 10) {
          pages_count = Math.ceil(data/10);
      } else {
          pages_count = 1;
      }
      if (pages_count == 1) {
          $('.paginate_number_btn_prev').attr('disabled',true);
          $('.paginate_number_btn_next').attr('disabled',true);
      } else {
          $('.paginate_number_btn_prev').attr('disabled',false);
          $('.paginate_number_btn_next').attr('disabled',false);
      }

      var offset = 0;
      $('.paginate_number_select').empty();
      for (var i = 0; i < pages_count; i++) {
          var newOption = '<option value="'+offset+'">'+(i+1)+'</option>';
          $('.paginate_number_select').append(newOption);
          offset += 10;
      }
  }

  var plotBar;
  function get_school_enrolled_student_graph(year, data){
    var s1 = [];
      var ticks = [];
      $.each(data, function(k, v) {
          s1.push(parseInt(v.count));
          ticks.push(v.school);                
      });

      if (s1.length == 0 && ticks.length == 0) {
          s1 = [0];
          ticks = ["No Data in "+year];
      }

      $.jqplot.config.enablePlugins = true;

      if (plotBar) {
          plotBar.destroy();
      }
      
      plotBar = $.jqplot('school_enrolled_student', [s1], {
          // Only animate if we're not using excanvas (not in IE 7 or IE 8)..
          animate: !$.jqplot.use_excanvas,
          seriesDefaults:{
              isDragable: false,
              renderer:$.jqplot.BarRenderer,
              pointLabels: { show: true },
              trendline: {
                show: false
              }
          },
          axesDefaults: {
              min: 0,  
              tickInterval: 1, 
              tickOptions: { 
                formatString: '%d' 
              },
              tickRenderer: $.jqplot.CanvasAxisTickRenderer ,
              tickOptions: {
                angle: -50
              }
          },
          axes: {
              xaxis: {
                  renderer: $.jqplot.CategoryAxisRenderer,
                  ticks: ticks
              }
          },
          highlighter: { show: false }
      });
  }

</script> -->

<!-- predicted scholar student next year -->
<div class="col-md-12">
    <div class="card card-box">
        <div class="card-head">
            <header>Top 5 Highest Percentage School</header>
            <div class="col-md-2">
                <input type="date" value="<?= Date('Y-m-d',strtotime(' -7300 days')); ?>" name="hpsT5From" id="hpsT5From" class="form-control">
            </div>To
            <div class="col-md-2">
                <input type="date" value="<?= Date('Y-m-d'); ?>" name="hpsT5To" id="hpsT5To" class="form-control">
            </div>

            <div class="col-md-2">
                <button class="btn btn-success btn-sm" onclick="viewNCperShooltop5();">Go!</button>
            </div>
        </div>
        <div class="card-body ">
            <div class="row">
                <div class="col-sm-12">
                    <div id="viewNCperShooltop5"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-box">
    	<div class="card-head">
    		<header>Number of scholar student</header>
    		<div class="tools">
    			<span class="span_year_predict_number_student"></span>
    			<button class="btn btn-default btn-sm" id="btn_left_predict_number_student" style="margin-left: 15px;"><i class="fa fa-arrow-left"></i></button>
    			<button class="btn btn-default btn-sm" id="btn_now_predict_number_student">NOW</button>
    			<button class="btn btn-default btn-sm" id="btn_right_predict_number_student"><i class="fa fa-arrow-right"></i></button>
				<!-- <input type="number" name="predict" class="form-control input-sm"> -->
				<?php if ($this->session->login_school_id == 1): ?>
	    			<select name="f_school_id_scholar_student_number" class="form-control input-sm">
	    				<option></option>
	    			</select>			
				<?php endif ?>
    		</div>
    	</div>
        <div class="card-body ">
            <div class="row">

            	<div class="col-sm-12">
            		<div style="padding-left: 15px">
                        <div class="example-plot" id="predicted_student_number"></div>
                      <ul class="list-inline widget-chart m-t-20 m-b-15 text-center"><li class="list-inline-item"><h5 class="mb-0">
                        <td class="legendColorBox"><div style="padding:1px; width: auto;">
                          <div style="width:auto;height:0;border:5px solid #244F69;overflow:hidden"></div></div></td>
                      </h5><p class="text-muted" style="font-style: italic;">Number of Scholar Student</p></li><li class="list-inline-item"><h5 class="mb-0">
                        <td class="legendColorBox"><div style="padding:1px; width: 100px;"><div style="width:100px;height:0;border:5px solid #D93349;overflow:hidden"></div></div></td>
                      </h5><p class="text-muted" style="font-style: italic;">Trend Line</p></li>
                    </div>
      				</div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    viewNCperShooltop5();

    function viewNCperShooltop5(){
        var hpsT5To = new Date($('#hpsT5To').val());
        var hpsT5From = new Date($('#hpsT5From').val());
        var arr = new Array();
        hpsT5To = hpsT5To.getFullYear();
        hpsT5From = hpsT5From.getFullYear();
        $.ajax({
            url: "<?= base_url('dashboard/viewNCperShooltop5DD') ?>",
            method: "GET",
            dataType: "json",
            data: {from:hpsT5From,to:hpsT5To,schlId:$("#schoolSelected").val()},
            success: function(response) {
                arr=response;
            }
        });
        setTimeout(function(){
            $.ajax({
                url: "<?= base_url('dashboard/viewNCperShooltop5') ?>",
                method: "GET",
                dataType: "json",
                data: {from:hpsT5From,to:hpsT5To,schlId:$("#schoolSelected").val()},
                success: function(response) {
                    var ctx = document.getElementById("viewNCperShooltop5");
                    if (ctx && response!=0) {
                        ctx.height = 200;
                        var myChart = new Highcharts.chart(ctx, {
                            
                            title: {
                                text: 'Top 5 Highest Percentage School as of '+hpsT5From+' to '+hpsT5To
                            },
                            // subtitle: {
                            //     text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
                            // },
                            xAxis: {
                                type: 'category'
                            },
                            yAxis: {
                                title: {
                                    text: 'Total Top 5 Highest Percentage School'
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
                                    //lineWidth: 5,
                                    "name": "Highest Percentage School",
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
    
    $(function(){

      // predicted scholar student next year
    <?php if ($this->session->login_school_id == 1): ?>
      $("[name=f_school_id_scholar_student_number]").select2({
        placeholder: "Select",
        allowClear: true,
        data: <?= $schools ?>
      }).on('change', function() {
        var dateYear = $(".span_year_predict_number_student").text();
        var f_school_id_scholar_student_number = $(this).val();
        get_predicted_scholar_student_data(dateYear, f_school_id_scholar_student_number);
        $("#btn_now_predict_number_student").click();
      });
    <?php endif ?>

    $(".span_year_predict_number_student").text(dateYear);
    <?php if ($this->session->login_school_id != 1): ?>
      get_predicted_scholar_student_data(dateYear, "<?= $this->session->login_school_id ?>");
    <?php else: ?>
      var f_school_id_scholar_student_number = $("[name=f_school_id_scholar_student_number]").val();
      get_predicted_scholar_student_data(dateYear, f_school_id_scholar_student_number);
    <?php endif ?>

    $("#btn_left_predict_number_student").on('click', function(event) {
      var dateYear = $(".span_year_predict_number_student").text();
      dateYear--;
      <?php if ($this->session->login_school_id != 1): ?>
        get_predicted_scholar_student_data(dateYear, "<?= $this->session->login_school_id ?>");
      <?php else: ?>
        var f_school_id_scholar_student_number = $("[name=f_school_id_scholar_student_number]").val();
        get_predicted_scholar_student_data(dateYear, f_school_id_scholar_student_number);
      <?php endif ?>
      $(".span_year_predict_number_student").text(dateYear);
    });
    $("#btn_now_predict_number_student").on('click', function(event) {
      <?php if ($this->session->login_school_id != 1): ?>
        get_predicted_scholar_student_data(dateYear, <?= $this->session->login_school_id ?>);
      <?php else: ?>
        var f_school_id_scholar_student_number = $("[name=f_school_id_scholar_student_number]").val();
        get_predicted_scholar_student_data(dateYear, f_school_id_scholar_student_number);
      <?php endif ?>
      $(".span_year_predict_number_student").text(dateYear);
    });
    $("#btn_right_predict_number_student").on('click', function(event) {
      var dateYear = $(".span_year_predict_number_student").text();
      dateYear++;
      <?php if ($this->session->login_school_id != 1): ?>
        get_predicted_scholar_student_data(dateYear, "<?= $this->session->login_school_id ?>");
      <?php else: ?>
        var f_school_id_scholar_student_number = $("[name=f_school_id_scholar_student_number]").val();
        get_predicted_scholar_student_data(dateYear, f_school_id_scholar_student_number);
      <?php endif ?>
      $(".span_year_predict_number_student").text(dateYear);
    });

    var plot1;
    function get_predicted_scholar_student_data(date, f_school_id_scholar_student_number){
      $('#predicted_student_number').empty();

      $.jqplot.config.enablePlugins = true;
      
      var date_20 = '1-Jan-'+(date-20);
      var date_19 = '1-Jan-'+(date-19);
      var date_18 = '1-Jan-'+(date-18);
      var date_17 = '1-Jan-'+(date-17);
      var date_16 = '1-Jan-'+(date-16);
      var date_15 = '1-Jan-'+(date-15);
      var date_14 = '1-Jan-'+(date-14);
      var date_13 = '1-Jan-'+(date-13);
      var date_12 = '1-Jan-'+(date-12);
      var date_11 = '1-Jan-'+(date-11);
      var date_10 = '1-Jan-'+(date-10);
      var date_9 = '1-Jan-'+(date-9);
      var date_8 = '1-Jan-'+(date-8);
      var date_7 = '1-Jan-'+(date-7);
      var date_6 = '1-Jan-'+(date-6);
      var date_5 = '1-Jan-'+(date-5);
      var date_4 = '1-Jan-'+(date-4);
      var date_3 = '1-Jan-'+(date-3);
      var date_2 = '1-Jan-'+(date-2);
      var date_1 = '1-Jan-'+(date-1);
      var date1 = '1-Jan-'+date;
      var date2 = '1-Jan-'+(date+1);

      var s1 = [

          [''+date_20+'', parseInt(get_predicted_scholar_student_data_info(date-20, f_school_id_scholar_student_number))],
          [''+date_19+'', parseInt(get_predicted_scholar_student_data_info(date-19, f_school_id_scholar_student_number))],
          [''+date_18+'', parseInt(get_predicted_scholar_student_data_info(date-18, f_school_id_scholar_student_number))],
          [''+date_17+'', parseInt(get_predicted_scholar_student_data_info(date-17, f_school_id_scholar_student_number))],
          [''+date_16+'', parseInt(get_predicted_scholar_student_data_info(date-16, f_school_id_scholar_student_number))],
          [''+date_15+'', parseInt(get_predicted_scholar_student_data_info(date-15, f_school_id_scholar_student_number))],
          [''+date_14+'', parseInt(get_predicted_scholar_student_data_info(date-14, f_school_id_scholar_student_number))],
          [''+date_13+'', parseInt(get_predicted_scholar_student_data_info(date-13, f_school_id_scholar_student_number))],
          [''+date_12+'', parseInt(get_predicted_scholar_student_data_info(date-12, f_school_id_scholar_student_number))],
          [''+date_11+'', parseInt(get_predicted_scholar_student_data_info(date-11, f_school_id_scholar_student_number))],
          [''+date_10+'', parseInt(get_predicted_scholar_student_data_info(date-10, f_school_id_scholar_student_number))],
          [''+date_9+'', parseInt(get_predicted_scholar_student_data_info(date-9, f_school_id_scholar_student_number))],
          [''+date_8+'', parseInt(get_predicted_scholar_student_data_info(date-8, f_school_id_scholar_student_number))],
          [''+date_7+'', parseInt(get_predicted_scholar_student_data_info(date-7, f_school_id_scholar_student_number))],
          [''+date_6+'', parseInt(get_predicted_scholar_student_data_info(date-6, f_school_id_scholar_student_number))],      
          [''+date_5+'', parseInt(get_predicted_scholar_student_data_info(date-5, f_school_id_scholar_student_number))],
          [''+date_4+'', parseInt(get_predicted_scholar_student_data_info(date-4, f_school_id_scholar_student_number))],
          [''+date_3+'', parseInt(get_predicted_scholar_student_data_info(date-3, f_school_id_scholar_student_number))],
          [''+date_2+'', parseInt(get_predicted_scholar_student_data_info(date-2, f_school_id_scholar_student_number))],
          [''+date_1+'', parseInt(get_predicted_scholar_student_data_info(date-1, f_school_id_scholar_student_number))],
          [''+date1+'', parseInt(get_predicted_scholar_student_data_info(date, f_school_id_scholar_student_number))]
        ]; 

      var total = 0;
      for (var i = 0; i < s1.length; i++) {
        total += s1[i][1];
      }
      var average = total / s1.length;

      var LastYear = [''+date2+'', average];

      s1.push(LastYear);
      
      var ticks = s1.length;
      plot1 = $.jqplot('predicted_student_number',[s1],{
          title: '',
          axes: {
              xaxis: {
                  renderer: $.jqplot.DateAxisRenderer,
                  numberTicks: ticks,
                  tickOptions: {
                      formatString: '%Y'
                  },
                  tickRenderer:$.jqplot.CanvasAxisTickRenderer,
                        label:'Year', 
                  labelOptions:{
                      fontFamily:'Helvetica',
                      fontSize: '14pt'
                  }
              },
              yaxis: {
              labelRenderer:$.jqplot.CanvasAxisLabelRenderer,
                      label:'Total Number of scholar student', 
                  labelOptions:{
                      fontFamily:'Helvetica',
                      fontSize: '14pt'
                  }
              }
          },
          highlighter: {
              show: true,
              showTooltip: true,
              sizeAdjust: 10,
              tooltipLocation: 'n',
              tooltipAxes: 'y',
              tooltipFormatString: '<b><i><span style="color:#244F69 ;">Number of scholar student</span></i></b> %d',
              useAxesFormatters: false
          },
          series: [
              {
                  isDragable: false,
                  color: '#244F69',
                  trendline: {
                      color: '#D93349',
                      lineWidth: '4'
                  }
              }
          ]
      });

            
    }
    $(window).resize(function() {
        plot1.replot({ resetAxes: true });
    });

    function get_predicted_scholar_student_data_info(date, f_school_id_scholar_student_number){
      var count = 0;
            $.ajax({
                'async': false,
                url: "<?= base_url('dashboard/get_predicted_scholar_student_data') ?>",
                type: "POST",
                data: { date, f_school_id_scholar_student_number },
                success: function(data){
                    count = JSON.parse(data);
                },
                error: function(data)
                {
                }
            });
            return count;
    }

  });
  // end predicted scholar student next year

</script>

<!-- predicted student failed -->
<div class="col-md-12">
    <div class="card card-box">
    	<div class="card-head">
    		<header>Number of student failed</header>
    		<div class="tools">
    			<span class="span_year_student_failed"></span>
    			<button class="btn btn-default btn-sm" id="btn_left_student_failed" style="margin-left: 15px;"><i class="fa fa-arrow-left"></i></button>
    			<button class="btn btn-default btn-sm" id="btn_now_student_failed">NOW</button>
    			<button class="btn btn-default btn-sm" id="btn_right_student_failed"><i class="fa fa-arrow-right"></i></button>
				<!-- <input type="number" name="predict" class="form-control input-sm"> -->
				<?php if ($this->session->login_school_id == 1): ?>
	    			<select name="f_school_id_student_failed" class="form-control input-sm">
	    				<option></option>
	    			</select>			
				<?php endif ?>
    		</div>
    	</div>
        <div class="card-body ">
            <div class="row">
            	<div class="col-sm-12">
            		<div style="padding-left: 15px">
                        <div class="example-plot" id="predicted_student_failed"></div>
                         <ul class="list-inline widget-chart m-t-20 m-b-15 text-center"><li class="list-inline-item"><h5 class="mb-0">
                        <td class="legendColorBox"><div style="padding:1px; width: auto;"><div style="width:auto;height:0;border:5px solid #244F69;overflow:hidden"></div></div></td>
                      </h5><p class="text-muted" style="font-style: italic;">Number of student failed</p></li><li class="list-inline-item"><h5 class="mb-0">
                        <td class="legendColorBox"><div style="padding:1px; width: 100px;"><div style="width:100px;height:0;border:5px solid #D93349;overflow:hidden"></div></div></td>
                      </h5><p class="text-muted" style="font-style: italic;">Trend Line</p></li>
                    </div>
				</div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  
  $(function(){

    var d = new Date();
      var dateYear = d.getFullYear();

    <?php if ($this->session->login_school_id == 1): ?>
      $("[name=f_school_id_student_failed]").select2({
        placeholder: "Select",
        allowClear: true,
        data: <?= $schools ?>
      }).on('change', function() {
        var dateYear = $(".span_year_student_failed").text();
        var f_school_id_student_failed = $(this).val();
        get_predicted_student_failed_data(dateYear, f_school_id_student_failed);
        $("#btn_now_student_failed").click();
      });
    <?php endif ?>

    $(".span_year_student_failed").text(dateYear);
    <?php if ($this->session->login_school_id != 1): ?>
      get_predicted_student_failed_data(dateYear, "<?= $this->session->login_school_id ?>");
    <?php else: ?>
      var f_school_id_student_failed = $("[name=f_school_id_student_failed]").val();
      get_predicted_student_failed_data(dateYear, f_school_id_student_failed);
    <?php endif ?>

    $("#btn_left_student_failed").on('click', function(event) {
      var dateYear = $(".span_year_student_failed").text();
      dateYear--;
      <?php if ($this->session->login_school_id != 1): ?>
        get_predicted_student_failed_data(dateYear, "<?= $this->session->login_school_id ?>");
      <?php else: ?>
        var f_school_id_student_failed = $("[name=f_school_id_student_failed]").val();
        get_predicted_student_failed_data(dateYear, f_school_id_student_failed);
      <?php endif ?>
      $(".span_year_student_failed").text(dateYear);
    });
    $("#btn_now_student_failed").on('click', function(event) {
      <?php if ($this->session->login_school_id != 1): ?>
        get_predicted_student_failed_data(dateYear, <?= $this->session->login_school_id ?>);
      <?php else: ?>
        var f_school_id_student_failed = $("[name=f_school_id_student_failed]").val();
        get_predicted_student_failed_data(dateYear, f_school_id_student_failed);
      <?php endif ?>
      $(".span_year_student_failed").text(dateYear);
    });
    $("#btn_right_student_failed").on('click', function(event) {
      var dateYear = $(".span_year_student_failed").text();
      dateYear++;
      <?php if ($this->session->login_school_id != 1): ?>
        get_predicted_student_failed_data(dateYear, "<?= $this->session->login_school_id ?>");
      <?php else: ?>
        var f_school_id_student_failed = $("[name=f_school_id_student_failed]").val();
        get_predicted_student_failed_data(dateYear, f_school_id_student_failed);
      <?php endif ?>
      $(".span_year_student_failed").text(dateYear);
    });

    var plot2;
    function get_predicted_student_failed_data(date, f_school_id_student_failed){
      $('#predicted_student_failed').empty();

      $.jqplot.config.enablePlugins = true;


      var date_18 = '1-Jan-'+(date-18);
      var date_17 = '1-Jan-'+(date-17);
      var date_16 = '1-Jan-'+(date-16);
      var date_15 = '1-Jan-'+(date-15);
      var date_14 = '1-Jan-'+(date-14);
      var date_13 = '1-Jan-'+(date-13);
      var date_12 = '1-Jan-'+(date-12);
      var date_11 = '1-Jan-'+(date-11);
      var date_10 = '1-Jan-'+(date-10);
      var date_9 = '1-Jan-'+(date-9);
      var date_8 = '1-Jan-'+(date-8);
      var date_7 = '1-Jan-'+(date-7);
      var date_6 = '1-Jan-'+(date-6);
      var date_5 = '1-Jan-'+(date-5);
      var date_4 = '1-Jan-'+(date-4);
      var date_3 = '1-Jan-'+(date-3);
      var date_2 = '1-Jan-'+(date-2);
      var date_1 = '1-Jan-'+(date-1);
      var date1 = '1-Jan-'+date;
      var date2 = '1-Jan-'+(date+1);

      var s2 = [


          [''+date_18+'', parseInt(get_predicted_student_failed_data_info(date-18, f_school_id_student_failed))],
          [''+date_17+'', parseInt(get_predicted_student_failed_data_info(date-17, f_school_id_student_failed))],
          [''+date_16+'', parseInt(get_predicted_student_failed_data_info(date-16, f_school_id_student_failed))],
          [''+date_15+'', parseInt(get_predicted_student_failed_data_info(date-15, f_school_id_student_failed))],
          [''+date_14+'', parseInt(get_predicted_student_failed_data_info(date-14, f_school_id_student_failed))],
          [''+date_13+'', parseInt(get_predicted_student_failed_data_info(date-13, f_school_id_student_failed))],
          [''+date_12+'', parseInt(get_predicted_student_failed_data_info(date-12, f_school_id_student_failed))],
          [''+date_11+'', parseInt(get_predicted_student_failed_data_info(date-11, f_school_id_student_failed))],
          [''+date_10+'', parseInt(get_predicted_student_failed_data_info(date-10, f_school_id_student_failed))],
          [''+date_9+'', parseInt(get_predicted_student_failed_data_info(date-9, f_school_id_student_failed))],
          [''+date_8+'', parseInt(get_predicted_student_failed_data_info(date-8, f_school_id_student_failed))],
          [''+date_7+'', parseInt(get_predicted_student_failed_data_info(date-7, f_school_id_student_failed))],
          [''+date_6+'', parseInt(get_predicted_student_failed_data_info(date-6, f_school_id_student_failed))],
          [''+date_5+'', parseInt(get_predicted_student_failed_data_info(date-5, f_school_id_student_failed))],
          [''+date_4+'', parseInt(get_predicted_student_failed_data_info(date-4, f_school_id_student_failed))],
          [''+date_3+'', parseInt(get_predicted_student_failed_data_info(date-3, f_school_id_student_failed))],
          [''+date_2+'', parseInt(get_predicted_student_failed_data_info(date-2, f_school_id_student_failed))],
          [''+date_1+'', parseInt(get_predicted_student_failed_data_info(date-1, f_school_id_student_failed))],
          [''+date1+'', parseInt(get_predicted_student_failed_data_info(date, f_school_id_student_failed))]
        ]; 

      var total = 0;
      for (var i = 0; i < s2.length; i++) {
        total += s2[i][1];
      }
      var average = total / s2.length;

      var LastYear = [''+date2+'', average];

      s2.push(LastYear);
      
      var ticks = s2.length;
      plot2 = $.jqplot('predicted_student_failed',[s2],{
          title: '',
          axes: {
              xaxis: {
                  renderer: $.jqplot.DateAxisRenderer,
                  numberTicks: ticks,
                  tickOptions: {
                      formatString: '%Y'
                  },
                  tickRenderer:$.jqplot.CanvasAxisTickRenderer,
                        label:'Year', 
                  labelOptions:{
                      fontFamily:'Helvetica',
                      fontSize: '14pt'
                  }
              },
              yaxis: {
              labelRenderer:$.jqplot.CanvasAxisLabelRenderer,
                      label:'Predicted student failed', 
                  labelOptions:{
                      fontFamily:'Helvetica',
                      fontSize: '14pt'
                  }
              }
          },
          highlighter: {
              show: true,
              showTooltip: true,
              sizeAdjust: 10,
              tooltipLocation: 'n',
              tooltipAxes: 'y',
              tooltipFormatString: '<b><i><span style="color:#244F69 ;">Number of student failed</span></i></b> %d',
              useAxesFormatters: false
          },
          series: [
              {
                  isDragable: false,
                  color: '#244F69',
                  trendline: {
                      color: '#D93349',
                      lineWidth: '4'
                  }
              }
          ]
      });

            
    }
    $(window).resize(function() {
        plot2.replot({ resetAxes: true });
    });

    function get_predicted_student_failed_data_info(date, f_school_id_student_failed){
      var count = 0;
            $.ajax({
                'async': false,
                url: "<?= base_url('dashboard/get_predicted_student_failed_data') ?>",
                type: "POST",
                data: { date, f_school_id_student_failed },
                success: function(data){
                    count = JSON.parse(data);
                },
                error: function(data)
                {
                }
            });
            return count;
    }

  });
  // end predicted student failed

</script>

<!-- predicted student failed -->
<div class="col-md-12">
    <div class="card card-box">
    	<div class="card-head">
    		<header>Number of student passed</header>
    		<div class="tools">
    			<span class="span_year_student_passed"></span>
    			<button class="btn btn-default btn-sm" id="btn_left_student_passed" style="margin-left: 15px;"><i class="fa fa-arrow-left"></i></button>
    			<button class="btn btn-default btn-sm" id="btn_now_student_passed">NOW</button>
    			<button class="btn btn-default btn-sm" id="btn_right_student_passed"><i class="fa fa-arrow-right"></i></button>
				<!-- <input type="number" name="predict" class="form-control input-sm"> -->
				<?php if ($this->session->login_school_id == 1): ?>
	    			<select name="f_school_id_student_passed" class="form-control input-sm">
	    				<option></option>
	    			</select>			
				<?php endif ?>
    		</div>
    	</div>
        <div class="card-body ">
            <div class="row">
            	<div class="col-sm-12">
            		<div style="padding-left: 15px">
                        <div class="example-plot" id="predicted_student_passed"></div>
                         <ul class="list-inline widget-chart m-t-20 m-b-15 text-center"><li class="list-inline-item"><h5 class="mb-0">
                        <td class="legendColorBox"><div style="padding:1px; width: auto;"><div style="width:auto;height:0;border:5px solid #244F69;overflow:hidden"></div></div></td>
                      </h5><p class="text-muted" style="font-style: italic;">Number of student passed</p></li><li class="list-inline-item"><h5 class="mb-0">
                        <td class="legendColorBox"><div style="padding:1px; width: 100px;"><div style="width:100px;height:0;border:5px solid #D93349;overflow:hidden"></div></div></td>
                      </h5><p class="text-muted" style="font-style: italic;">Trend Line</p></li>
                    </div>
				</div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  
  $(function(){

    var d = new Date();
      var dateYear = d.getFullYear();

    <?php if ($this->session->login_school_id == 1): ?>
      $("[name=f_school_id_student_passed]").select2({
        placeholder: "Select",
        allowClear: true,
        data: <?= $schools ?>
      }).on('change', function() {
        var dateYear = $(".span_year_student_passed").text();
        var f_school_id_student_passed = $(this).val();
        get_predicted_student_passed_data(dateYear, f_school_id_student_passed);
        $("#btn_now_student_passed").click();
      });
    <?php endif ?>

    $(".span_year_student_passed").text(dateYear);
    <?php if ($this->session->login_school_id != 1): ?>
      get_predicted_student_passed_data(dateYear, "<?= $this->session->login_school_id ?>");
    <?php else: ?>
      var f_school_id_student_passed = $("[name=f_school_id_student_passed]").val();
      get_predicted_student_passed_data(dateYear, f_school_id_student_passed);
    <?php endif ?>

    $("#btn_left_student_passed").on('click', function(event) {
      var dateYear = $(".span_year_student_passed").text();
      dateYear--;
      <?php if ($this->session->login_school_id != 1): ?>
        get_predicted_student_passed_data(dateYear, "<?= $this->session->login_school_id ?>");
      <?php else: ?>
        var f_school_id_student_passed = $("[name=f_school_id_student_passed]").val();
        get_predicted_student_passed_data(dateYear, f_school_id_student_passed);
      <?php endif ?>
      $(".span_year_student_passed").text(dateYear);
    });
    $("#btn_now_student_passed").on('click', function(event) {
      <?php if ($this->session->login_school_id != 1): ?>
        get_predicted_student_passed_data(dateYear, <?= $this->session->login_school_id ?>);
      <?php else: ?>
        var f_school_id_student_passed = $("[name=f_school_id_student_passed]").val();
        get_predicted_student_passed_data(dateYear, f_school_id_student_passed);
      <?php endif ?>
      $(".span_year_student_passed").text(dateYear);
    });
    $("#btn_right_student_passed").on('click', function(event) {
      var dateYear = $(".span_year_student_passed").text();
      dateYear++;
      <?php if ($this->session->login_school_id != 1): ?>
        get_predicted_student_passed_data(dateYear, "<?= $this->session->login_school_id ?>");
      <?php else: ?>
        var f_school_id_student_passed = $("[name=f_school_id_student_passed]").val();
        get_predicted_student_passed_data(dateYear, f_school_id_student_passed);
      <?php endif ?>
      $(".span_year_student_passed").text(dateYear);
    });

    var plot3;
    function get_predicted_student_passed_data(date, f_school_id_student_passed){
      $('#predicted_student_passed').empty();

      $.jqplot.config.enablePlugins = true;

      var date_18 = '1-Jan-'+(date-18);
      var date_17 = '1-Jan-'+(date-17);
      var date_16 = '1-Jan-'+(date-16);
      var date_15 = '1-Jan-'+(date-15);
      var date_14 = '1-Jan-'+(date-14);
      var date_13 = '1-Jan-'+(date-13);
      var date_12 = '1-Jan-'+(date-12);
      var date_11 = '1-Jan-'+(date-11);
      var date_10 = '1-Jan-'+(date-10);
      var date_9 = '1-Jan-'+(date-9);
      var date_8 = '1-Jan-'+(date-8);
      var date_7 = '1-Jan-'+(date-7);
      var date_6 = '1-Jan-'+(date-6);
      var date_5 = '1-Jan-'+(date-5);
      var date_4 = '1-Jan-'+(date-4);
      var date_3 = '1-Jan-'+(date-3);
      var date_2 = '1-Jan-'+(date-2);
      var date_1 = '1-Jan-'+(date-1);
      var date1 = '1-Jan-'+date;
      var date2 = '1-Jan-'+(date+1);

      var s3 = [

          [''+date_18+'', parseInt(get_predicted_student_passed_data_info(date-18, f_school_id_student_passed))],
          [''+date_17+'', parseInt(get_predicted_student_passed_data_info(date-17, f_school_id_student_passed))],
          [''+date_16+'', parseInt(get_predicted_student_passed_data_info(date-16, f_school_id_student_passed))],
          [''+date_15+'', parseInt(get_predicted_student_passed_data_info(date-15, f_school_id_student_passed))],
          [''+date_14+'', parseInt(get_predicted_student_passed_data_info(date-14, f_school_id_student_passed))],
          [''+date_13+'', parseInt(get_predicted_student_passed_data_info(date-13, f_school_id_student_passed))],
          [''+date_12+'', parseInt(get_predicted_student_passed_data_info(date-12, f_school_id_student_passed))],
          [''+date_11+'', parseInt(get_predicted_student_passed_data_info(date-11, f_school_id_student_passed))],
          [''+date_10+'', parseInt(get_predicted_student_passed_data_info(date-10, f_school_id_student_passed))],
          [''+date_9+'', parseInt(get_predicted_student_passed_data_info(date-9, f_school_id_student_passed))],
          [''+date_8+'', parseInt(get_predicted_student_passed_data_info(date-8, f_school_id_student_passed))],
          [''+date_7+'', parseInt(get_predicted_student_passed_data_info(date-7, f_school_id_student_passed))],
          [''+date_6+'', parseInt(get_predicted_student_passed_data_info(date-6, f_school_id_student_passed))],
          [''+date_5+'', parseInt(get_predicted_student_passed_data_info(date-5, f_school_id_student_passed))],
          [''+date_4+'', parseInt(get_predicted_student_passed_data_info(date-4, f_school_id_student_passed))],
          [''+date_3+'', parseInt(get_predicted_student_passed_data_info(date-3, f_school_id_student_passed))],
          [''+date_2+'', parseInt(get_predicted_student_passed_data_info(date-2, f_school_id_student_passed))],
          [''+date_1+'', parseInt(get_predicted_student_passed_data_info(date-1, f_school_id_student_passed))],
          [''+date1+'', parseInt(get_predicted_student_passed_data_info(date, f_school_id_student_passed))]
        ]; 

      var total = 0;
      for (var i = 0; i < s3.length; i++) {
        total += s3[i][1];
      }
      var average = total / s3.length;

      var LastYear = [''+date2+'', average];

      s3.push(LastYear);
      
      var ticks = s3.length;
      plot3 = $.jqplot('predicted_student_passed',[s3],{
          title: '',
          axes: {
              xaxis: {
                  renderer: $.jqplot.DateAxisRenderer,
                  numberTicks: ticks,
                  tickOptions: {
                      formatString: '%Y'
                  },
                  tickRenderer:$.jqplot.CanvasAxisTickRenderer,
                        label:'Year', 
                  labelOptions:{
                      fontFamily:'Helvetica',
                      fontSize: '14pt'
                  }
              },
              yaxis: {
              labelRenderer:$.jqplot.CanvasAxisLabelRenderer,
                      label:'Predicted student passed', 
                  labelOptions:{
                      fontFamily:'Helvetica',
                      fontSize: '14pt'
                  }
              }
          },
          highlighter: {
              show: true,
              showTooltip: true,
              sizeAdjust: 10,
              tooltipLocation: 'n',
              tooltipAxes: 'y',
              tooltipFormatString: '<b><i><span style="color:#244F69 ;">Predicted number of student passed</span></i></b> %d',
              useAxesFormatters: false
          },
          series: [
              {
                  isDragable: false,
                  color: '#244F69',
                  trendline: {
                      color: '#D93349',
                      lineWidth: '4'
                  } 
              }
          ]
      });

            
    }
    $(window).resize(function() {
        plot3.replot({ resetAxes: true });
    });

    function get_predicted_student_passed_data_info(date, f_school_id_student_passed){
      var count = 0;
            $.ajax({
                'async': false,
                url: "<?= base_url('dashboard/get_predicted_student_passed_data') ?>",
                type: "POST",
                data: { date, f_school_id_student_passed },
                success: function(data){
                    count = JSON.parse(data);
                },
                error: function(data)
                {
                }
            });
            return count;
    }

  });
  // end predicted student passed

</script>

<!-- predicted school performance -->
<div class="col-md-12">
    <div class="card card-box">
    	<div class="card-head">
    		<header>Predicted school performance</header>
    		<div class="tools">
    			<span class="span_year_school_performance"></span>
    			<button class="btn btn-default btn-sm" id="btn_left_school_performance" style="margin-left: 15px;"><i class="fa fa-arrow-left"></i></button>
    			<button class="btn btn-default btn-sm" id="btn_now_school_performance">NOW</button>
    			<button class="btn btn-default btn-sm" id="btn_right_school_performance"><i class="fa fa-arrow-right"></i></button>
				<!-- <input type="number" name="predict" class="form-control input-sm"> -->
				<?php if ($this->session->login_school_id == 1): ?>
	    			<select name="f_school_id_school_performance" class="form-control input-sm">
	    				<option></option>
	    			</select>			
				<?php endif ?>
    		</div>
    	</div>
        <div class="card-body ">
            <div class="row">
            	<div class="col-sm-12">
            		<div style="padding-left: 15px">
                        <div class="example-plot" id="predicted_school_performance"></div>
                         <ul class="list-inline widget-chart m-t-20 m-b-15 text-center"><li class="list-inline-item"><h5 class="mb-0">
                        <td class="legendColorBox"><div style="padding:1px; width: auto;"><div style="width:auto;height:0;border:5px solid #244F69;overflow:hidden"></div></div></td>
                      </h5><p class="text-muted" style="font-style: italic;">Predicted school performance</p></li><li class="list-inline-item"><h5 class="mb-0">
                        <td class="legendColorBox"><div style="padding:1px; width: 100px;"><div style="width:100px;height:0;border:5px solid #D93349;overflow:hidden"></div></div></td>
                      </h5><p class="text-muted" style="font-style: italic;">Trend Line</p></li>
                    </div>
				</div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

	$(function(){

		var d = new Date();
	    var dateYear = d.getFullYear();

		<?php if ($this->session->login_school_id == 1): ?>
			$("[name=f_school_id_school_performance]").select2({
				placeholder: "Select",
				allowClear: true,
				data: <?= $schools ?>
			}).on('change', function() {
				var dateYear = $(".span_year_school_performance").text();
				var f_school_id_school_performance = $(this).val();
				get_predicted_school_performance_data(dateYear, f_school_id_school_performance);
				$("#btn_now_school_performance").click();
			});
		<?php endif ?>

		$(".span_year_school_performance").text(dateYear);
		<?php if ($this->session->login_school_id != 1): ?>
			get_predicted_school_performance_data(dateYear, "<?= $this->session->login_school_id ?>");
		<?php else: ?>
			var f_school_id_school_performance = $("[name=f_school_id_school_performance]").val();
			get_predicted_school_performance_data(dateYear, f_school_id_school_performance);
		<?php endif ?>

		$("#btn_left_school_performance").on('click', function(event) {
			var dateYear = $(".span_year_school_performance").text();
			dateYear--;
			<?php if ($this->session->login_school_id != 1): ?>
				get_predicted_school_performance_data(dateYear, "<?= $this->session->login_school_id ?>");
			<?php else: ?>
				var f_school_id_school_performance = $("[name=f_school_id_school_performance]").val();
				get_predicted_school_performance_data(dateYear, f_school_id_school_performance);
			<?php endif ?>
			$(".span_year_school_performance").text(dateYear);
		});
		$("#btn_now_school_performance").on('click', function(event) {
			<?php if ($this->session->login_school_id != 1): ?>
				get_predicted_school_performance_data(dateYear, <?= $this->session->login_school_id ?>);
			<?php else: ?>
				var f_school_id_school_performance = $("[name=f_school_id_school_performance]").val();
				get_predicted_school_performance_data(dateYear, f_school_id_school_performance);
			<?php endif ?>
			$(".span_year_school_performance").text(dateYear);
		});
		$("#btn_right_school_performance").on('click', function(event) {
			var dateYear = $(".span_year_school_performance").text();
			dateYear++;
			<?php if ($this->session->login_school_id != 1): ?>
				get_predicted_school_performance_data(dateYear, "<?= $this->session->login_school_id ?>");
			<?php else: ?>
				var f_school_id_school_performance = $("[name=f_school_id_school_performance]").val();
				get_predicted_school_performance_data(dateYear, f_school_id_school_performance);
			<?php endif ?>
			$(".span_year_school_performance").text(dateYear);
		});

    var plot4;
		function get_predicted_school_performance_data(date, f_school_id_school_performance){
			$('#predicted_school_performance').empty();

			$.jqplot.config.enablePlugins = true;

      var date_18 = '1-Jan-'+(date-18);
      var date_17 = '1-Jan-'+(date-17);
      var date_16 = '1-Jan-'+(date-16);
      var date_15 = '1-Jan-'+(date-15);
      var date_14 = '1-Jan-'+(date-14);
      var date_13 = '1-Jan-'+(date-13);
      var date_12 = '1-Jan-'+(date-12);
      var date_11 = '1-Jan-'+(date-11);
      var date_10 = '1-Jan-'+(date-10);
      var date_9 = '1-Jan-'+(date-9);
      var date_8 = '1-Jan-'+(date-8);
      var date_7 = '1-Jan-'+(date-7);
      var date_6 = '1-Jan-'+(date-6);
      var date_5 = '1-Jan-'+(date-5);
      var date_4 = '1-Jan-'+(date-4);
      var date_3 = '1-Jan-'+(date-3);
      var date_2 = '1-Jan-'+(date-2);
      var date_1 = '1-Jan-'+(date-1);
      var date1 = '1-Jan-'+date;
      var date2 = '1-Jan-'+(date+1);

			var s4 = [


        [''+date_18+'', parseInt(get_predicted_school_performance_data_info(date-18, f_school_id_school_performance))],
        [''+date_17+'', parseInt(get_predicted_school_performance_data_info(date-17, f_school_id_school_performance))],
        [''+date_16+'', parseInt(get_predicted_school_performance_data_info(date-16, f_school_id_school_performance))],
        [''+date_15+'', parseInt(get_predicted_school_performance_data_info(date-15, f_school_id_school_performance))],
        [''+date_14+'', parseInt(get_predicted_school_performance_data_info(date-14, f_school_id_school_performance))],
        [''+date_13+'', parseInt(get_predicted_school_performance_data_info(date-13, f_school_id_school_performance))],
        [''+date_12+'', parseInt(get_predicted_school_performance_data_info(date-12, f_school_id_school_performance))],
        [''+date_11+'', parseInt(get_predicted_school_performance_data_info(date-11, f_school_id_school_performance))],
        [''+date_10+'', parseInt(get_predicted_school_performance_data_info(date-10, f_school_id_school_performance))],
        [''+date_9+'', parseInt(get_predicted_school_performance_data_info(date-9, f_school_id_school_performance))],
        [''+date_8+'', parseInt(get_predicted_school_performance_data_info(date-8, f_school_id_school_performance))],
        [''+date_7+'', parseInt(get_predicted_school_performance_data_info(date-7, f_school_id_school_performance))],
        [''+date_6+'', parseInt(get_predicted_school_performance_data_info(date-6, f_school_id_school_performance))],
    		[''+date_5+'', parseInt(get_predicted_school_performance_data_info(date-5, f_school_id_school_performance))],
    		[''+date_4+'', parseInt(get_predicted_school_performance_data_info(date-4, f_school_id_school_performance))],
    		[''+date_3+'', parseInt(get_predicted_school_performance_data_info(date-3, f_school_id_school_performance))],
    		[''+date_2+'', parseInt(get_predicted_school_performance_data_info(date-2, f_school_id_school_performance))],
    		[''+date_1+'', parseInt(get_predicted_school_performance_data_info(date-1, f_school_id_school_performance))],
    		[''+date1+'', parseInt(get_predicted_school_performance_data_info(date, f_school_id_school_performance))]
    	]; 

    	var total = 0;
     	for (var i = 0; i < s4.length; i++) {
     		total += s4[i][1];
     	}
     	var average = total / s4.length;

     	var LastYear = [''+date2+'', average];

     	s4.push(LastYear);
       	
      var ticks = s4.length;
      plot4 = $.jqplot('predicted_school_performance',[s4],{
         	title: '',
         	axes: {
             	xaxis: {
                 	renderer: $.jqplot.DateAxisRenderer,
                 	numberTicks: ticks,
                 	tickOptions: {
                     	formatString: '%Y'
                 	},
                 	tickRenderer:$.jqplot.CanvasAxisTickRenderer,
                      	label:'Year', 
                  labelOptions:{
                      fontFamily:'Helvetica',
                      fontSize: '14pt'
                  }
             	},
             	yaxis: {
              labelRenderer:$.jqplot.CanvasAxisLabelRenderer,
                      label:'Predicted student passed', 
                  labelOptions:{
                      fontFamily:'Helvetica',
                      fontSize: '14pt'
                  }
             	}
         	},
         	highlighter: {
              show: true,
              showTooltip: true,
             	sizeAdjust: 10,
             	tooltipLocation: 'n',
             	tooltipAxes: 'y',
             	tooltipFormatString: '<b><i><span style="color:#244F69 ;">Predicted school performance</span></i></b> %d',
             	useAxesFormatters: false
         	},
          series: [
            	{
                	isDragable: false,
                	color: '#244F69',
                	trendline: {
                    	color: '#D93349',
                    	lineWidth: '4'
                	} 
            	}
        	]
      });
		}
    $(window).resize(function() {
        plot4.replot({ resetAxes: true });
    });

		function get_predicted_school_performance_data_info(date, f_school_id_school_performance){
			var count = 0;
            $.ajax({
                'async': false,
                url: "<?= base_url('dashboard/get_predicted_school_performance_data') ?>",
                type: "POST",
                data: { date, f_school_id_school_performance },
                success: function(data){
                    count = JSON.parse(data);
                },
                error: function(data)
                {
                }
            });
            return count;
		}

	});
	// end predicted student passed
	
</script>
