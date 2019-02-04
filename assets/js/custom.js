//nav active item
function navActive(){
	var url = window.location.pathname;
	$('.mynavbar > li > a[href="'+url+'"]').parent().addClass('active');
}
// all posts
function getPosts(){
	$('.posts-tbl').empty();
	$.ajax({
		url: '../controllers/showPostController.php',
		success: function(response){
		    $('.posts-tbl').append(response);
		}
	})
}
function userLikeFunction(postID, likeStatus){
	$.ajax({
		url: '../controllers/userLikesController.php',
		data: {
			postID : postID,
			likeStatus: likeStatus
		},
		success: function(response){
			getPosts();
			if (response == 1) {
				alert('Post Liked');
			}else{
				alert('Post Disliked');
			}
		}
	})
}
function postLikesFunction(postID){
	$.ajax({
		url: '../controllers/postLikesController.php',
		data: {postID : postID},
		success: function(response){
			console.log(response);
			$('#postModalbody').html(response);
			$('#postLikesModal').modal('show');
		}
	})
}
// user specific posts
function getUserPosts(){
	$('.userPosts-tbl').empty();
	$.ajax({
		url: '../controllers/userPostsController.php',
		success: function(response){
			// console.log(response);
			if (response == 0) {
				$('#noPostMsg').html('You did not post anything yet!');
		    }else{
		    	$('.userPosts-tbl').html(response);

		    }
		}
	})
}
function postDelete(postID){
	$.ajax({
		url: '../controllers/deletePostController.php',
		data: {postID: postID},
		success: function(response){
			getUserPosts();
			console.log(response);
			alert('your Post has been deleted!')
		}
	})
}
function getUpdatePost(postID){
	$.ajax({
		url: '../controllers/getUpdatePostController.php',
		data: {postID: postID},
		success: function(response){
			var res = JSON.parse(response)
			console.log(res);
			$('#updatePostName').val(res.name);
			$('#updatePostDesc').val(res.desc);
			$('#updatePostID').val(postID);
			$('#postUpdateModal').modal('show');
		}
	})
}
function postUpdate(){
	var postID = $('#updatePostID').val();
	var name = $('#updatePostName').val();
	var description = $('#updatePostDesc').val();
	$.ajax({
		url: '../controllers/updatePostController.php',
		type: 'POST',
		data: {
			postID: postID,
			postName: name,
			postDesc: description
		},
		success: function(response){
			console.log(response);
			alert('Your Post Updated');
		}
	})
	
}


//document ready function
$(document).ready(function() {
	navActive();
	getPosts();
	getUserPosts();
});