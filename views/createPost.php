<?php
include "subviews/header.php";
if (!isset($_SESSION['email'])) {
	header("location:" .base_uri);
}else{
?>
<div class="container">
	<div class="row">
		<div class="col-lg-12 mt-3">
			<form method="post" action="../controllers/createPostController.php">
			    <div class="form-group">
			        <label for="postname">Name</label>
			        <input type="text" name="post_name" class="form-control" placeholder="Enter Post Name" required>
			    </div>

			    <div class="form-group">
			        <label for="postdescription">Description</label>
			        <input type="text" name="post_description" class="form-control" placeholder="Enter Post Description" required>
			    </div>
			    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
			</form>
			<?php
            if (isset($_SESSION['SucsMsg'])) {
            	?>
                <div class="alert alert-success mt-2" role="alert">
                  <?php echo $_SESSION['SucsMsg']; ?>
                </div>
            	<?php
            }
            unset($_SESSION['SucsMsg']);
			?>
		</div>
	</div>
</div>
<?php
include "subviews/footer.php";
}
?>