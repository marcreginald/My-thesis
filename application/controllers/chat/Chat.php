<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->redirect();
		$this->load->model('model_chat_message');
		$this->load->model('model_user_image');
	}

	public function get_users() {
		$data = [];
		$login_id = $this->session->login_id;
		$search = $this->input->post("search");
		$query = $this->model_user->query("SELECT * FROM users WHERE user_id<>$login_id ORDER BY firstname ASC")->result();

		if($search != "") {
			$query = $this->model_user->query("SELECT * FROM users WHERE user_id NOT LIKE ".$this->session->login_id." AND (firstname LIKE '%".$search."%' OR lastname LIKE '%".$search."%') ORDER BY firstname ASC");
			$query = $query->result();
		}

		foreach ($query as $key => $value) {
			$data[] = [
				"user_id"	=> $value->user_id,
				"name"		=> $value->firstname." ".$value->lastname,
				"img"		=> $this->get_image($value->user_id)
			];
		}
		echo json_encode($data);
	}

	public function get_image($user_id) {
		$path = "";
		foreach ($this->model_user_image->query("SELECT location_path FROM user_images WHERE user_id=$user_id")->result() as $key => $value) {
			$path = $value->location_path;
			break;
		}
		return $path;
	}

	public function get_new_messages() {
		$data = [];
		$login_id = $this->session->login_id;
		foreach ($this->model_chat_message->query("SELECT
													*
												FROM
													chat_messages
												WHERE
													user_to=$login_id
												AND `read`=0 ORDER BY date_sent ASC")->result() as $key => $value) {
			$data[] = [
				"user_id"	=> $value->user_from,
				"name" 		=> $this->get_user_name($value->user_from),
				"msg"		=> $value->message,
				"sent"		=> date("M d, Y h:i A", strtotime($value->date_sent))
			];
		}
		echo json_encode($data);
	}

	public function get_messages() {
		$data = [];
		$msg = [];
		$user_id = $this->input->post("user_id");
		$user = $this->session->login_id;
		$limit_to = 0;
		$limit_from = 0;

		$count_query = "SELECT COUNT(*) AS count FROM(SELECT * FROM chat_messages WHERE user_from='".$user."' AND user_to='".$user_id."' UNION SELECT * FROM chat_messages WHERE user_from='".$user_id."' AND user_to='".$user."') AS tbl";
		foreach ($this->model_chat_message->query($count_query)->result() as $key => $value) {
			$limit_to = $value->count;
		}

		if($limit_to > 500) {
			$limit_from = ($limit_to - 500);
		}

		$query = "SELECT * FROM chat_messages WHERE user_from='".$user."' AND user_to='".$user_id."' UNION SELECT * FROM chat_messages WHERE user_from='".$user_id."' AND user_to='".$user."' ORDER BY date_sent ASC LIMIT 500 OFFSET ".$limit_from."";

		foreach ($this->model_chat_message->query($query)->result() as $key => $value) {
			$from_user = false;

			if($value->user_from == $user) {
				$from_user = true;
			}

			if($value->user_to == $user && $value->read == 0) {
				$this->model_chat_message->update(["read" => "1"], ["chat_message_id" => $value->chat_message_id]);
			}

			$msg[] = [
				"msg" 		=> $value->message,
				"sent"		=> date("M d, Y h:i A", strtotime($value->date_sent)),
				"from_user"	=> $from_user
			];
		}
		$data = [
			"name"	=> $this->get_user_name($user_id),
			"msg" 	=> $msg,
			"count"	=> $limit_to
		];
		echo json_encode($data);
	}

	public function get_user_name($user_id) {
		$name = "";
		foreach ($this->model_user->query("SELECT firstname, lastname FROM users WHERE user_id=$user_id")->result() as $key => $value) {
			$name = $value->firstname." ".$value->lastname;
			break;
		}
		return $name;
	}

	public function send_message() {
		date_default_timezone_set("Asia/Manila");
		$now = date("Y-m-d H:i:s");
		$data = [
			"user_from"	=> $this->session->login_id,
			"user_to"	=> $this->input->post("user_id"),
			"message"	=> $this->input->post("msg"),
			"date_sent"	=> $now
		];
		$this->model_chat_message->insert($data);
	}

	public function get_all_unread() {
		$count = 0;
		$login_id = $this->session->login_id;
		foreach ($this->model_chat_message->query("SELECT COUNT(*) as count FROM chat_messages WHERE user_to='$login_id' AND `read`=0")->result() as $key => $value) {
			$count = $value->count;
		}
		echo json_encode($count);
	}

}

/* End of file Chat.php */
/* Location: ./application/controllers/chat/Chat.php */