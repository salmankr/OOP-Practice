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
            	<h3 class="mt-3">My Posts</h3>
				<table class="table table-hover">
				  <thead>
				    <tr class="table-primary">
				      <th scope="col">#</th>
				      <th scope="col">Name</th>
				      <th scope="col">Description</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody class="userPosts-tbl"></tbody>
				</table>
				<!-- modal start -->
				<div class="modal fade" id="postUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <form method="post">
				        <div class="modal-body" id="postModalbody">
				            <div class="form-group">
				                <label for="postname">Name</label>
				                <input id="updatePostName" type="text" name="post_name" class="form-control" placeholder="Enter Post Name" required>
				            </div>

				            <div class="form-group">
				                <label for="postdescription">Description</label>
				                <input id="updatePostDesc" type="text" name="post_description" class="form-control" placeholder="Enter Post Description" required>
				            </div>
				            <input id="updatePostID" type="hidden" name="postID" required>
				        </div>
				        <div class="modal-footer">
				            <button type="submit" name="submit" class="btn btn-primary" onclick="postUpdate()">Update</button>
				        </div>
				     </form>
				    </div>
				  </div>
				</div>
				<p style="text-align: center;" id="noPostMsg"></p>
			    <?php
                if (isset($_SESSION['delMsg'])) {
            		?>
            	    <div class="alert alert-primary mt-2" id="delPostalert" role="alert">
            	    </div>
            		<?php
                }
                unset($_SESSION['delMsg']);
			    ?>
		</div>
	</div>
</div>
<?php
include "subviews/footer.php";
}
?>