<?php
include "subviews/header.php";
// var_dump($_SESSION);
?>
<div class="container">
	<div class="row">
		<div class="col-lg-12 mt-3">
			<table class="table table-hover">
			  <thead>
			    <tr class="table-primary">
			      <th scope="col">#</th>
			      <th scope="col">Name</th>
			      <th scope="col">Description</th>
			      <th>posted by</th>
			      <?php
                  if (isset($_SESSION['email'])) {
                    ?>
                    <th scope="col">Button</th>
                    <?php
                  }
			      ?>
			      <th scope="col">Likes</th>
			    </tr>
			  </thead>
			  <tbody class="posts-tbl"></tbody>
			</table>
			<div class="modal fade" id="postLikesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Post Liked By</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body" id="postModalbody">
			        
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>
		</div>
	</div>
</div>
<?php
include "subviews/footer.php";
?>