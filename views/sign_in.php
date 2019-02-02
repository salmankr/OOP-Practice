<?php
include "subviews/header.php";
if (isset($_SESSION['email'])) {
	header("location:" .base_uri);
}else{
?>
<div class="container">
	<div class="row">
		<div class="col-lg-12 mt-3">
			<form method="post" action="../controllers/signinController.php">
				<div class="form-group">
				  <label for="email">Email</label>
				  <input type="email" name="email" class="form-control" placeholder="Enter email"  required>
				</div>
				<div class="form-group">
	   		      <label for="password">Password</label>
	   		      <input type="password" name="password" class="form-control" placeholder="Enter Password"  required>
	   		    </div>
	   		    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
			</form>
			<?php
			if (isset($_SESSION['ErrMsg'])) {
				?>
			    <div class="alert alert-danger mt-2" role="alert">
			      <?php echo $_SESSION['ErrMsg']; ?>
			    </div>
				<?php
				unset($_SESSION['ErrMsg']);
			}
			?>
		</div>
	</div>
</div>
<?php
include "subviews/footer.php";
}
?>