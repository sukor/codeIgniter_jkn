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

function encryptInUrl($str){
    $CI =& get_instance();
    $ciphertext = $CI->encryption->encrypt($str);
    $ciphertext = strtr(
        $ciphertext,
        array(
            '+' => '.',
            '=' => '-',
            '/' => '~'
        )
    );
    return $ciphertext;
}
function decryptInUrl($ciphertext){
    $CI =& get_instance();
    $ciphertext = strtr(
        $ciphertext,
        array(
            '.' => '+',
            '-' => '=',
            '~' => '/'
        )
    );
    return $CI->encryption->decrypt($ciphertext);
}









?>