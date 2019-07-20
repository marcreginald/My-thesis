<style type="text/css">
	.chat {
		z-index: 999;
		position: fixed; 
		bottom: 0; 
		right: 10px;
	}
	.chat_header {
		width: 250px; 
		padding: 5px;
		border-radius: 2px 2px 0px 0px;
		background: #1880c9 !important;
	}
	.new_msg_body {
		height: 120px; 
		width: 250px;
		overflow: auto;
		border-right: 1px solid #e6e6e6;
		border-left: 1px solid #e6e6e6;
		display: none;
	}
	.tbl_msg {
		font-size: 12px;
	}

	.chat_body {
		height: 150px;
		width: 250px;
		overflow: auto;
		border-right: 1px solid #e6e6e6;
		border-left: 1px solid #e6e6e6;
		display: none; 
	}
	.tbl {
		font-size: 12px;
	}

	.chat_user {
		font-size: 11px;
	}
	.chat_title {
		font-size: 11px;
		font-weight: bold;
		text-align: center;
		border-right: 1px solid #e6e6e6;
		border-left: 1px solid #e6e6e6;
		padding: 5px;
		display: none;
	}
	
	#div_chat_box {
		position: fixed;
		right: 260px;
		bottom: 0;
	}
	
	.search input[type=text] {
		font-size: 12px;
		border-top: 1px solid #e6e6e6;
		border-bottom: none;
		border-right: 1px solid #e6e6e6;
		border-left: 1px solid #e6e6e6;
		display: none;
	}

	/* chat box */
	.chat_box {
		display: inline-block;
		margin-right: 10px;
	}
	.chat_box_header {
		width: 270px; 
		padding: 5px;
		border-radius: 2px 2px 0px 0px;
	}
	.chat_box_body {
		height: 250px; 
		width: 270px;
		overflow: auto;
		border-right: 1px solid #e6e6e6;
		border-left: 1px solid #e6e6e6;
		padding: 10px; 
	}
	.chat_msg {
		height: auto;
		width: 150px;
		border-radius: 5px;
		padding: 5px;
		font-size: 12px;
		margin-bottom: 15px;
		word-wrap: break-word;
	}
	.chat_form {
		border-right: 1px solid #e6e6e6;
		border-left: 1px solid #e6e6e6;
	}
	.chat_form textarea {
		overflow: auto;
		resize: none;
		font-size: 12px;
		height: 60px;
		border-top: 1px solid #e6e6e6;
		border-bottom: none;
		border-right: none;
		border-left: none;
	}
	.chat_time {
		font-size: 9px;
	}
	.grey_bg {
		background-color: #f2f2f2;
	}
	.user_img {
		width: 40px;
		height: 40px;
	}
	.close_chat:hover {
		color: #d9d9d9;
	}
	
</style>

<div class="chat">
	<div class="navy-bg chat_header"><span class="fa fa-comments" style="color:white;"></span><span id="chat_notif"></span></div>
	<div class="white-bg chat_title" style="background: white;">New messages</div>
	<div class="white-bg new_msg_body" style="background: white;">
		<table class="table table-hover tbl_msg">
			<tbody></tbody>
		</table>
	</div>
	<div class="white-bg chat_title" style="background: white;">Users</div>
	<div class="white-bg chat_body" style="background: white;">
		<table class="table table-hover tbl">
			<tbody></tbody>
		</table>
	</div>
	<div class="search">
		<input type="text" placeholder="Search" class="form-control input-sm" name="search">
	</div>
</div>

<div id="div_chat_box" style="background: white;"></div>

<script type="text/javascript">

	var count_chat_box = 0;
	var ids = [];
	var scroll_hs = [];

	$(function() {

		get_users();

		setInterval(reload_chat, 2000);
		setInterval(get_all_unread, 2000);
		setInterval(get_new_messages, 2000);

		$(".chat_header").on("click", function() {
			$(".chat_body").slideToggle();
			$(".new_msg_body").slideToggle();
			$("[name=search]").slideToggle();
			$(".chat_title").slideToggle();
		});

		$("[name=search]").on("keyup", function() {
			get_users($(this).val());
		});

	});

	function show_chat(id) {
		var id_exist = ids.indexOf(id);

		if(count_chat_box < 3 && id_exist == -1) {
			$("#div_chat_box").append('<div class="chat_box" id="chat_box'+id+'">\
										<div class="navy-bg chat_box_header" onclick="minimize_chat('+id+')">\
											<span id="chat_name'+id+'">&nbsp;</span>\
											<span class="fa fa-remove pull-right close_chat" onclick="close_chat('+id+')" title="Close"></span>\
										</div>\
										<div class="white-bg chat_box_body" id="chat_box_body'+id+'"></div>\
										<div class="white-bg chat_form" id="chat_form'+id+'">\
											<textarea class="form-control" placeholder="Message" name="chat_message'+id+'"></textarea>\
											<br>\
											<input type="hidden" name="chat_user_id'+id+'" value="'+id+'">\
										</div>\
									</div>');
			count_chat_box++;
			ids.push(id);
			scroll_hs.push(0);
		}

		$('[name=chat_message'+id+']').on("keypress", function(e) {
			if(e.which == 13) {
				e.preventDefault();
				if($(this).val() != "") {
					send_msg(id);
					$(this).val("");
				}
			}
		});

		$("#chat_box_body"+id+"").on("scroll", function() {
			scroll_hs.splice(ids.indexOf(parseInt(id)), 1, $("#chat_box_body"+id+"").prop("scrollHeight"));
		});

		show_msg(id);
	}

	//chat box
	function close_chat(id) {
		$("#div_chat_box").find("#chat_box"+id+"").remove();
		count_chat_box--;
		ids.splice(ids.indexOf(id), 1);
		scroll_hs.splice(ids.indexOf(id), 1);
	}

	function minimize_chat(id) {
		$("#chat_box_body"+id+"").slideToggle();
		$("#chat_form"+id+"").slideToggle();
	}

	function reload_chat() {
		for(var x=0; x < ids.length; x++) {
			var user_id = $("[name=chat_user_id"+ids[x]+"]").val();
			if(user_id != "") {
				show_msg(user_id);
			}
		}
		
	}

	function send_msg(id) {
		$.post("<?= base_url('index.php/chat/Chat/send_message') ?>",
				{ user_id: id, msg: $("[name=chat_message"+id+"]").val() },
				function(data) {}
			);
	}

	function show_msg(id) {
		$.post("<?= base_url('index.php/chat/Chat/get_messages') ?>",
			{ user_id: id },
			function(data) {
				var d = JSON.parse(data);
				
				var msg = "";
				for(var x = 0; x < d.msg.length; x++) {
					if(d.msg[x].from_user == true) {
						msg += '<div class="pull-right">\
									<div class="text-right"><span class="chat_time">'+d.msg[x].sent+'</span></div>\
									<div class="chat_msg navy-bg">'+d.msg[x].msg+'</div>\
								</div>';
					} else {
						msg += '<div class="pull-left">\
									<span class="chat_time">'+d.msg[x].sent+'</span>\
									<div class="chat_msg grey_bg">'+d.msg[x].msg+'</div>\
								</div>';
					}
				}

				$("#chat_name"+id+"").text(d.name);
				$("#chat_box_body"+id+"").html(msg);

				if(scroll_hs[ids.indexOf(parseInt(id))] != $("#chat_box_body"+id+"").prop("scrollHeight")) {
					$("#chat_box_body"+id+"").scrollTop($("#chat_box_body"+id+"").prop("scrollHeight"));
				}
			}
		);
	}


	//chat
	function get_users(search) {
		$.post("<?= base_url('index.php/chat/Chat/get_users') ?>", 
				{ search: search },
				function(data) {
					var d = JSON.parse(data);
					var tr = "";
					for(var x = 0; x < d.length; x++) {
						var user_id = d[x].user_id;
						var img = d[x].img;

						if(img != "") {
							img = '<img class="img-circle user_img" src="'+img+'">';
						} else {
							img = '<img class="img-circle user_img" src="<?= base_url() ?>assets/Images/default.png">';
						}

						tr += '<tr class="chat_user" onclick="show_chat('+user_id+')">\
								<td style="width: 20%;">'+img+'</td>\
								<td style="width: 80%;">\
									<div style="word-break: break-all; margin-top: 10px;"><b>'+d[x].name+'</b></div>\
								</td>\
							</tr>';
					}
					$(".tbl tbody").html(tr);
				}
			);
	}


	function get_new_messages() {
		$.post("<?= base_url('index.php/chat/Chat/get_new_messages') ?>", 
				{ },
				function(data) {
					var d = JSON.parse(data);
					var tr = "";
					for(var x = 0; x < d.length; x++) {
						var user_id = d[x].user_id;

						tr += '<tr class="chat_user" onclick="show_chat('+user_id+')">\
								<td style="width: 20%; text-align: center;"><span class="fa fa-envelope" style="font-size: 20px;"></span></td>\
								<td style="width: 80%;">\
									<b>'+d[x].name+'</b><br>\
									<small>'+d[x].sent+'</small>\
									<div style="word-break: break-all;"><i>'+d[x].msg+'</i></div>\
								</td>\
							</tr>';
					}
					$(".tbl_msg tbody").html(tr);
				}
			);
	}

	function get_all_unread() {
		$.post("<?= base_url('index.php/chat/Chat/get_all_unread') ?>",
				{},
				function(data) {
					var d = JSON.parse(data);
					var unread = "";
					if(d != 0) {
						unread = '<span class="badge badge-warning">'+d+'</span>';
					}
					$("#chat_notif").html(unread);
				}
			);
	}

</script>