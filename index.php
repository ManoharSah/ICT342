<?php include('header.php') ?>
<?php 

// reset any calculation id in session
$_SESSION['calculation_id'] = false;

 ?>
<main>
	
	<div class="container">
		
		<div class="row" style="padding-top: 150px;">
			<div class="col-md-6 col-md-offset-3">
				<a href="estimate.php" class="btn btn-block btn-primary">
					GET A NEW STAFF TURN COST ESTIMATE($)
				</a>
			</div>
			<div class="col-md-6 col-md-offset-3">
				<a href="existing.php" class="btn btn-block btn-primary">
					RETRIEVE AN EXISTING STAFF TURN COST ESTIMATE($)
				</a>
			</div>
		</div>

	</div>

</main>

<?php include('footer.php') ?>


	