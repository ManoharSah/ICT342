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

	$temp_calculation_id = 0;
	
	do{

		$temp_calculation_id = mt_rand( 10000000, 99999999);
		$calculation = $db->table('calculation')->where(array('calculation_id'=>$temp_calculation_id))->row();
	
	}while(count($calculation) > 0);


	$db->table('calculation')->insert(array(
		'calculation_id' => $temp_calculation_id,
		'customer_id' => $temp_customer_id,
		'datetime' => date_to_mysql(),
		'totalcost' => 0,
		'temp' => 1
	));
	
	return $temp_calculation_id;
}