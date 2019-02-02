<?php
 session_start();
 include "../config.php" 
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>My OOP Site</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
				  </button>
				  <div class="collapse navbar-collapse" id="navbarText">
				    <ul class="navbar-nav mr-auto mynavbar">
				      <li class="nav-item">
				        <a class="nav-link" href="<?php echo base_uri; ?>">Home</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="<?php echo base_uri. 'posts.php'; ?>">Posts</a>
				      </li>
				      <?php
                      if (isset($_SESSION['email'])) {
                      	?>
                        <li class="nav-item">
                          <a class="nav-link" href="<?php echo base_uri. 'createPost.php'; ?>">Create Post</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="<?php echo base_uri. '../controllers/signoutController.php'; ?>">Sign Out</a>
                        </li>
                    </ul>
                    <span class="navbar-text">
                      Welcome <?php echo $_SESSION['userName']; ?>!
                    </span>
                      	<?php
                      }else{
                      	?>
				        <li class="nav-item">
				          <a class="nav-link" href="<?php echo base_uri. 'sign_up.php'; ?>">Sign Up</a>
				        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="<?php echo base_uri. 'sign_in.php'; ?>">Sign In</a>
                        </li>
                    </ul>
                      	<?php
                      }
				      ?>
				  </div>
				</nav>
			</div>
		</div>
	</div>