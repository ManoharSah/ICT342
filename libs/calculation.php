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
		'position' => '',
		'owner' => 1,
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
		'call_appointment' => date_to_mysql(),
		'totalcost' => 0,
		'temp' => 1
	));

	return $temp_calculation_id;
}

function get_calculation_data($calculation_id, $temp = false) {
	global $db;

	$sql = "
		SELECT 
			cal.*,
			cus.*
		FROM 
			calculation cal
		LEFT JOIN customer cus ON cus.customer_id = cal.customer_id
		WHERE 
			cal.calculation_id = {$calculation_id}
	";

	if($temp) {
		$sql .= " AND cal.temp = 0 AND cus.temp = 0";
	}

	$data = $db->query($sql);

	if (count($data) > 0) {
		return $data[0];
	}

	return false;

}

function get_technicians($calculation_id) {
	global $db;
	return $db->table('technician')->where(array('calculation_id'=>$calculation_id))->results();
}

function get_summary($calculation_id) {
	$calculation = get_calculation_data($calculation_id, true);

	if($calculation) {

		$calculation['technicians'] = get_technicians($calculation_id); 

	}

	return $calculation;
}