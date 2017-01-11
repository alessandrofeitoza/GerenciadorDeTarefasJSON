<?php
	function message_error($msg){
		//instanciando o codeigniter
		$ci = & get_instance();

		$alert['msg'] = $msg;
		$alert['title'] = "Erro";
		$alert['class'] = "danger";

		$ci->load->view('public/alert', $alert);

		return false;
	}

	function message_success($msg){
		$ci = & get_instance();

		$alert['msg'] = $msg;
		$alert['title'] = "Sucesso";
		$alert['class'] = "info";

		$ci->load->view('public/alert', $alert);

		return false;

	}

	function validate_message(){
		$ci = &get_instance();

		if($ci->session->flashdata("error")){
			message_error($ci->session->flashdata("error"));
		}elseif($ci->session->flashdata("success")){
			message_success($ci->session->flashdata("success"));
		}
	}
?>
