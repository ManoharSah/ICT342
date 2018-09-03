<?php include('header.php') ?>

<main>
	
	<div class="container">
		<div class="row" style="padding-top: 150px;">
      <form action="summary.php" class="form-horizontal form-label-left">
        <div class="form-group">
          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Please insert your calculation number *</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-6 col-md-offset-3">
            <input class="btn btn-primary" type="submit" value="Next">
          </div>
        </div>      
      </form>
    </div>
  </div>

</main>

<?php include('footer.php') ?>


	