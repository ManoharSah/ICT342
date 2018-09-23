<?php include('header.php') ?>

<?php 

 if (isset($_SESSION['admin_id'])) {
    header("Location: home.php");
    exit;
  } 


global $db;

$ERROR = "";

if (isset($_POST['username'])) {

	$username = $_POST['username'];
	$password = $_POST['password'];

	$admin = $db->table('admin')->where(array(
		'username' => $username,
		'password' => md5($password)
	))->results(); 

	if (count($admin) > 0) {
		$_SESSION['admin_id'] = $admin[0]['id'];
		header("location: home.php");
		exit;
	} else {
		$ERROR = "Invalid username or password";
	}

}



 ?>

<main>
	
	<div class="container">
		
		<div class="row">
			<div class="col-md-6 col-md-offset-3" style="padding-top: 80px;">
				<h1 class="text-center">Admin Login</h1>
				<form action="index.php" method="post">
					<?php if ($ERROR != '') { ?>
					<div class="alert alert-danger">
						<?php echo $ERROR; ?>
					</div>
					<?php } ?>
				  <div class="form-group row">
				    <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
				    <div class="col-sm-10">
				      <input required type="text" class="form-control" id="inputEmail3" placeholder="Username" 
				      name="username">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
				    <div class="col-sm-10">
				      <input required name="password" type="password" class="form-control" id="inputPassword3" placeholder="Password">
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


	