<?php include('header.php') ?>

<main>
	
	<div class="container">
		<div class="row" style="padding-top: 150px;">
      <form action="summary.php" class="form-horizontal form-label-left" method="get">
        <div class="form-group">
          <label for="calculation_number" class="control-label col-md-offset-2 col-md-3 col-sm-3 col-xs-12">Please insert your calculation number *</label>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <input id="calculation_number" class="form-control col-md-7 col-xs-12" type="text" name="calculation_number">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-6 col-md-offset-5">
            <input class="btn btn-primary" type="submit" value="Next">
          </div>
        </div>      
      </form>
    </div>
  </div>

</main>

<?php include('footer.php') ?>


	