<?php include('header.php') ?>

<?php 

 if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit;
  } 


$calculation = get_summary($_GET['id']);

// debug($calculation);

$total = 0;
 ?>

<main>
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <p class="text-center">Calculation Number: <?php echo get_calculation_id($calculation['calculation_id']) ?></p>
        <table class="table table-hover view-table">
          <tbody> 
            <tr>
              <td>Name</td>
              <td><?php echo $calculation['name']; ?></td>
            </tr>
            <tr>
              <td>Business Name</td>
              <td><?php echo $calculation['bus_name']; ?></td>
            </tr>
            <tr>
              <td>Position</td>
              <td><?php echo $calculation['position']; ?></td>
            </tr>
            <tr>
              <td>Owner?</td>
              <td>
                <div id="gender" class="btn-group" data-toggle="buttons">
                  <label class="btn <?php echo ($calculation['owner'] == 1 ? 'btn-primary' : 'btn-default' ) ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                    <input type="radio" name="gender" value="male"> &nbsp; Owner &nbsp;
                  </label>
                  <label class="btn <?php echo ($calculation['owner'] == 2 ? 'btn-primary' : 'btn-default' ) ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                    <input type="radio" name="gender" value="female"> Employee
                  </label>
                </div>
              </td>
            </tr>
            <tr>
              <td>Email</td>
              <td><?php echo $calculation['email']; ?></td>
            </tr>
            <tr>
              <td>Mobile</td>
              <td><?php echo $calculation['contact']; ?></td>
            </tr>
            <tr>
              <td>How many techicians do you have?</td>
              <td><?php echo $calculation['how_many_now']; ?></td>
            </tr>
            <tr>
              <td>How many technicians are you presently missing?</td>
              <td><?php echo $calculation['how_many']; ?></td>
            </tr>
            <?php foreach ($calculation['technicians'] as $key => $technician): ?>
              <tr>
                <td colspan="2" class="text-center">Technican <?php echo $key+1 ?></td>
              </tr>
              <tr>
                <td>Technician Annual Wage ($)</td>
                <td>$<?php echo myMoney($technician['wage']); ?></td>
              </tr>
              <tr>
                <td>Technicians Productivity (%)</td>
                <td>$<?php echo myMoney($technician['productivity']); ?></td>
              </tr>
              <tr>
                <td>Technicians Efficiency (%)</td>
                <td>$<?php echo myMoney($technician['efficiency']); ?></td>
              </tr>
              <tr>
                <td>Retail Labour Rate ($)</td>
                <td>$<?php echo myMoney($technician['lost_retail']); ?></td>
              </tr>
              <tr>
                <td>Number of Days Position Vacant</td>
                <td>$<?php echo myMoney($technician['no_of_days']); ?></td>
              </tr>
            <?php endforeach ?>
            
          </tbody>
        </table>
        
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
            <?php foreach ($calculation['technicians'] as $key => $technician) { ?>
            <tr>
              <td>Technician <?php echo $key+1 ?></td>
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
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">
        <a href="#" class="btn btn-primary">Download</a>
        <a href="#" class="btn btn-primary">Print</a>
      </div>
    </div>
  </div>
</main>
<?php include('footer.php') ?>