<?php include('header.php') ?>

<?php 

 if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit;
  } 

  global $db;
  
  $calculation = get_summary($_GET['id']);

  $sql = "DELETE FROM calculation WHERE calculation_id = ".$_GET['id'];
  $db->query($sql);

  $sql = "DELETE FROM technician WHERE calculation_id = ".$_GET['id'];
  $db->query($sql);

  $customer_id = $calculation['customer_id'];
  $calculation_id = $calculation['calculation_id'];

  $sql = "DELETE FROM customer WHERE customer_id = $customer_id";
  $db->query($sql);

  header("Location: home.php");