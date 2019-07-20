
<!-- get student failed next year -->
<div class="col-md-12">
    <div class="card card-box">
    	<div class="card-head">
    		<header>Predicted number of student failed</header>
    		<div class="tools">
    			<span class="span_year_course"></span>
    			<button class="btn btn-default btn-sm" id="btn_left_course" style="margin-left: 15px;"><i class="fa fa-arrow-left"></i></button>
    			<button class="btn btn-default btn-sm" id="btn_now_course">NOW</button>
    			<button class="btn btn-default btn-sm" id="btn_right_course"><i class="fa fa-arrow-right"></i></button>
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
                        <div id="predicted_student_number"></div>
                    </div>
				</div>
            </div>
        </div>
    </div>
</div>
<?php 

function get_line_graph_data_predict($date, $school_id, $predict){
		$samples = [
					[73676, 2013], 
					[77006, 2013], 
					[10565, 2014], 
					[146088, 2014], 
					[15000, 2015], 
					[65940, 2015], 
					[9300, 2016], 
					[93739, 2016], 
					[153260, 2017], 
					[17764, 2017], 
					[57000, 2018], 
					[15000, 2018]
				];
		$targets = [2000, 2750, 15500, 960, 4400, 8800, 7100, 2550, 1025, 5900, 4600, 4400];

		$regression = new LeastSquares();
		$regression->train($samples, $targets);
		$try = $regression->predict([null, 2017]);
		return $try;
	}

	function get_line_graph_data_info($date, $school_id){
		$count = 0;
		$where = " YEAR(date_from) = $date ";
		if ($school_id != "") {
			$where .= " AND school_id=$school_id ";
		}
		foreach ($this->db->query("SELECT
									COUNT(*) AS count
								FROM
								certificates
								WHERE $where")->result() as $key => $value) {
			
			$count = $value->count;
		}
		return $count;
	}

	function get_line_graph_data_predict_info(){

	}

	function get_course_future_data(){
		$dataset = new CsvDataset('php-ml-examples-master/data/languages.csv', 1);
		$vectorizer = new TokenCountVectorizer(new WordTokenizer());
		$tfIdfTransformer = new TfIdfTransformer();

		$samples = [];
		foreach ($dataset->getSamples() as $sample) {
		    $samples[] = $sample[0];
		}

		$vectorizer->fit($samples);
		$vectorizer->transform($samples);

		$tfIdfTransformer->fit($samples);
		$tfIdfTransformer->transform($samples);

		$dataset = new ArrayDataset($samples, $dataset->getTargets());

		$randomSplit = new StratifiedRandomSplit($dataset, 0.1);

		$classifier = new SVC(Kernel::RBF, 10000);
		$classifier->train($randomSplit->getTrainSamples(), $randomSplit->getTrainLabels());

		$predictedLabels = $classifier->predict($randomSplit->getTestSamples());

		echo 'Accuracy: '.Accuracy::score($randomSplit->getTestLabels(), $predictedLabels);
	}

	function get_school_performance_graph(){
		$data = [];
		$date = $this->input->post("date");

		$where = " WHERE certificates.school_id = schools.school_id AND YEAR(date_from) = $date";

		foreach ($this->model_school->query("SELECT
												school,
												(
													SELECT
														COUNT(school_id)
													FROM
														certificates
													$where
												) AS count_school
											FROM
											schools
											ORDER BY
												count_school DESC")->result() as $key => $value) {
			
			$data[] = [
				"school" 		=> $value->school,
				"count_school"	=> $value->count_school
			];
		}

		echo json_encode($data);
	}

	
	function test_ml_predict(){
		$dataset = new CsvDataset('php-ml-examples-master/data/languages.csv', 1);
		$vectorizer = new TokenCountVectorizer(new WordTokenizer());
		$tfIdfTransformer = new TfIdfTransformer();

		$samples = [];
		foreach ($dataset->getSamples() as $sample) {
		    $samples[] = $sample[0];
		}

		print_r($samples);
		echo '<br><br><br><br>';
		$vectorizer->fit($samples);
		$vectorizer->transform($samples);
		print_r($vectorizer);

		$tfIdfTransformer->fit($samples);
		$tfIdfTransformer->transform($samples);

		$dataset = new ArrayDataset($samples, $dataset->getTargets());

		$randomSplit = new StratifiedRandomSplit($dataset, 0.1);

		$classifier = new SVC(Kernel::RBF, 10000);
		$classifier->train($randomSplit->getTrainSamples(), $randomSplit->getTrainLabels());

		$predictedLabels = $classifier->predict($randomSplit->getTestSamples());

		echo 'Accuracy: '.Accuracy::score($randomSplit->getTestLabels(), $predictedLabels);
	}

	function test_ml_perdict1(){
		// $regression = new SVR(Kernel::POLYNOMIAL, 3, 0.1, 10,0.3,0.1,3,200,true);
		$classifier = new KNearestNeighbors();
		$samples = [];
		$labels = [];

		foreach ($this->model_course->query("SELECT
												*
											FROM
												certificates
											WHERE YEAR(date_from)='2018'")->result() as $key => $value) {
			$today = date("Y", strtotime($value->date_from));
			$samples[] = [(int)$value->certificate_id, 8];
			$labels[] = date("Y", strtotime($value->date_from));
		}

		$samples = json_encode($samples);

		print_r($samples);
		echo '<br><br>';
		print_r($labels);
		$classifier->train($samples);

		print_r($classifier->predict([3, 2])); 
		// return 'b'
	}