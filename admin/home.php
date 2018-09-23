<?php include('header.php') ?>

<?php 
  global $db;

  if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit;
  } 

  $sql = "
    SELECT
      cal.*,
      cus.*
    FROM
      calculation cal
    LEFT JOIN customer cus ON cus.customer_id = cal.customer_id
    WHERE
      cal.temp = 0
      AND cus.temp = 0
    ORDER BY 
      cal.datetime DESC
  ";

  $results = $db->query($sql);

?>

<main>
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <h1 class="text-center">View Business Case</h1>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Calculation Number</th>
              <th>Bussiness Name</th>
              <th>Appointment Date</th>
              <th></th>
            </tr>
          </thead>
          <tbody> 
            <?php if (!count($results) > 0) { ?>
            <?php } else { ?>
              <?php foreach ($results as $key => $result): ?>
                <tr>
                  <td><?php echo get_calculation_id($result['calculation_id']) ?></td>
                  <td><?php echo $result['bus_name']; ?></td>
                  <td><?php echo $result['call_appointment'] == '0000-00-00 00:00:00' ? '' : $result['call_appointment']; ?></td>
                  <td>
                    <a href="view.php?id=<?php echo $result['calculation_id'] ?>" class="btn btn-primary">View</a>
                    <a href="delete.php?id=<?php echo $result['calculation_id'] ?>" class="btn btn-danger">Delete</a>
                  </td>
                </tr>
              <?php endforeach ?>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>
<?php include('footer.php') ?>