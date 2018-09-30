<?php 

include_once('libs/common.php');

$calculation = get_summary($_GET['id']);
$html = '';
$total = 0;
$html .= '<h1> Calculation Number: '.get_calculation_id($calculation['calculation_id']).'</h1>';
$html .= '<table class="table">
          <thead>
            <tr>
              <th>Technician #</th>
              <th>Lost Retail Labour</th>
              <th>Recruitment Cost</th>
              <th>Onboarding Cost</th>
              <th>Total Cost</th>
            </tr>
          </thead>
          <tbody>';
foreach ($calculation['technicians'] as $key => $technician) {
$html .='            <tr>
              <td>Technician '. ($key+1) .'</td>
              <td><input type="text" class="form-control" disabled value="'.myMoney($technician['lost_retail']).'"></td>
              <td><input type="text" class="form-control" disabled value="'.myMoney($technician['recureiment']).'"></td>
              <td><input type="text" class="form-control" disabled value="'.myMoney($technician['onboarding']).'"></td>
              <td><input type="text" class="form-control" disabled value="'.myMoney($technician['total']).'"></td>
            </tr>';
              $total += $technician['total'];
            } 
$html .='            <tr>
              <td></td><td></td><td></td><td></td>
              <td><input type="text" class="form-control" disabled value="'.myMoney($total).'"></td>
            </tr>
          </tbody>
        </table>';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<script>
	
	printDiv(`<?php echo $html ?>`);

	function printDiv(printContents) {

	     document.body.innerHTML = printContents;

	     window.print();
	}

	window.onafterprint = function(){
	   window.history.back();
	}

</script>

</body>
</html>

