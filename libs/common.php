<?php 

date_default_timezone_set('Australia/Melbourne');

include('session.php');
include('config.php');
include('db.php');
include('calculation.php');

$db = new DB();

global $db;