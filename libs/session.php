<?php 

session_start();

function session($key,$value=false){
	if($value){
		$_SESSION[$key] = $value;
	}
	return isset($_SESSION[$key]) ? $_SESSION[$key] : false;
}
function flash($key,$value=false){
	if($value){
		$_SESSION[$key] = $value;
		return;
	}
	if(isset($_SESSION[$key])){
		$temp = $_SESSION[$key];
		unset($_SESSION[$key]);
		return $temp;
	}
	return false;
}

function post_data($index){
	return isset($_POST[$index]) ? trim($_POST[$index]) : '';
}

function date_to_mysql($date = null){
	if($date) {
		return date('Y-m-d H:i:s',strtotime($date));
	}else{
		return date('Y-m-d H:i:s',time());
	}
}

function mysql_to_date($date){
	return date('d/m/Y H:i:s',strtotime($date));
}

function debug($data){
	echo '<pre>';
	print_r($data);
	echo '</pre>';
}


function myMoney($number) {
	return number_format($number, 2, '.', ',');;
}