<?php 

function get_calculation_id($id){
	return sprintf("SC%'.08d\n", $id);
}

function insert_temp_calculation() {
	global $db;
	$temp_customer_id = $db->table('customer')->insert(array(
		'name' => '',
		'bus_name' => '',
		'email' => '',
		'contact' => '',
		'position' => 0,
		'owner' => 0,
		'temp' => 1
	));
	session('customer_id', $temp_customer_id);
	$temp_calculation_id = $db->table('calculation')->insert(array(
		'customer_id' => $temp_customer_id,
		'datetime' => date_to_mysql(),
		'totalcost' => 0,
		'temp' => 1
	));
	return $temp_calculation_id;
	// $db->table('')->insert()
}