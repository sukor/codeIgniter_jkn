<?php
defined('BASEPATH') OR exit('No direct script access allowed');


function test_date($date){

	$datetime=strtotime($date);

	return date('d-m-Y',$datetime);

}

function dprint($d){
echo "<pre>";
print_r($d);
echo "</pre>";
}









?>