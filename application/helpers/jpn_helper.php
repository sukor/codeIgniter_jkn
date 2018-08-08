<?php
defined('BASEPATH') OR exit('No direct script access allowed');


function test_date($date){

	$datetime=strtotime($date);

	return date('d-m-Y',$datetime);

}




?>