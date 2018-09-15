<?php 

include_once('common.php');

if (!isset($_GET['action'])) {
	exit;
}


$action = $_GET['action'];

switch ($action) {
	case 'save_step_1':
		save_step_1();
		break;
	case 'save_step_2':
		save_step_2();
		break;
	case 'save_step_3':
		save_step_3();
		break;
	default:
		exit;
		break;
}

function save_step_1() {

	$data = $_POST['step_1'];
	$step_1_data = $data[$_SESSION['calculation_id']];
	$customer_id = $_SESSION['customer_id'];

	global $db;

	if (!isset($step_1_data['notification'])) {
		$step_1_data = array_merge($step_1_data, array(
			'notification' =>  0
		));
	}

	$db->table('customer')->update('customer_id',$customer_id,$step_1_data);

	response(array('status' => true));

}

function save_step_2() {

	$data = $_POST['step_2'];
	$step_2_data = $data[$_SESSION['calculation_id']];
	$calculation_id = $_SESSION['calculation_id'];

	global $db;

	$db->table('calculation')->update('calculation_id',$calculation_id,array(
		'how_many_now' => $step_2_data['how-many-now'],
		'how_many' => $step_2_data['how-many']
	));

	response(array('status' => true));

}

function save_step_3() {

	global $db;

	$technicians = $_POST['technician'];
	$calculation_id = $_SESSION['calculation_id'];

	//delete all the existing technicians
	$db->table('technician')->where(array('calculation_id'=>$calculation_id))->delete();

	foreach ($technicians as $key => $technician) {
		
		$technician['lost_retail'] = 7.6 * $technician['hourly_rate'] * ($technician['productivity']/100) * ($technician['efficiency']/100) * $technician['no_of_days'];
		$technician['recureiment'] = $technician['wage'] * 0.1;
		$technician['onboarding'] = 7.6 * ( $technician['hourly_rate'] * 0.2 ) * 22.7;
		$technician['total'] = $technician['lost_retail'] + $technician['recureiment'] + $technician['onboarding'];
		
		$technician['calculation_id'] = $calculation_id;

		$db->table('technician')->insert($technician);

	}

	$db->table('calculation')->update('calculation_id', $calculation_id, array(
		'temp' => 0
	));

	$db->table('customer')->update('customer_id', $_SESSION['customer_id'], array(
		'temp' => 0
	));

	response(array('status' => true));

}


function response($data) {
	header('Content-Type: application/json');
	echo json_encode($data);
	exit;
}