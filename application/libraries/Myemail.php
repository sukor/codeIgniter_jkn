<?php
defined('BASEPATH') OR exit('No direct script access allowed');


 class Myemail{


function __construct(){
	$this->obj=&get_instance();
}


//sendemailjpn
	function sendemailjpn($data){

	$CI=$this->obj;

$CI->load->library('email'); 


if($CI->config->item('smtp_on')){
		$config['smtp_host']=$CI->config->item('smtp_host');
		$config['smtp_user']=$CI->config->item('smtp_user');
		$config['smtp_pass']=$CI->config->item('smtp_pass');
		$config['smtp_port']=$CI->config->item('smtp_port');
		$config['protocol']=$CI->config->item('protocol');
		$config['starttls']=FALSE;
		$config['mailtype']="html";
		$config['charset']='iso-8859-1';
		$CI->email->initialize($config);
		foreach ($data as $r) {
			
			$CI->email->clear();
			$CI->email->set_newline("\r\n");
			$CI->email->from($r['from'],$r['from_name']);
			$CI->email->to($r['to']);
			$CI->email->cc($r['cc']);
			$CI->email->subject($r['subject']);
			$CI->email->message($r['message']);
			if($CI->email->send()){
				return true;
			}else{
				show_error($CI->email->print_debugger());
				return false;
			}
		}
	
	}	




	}

//end of sendemaljpn


}


?>