<?php include('header.php') ?>
<?php 

// reset any calculation id in session
$_SESSION['calculation_id'] = false;

 ?>
<main>
	
	<div class="container">
		
		<div class="row" style="padding-top: 0px;">
			<div class="col-md-6 col-md-offset-3">
				<div class="well well-sm">
				  <h3>What is Staff Turn Calculator?</h3>
				  <p>The primary goal of this calculator is to provide an insight into what staff turn actually cost to automotive business. For example budgeting for technician Holidays (they are away for 4 weeks, so this is the impact to my monthly target in that time)  - Used to Justify pay rise request to business owner (if they leave it costs us this much vs $xx for the pay rise)  - Used to identify the cost of sacking the technician vs the cost of their poor work/return work (ie If we sack them it might cost us $xx, but to keep them on with the mistakes they make costds us $YY)  <a href="" class="green_link" data-toggle="modal" data-target="#myModal" style="font-weight: bold;">View Examples.</a></p>
				</div>
			</div>
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

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Examples</h4>
      </div>
      <div class="modal-body">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta deserunt veniam est obcaecati aut animi consequatur dolorum officia quae maxime porro nulla, tempore eligendi fugiat sint magnam, facilis aliquam? Veritatis.
      </div>
    </div>
  </div>
</div>

<?php include('footer.php') ?>


	