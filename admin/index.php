<?php include('header.php') ?>

<main>
	
	<div class="container">
		
		<div class="row">
			<div class="col-md-6 col-md-offset-3" style="padding-top: 80px;">
				<h1 class="text-center">Admin Login</h1>
				<form action="home.php" method="post">
				  <div class="form-group row">
				    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
				    <div class="col-sm-10">
				      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
				    <div class="col-sm-10">
				      <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
				    </div>
				  </div>
				  <div class="form-group row">
				    <div class="col-sm-10 col-md-offset-2">
				      <button type="submit" class="btn btn-primary">Login</button>
				    </div>
				  </div>
				</form>
			</div>
		</div>

	</div>

</main>

<?php include('footer.php') ?>


	