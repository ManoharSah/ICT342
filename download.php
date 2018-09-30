<?php 

include_once('libs/common.php');
require_once 'dompdf/lib/html5lib/Parser.php';
require_once 'dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();

use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

$html = '';

$calculation = get_summary($_GET['id']);

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


$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream($_GET['id'].'_'.time());