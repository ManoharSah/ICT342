<?php include('header.php') ?>
<?php 

$error = false;

$calculation_number = $_GET['calculation_number'];

$code = substr($calculation_number, 0, 2);

if ($code != 'SC') {
  $summary = get_summary($calculation_number); 
  $calculation_number = 'SC'.$calculation_number;
} else {
  $_calculation_number = substr($calculation_number, 2, 8);
  $summary = get_summary($_calculation_number); 
}

if (strlen($calculation_number) != 10) {
  $error = true;
}

if(empty($summary)) {
  $error = true;
}

// debug($summary);
$total = 0;
?>
<main>
	
	<div class="container">
    <?php if (!$error) { ?>
		<div class="row" style="padding-top: 50px;">
        <table class="table">
          <thead>
            <tr>
              <th>Technician #</th>
              <th>Lost Retail Labour</th>
              <th>Recruitment Cost</th>
              <th>Onboarding Cost</th>
              <th>Total Cost</th>
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

        <div class="row">
          <div class="col-md-12 text-center">
            <a href="#" class="btn btn-primary">Download</a>
            <a href="#" class="btn btn-primary">Print</a>
          </div>
        </div>
    </div>
    <?php } else { ?>
      <div class="row">
        <div class="col-md-12 text-center">
          <h1>Error in calculation number</h1>
        </div>
      </div>
    <?php } ?>
  </div>

</main>

<?php include('footer.php') ?>


	