<?php include('header.php') ?>
<?php 


$book = $_GET['book'];

$is_booked = ($book != 'Finish'); 

$calculation = get_calculation_data($_SESSION['calculation_id']);

if ($is_booked) {

  $format = 'm/d/Y h:i A';

  $datetime = DateTime::createFromFormat($format, $_GET['datetime']);

  global $db;

  $db->table('calculation')->update('calculation_id', $_SESSION['calculation_id'], array(
    'call_appointment' => $datetime->format('Y-m-d h:i:s')
  ));

}

// send to client
$to      = $calculation['email'];
$subject = 'Confirmation';
$message = "Congrats!! Your application was successful. Your reference number is ".get_calculation_id($calculation['calculation_id']);

if ($is_booked) {
  $message .= " Your appointment is booked at ".$datetime->format('h:iA')." on ".$datetime->format('d F, Y').". One of our Solutions Culture staff will call you on ".$calculation['contact'];
}

$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

// send to admin
$admin_email = 'admin@example.com';
$subject = 'New Business Case';
$message = "New Business Case registed with reference number is ".get_calculation_id($calculation['calculation_id']);
$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($admin_email, $subject, $message, $headers);

?>
<main>
	
	<div class="container">
    
    <div class="row">
      
      <div class="col-md-4 col-md-offset-4">
        <div class="alert alert-success text-center">
          Calculation Reference Number: SC<?php echo $_SESSION['calculation_id']; ?>  
        </div>
        <?php if ($is_booked) { ?>
        <p style="font-size: 16px !important;">
          Thank you, <br>
          Your appointment is booked at <strong><?php echo $datetime->format('h:iA') ?> on <?php echo $datetime->format('d F, Y') ?></strong>. One of our Solutions Culture staff will call you on <?php echo $calculation['contact'] ?>.
        </p>
        <?php } ?>
      </div>
      <div class="col-md-12 text-center form-group" style="margin-top: 20px;">
        <a href="download.php?id=<?php echo $_SESSION['calculation_id']; ?>" class="btn btn-primary">Download</a>
        <a href="print.php?id=<?php echo $_SESSION['calculation_id']; ?>" class="btn btn-primary">Print</a>
      </div>
    </div>

  </div>

</main>

<?php $summary = get_summary($_SESSION['calculation_id']); $total = 0; ?>

<table border="1" style="display: none;" id="summary">
  <thead>
    <tr>
      <th>Technician #</th>
      <th>
        Lost Retail Labour
        <a href="#" data-toggle="tooltip" data-placement="top" title="This is for lost retail labour"><i class="glyphicon glyphicon-question-sign"></i></a>  
      </th>
      <th>
        Recruitment Cost
        <a href="#" data-toggle="tooltip" data-placement="top" title="This is for lost retail labour"><i class="glyphicon glyphicon-question-sign"></i></a>  
      </th>
      <th>
        Onboarding Cost
        <a href="#" data-toggle="tooltip" data-placement="top" title="This is for lost retail labour"><i class="glyphicon glyphicon-question-sign"></i></a>  
      </th>
      <th>
        Total Cost
        <a href="#" data-toggle="tooltip" data-placement="top" title="This is for lost retail labour"><i class="glyphicon glyphicon-question-sign"></i></a>  
      </th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($summary['technicians'] as $technician) { ?>
    <tr>
      <td>Technician 1</td>
      <td><input type="text" class="form-control" disabled value="<?php echo myMoney($technician['lost_retail']); ?>"></td>
      <td><input type="text" class="form-control" disabled value="<?php echo myMoney($technician['recureiment']); ?>"></td>
      <td><input type="text" class="form-control" disabled value="<?php echo myMoney($technician['onboarding']); ?>"></td>
      <td><input type="text" class="form-control" disabled value="<?php echo myMoney($technician['total']); ?>"></td>
      <?php $total += $technician['total']; ?>
    </tr>
    <?php } ?>
    <tr>
      <td></td><td></td><td></td><td></td>
      <td><input type="text" class="form-control" disabled value="<?php echo myMoney($total); ?>"></td>
    </tr>
  </tbody>
</table>

<?php include('footer.php') ?>


	