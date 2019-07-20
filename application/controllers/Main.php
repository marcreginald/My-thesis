<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->redirect_home();
		$this->load->model('model_status_report');		
	}

	public function index()
	{
		redirect(base_url('Home'));
	}

	public function page_not_found(){
		$data = $this->system();
		$data += [
			"page_title"	=> "Page Not Found"
		];
		$this->load->view('interface/system/error/Page_not_found', $data);
	}

}

/* End of file Main.php */
/* Location: ./application/controllers/Main.php */