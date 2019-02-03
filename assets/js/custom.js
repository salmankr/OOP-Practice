function navActive(){
	var url = window.location.pathname;
	$('.mynavbar > li > a[href="'+url+'"]').parent().addClass('active');
}
function getPosts(){
	$('.posts-tbl').empty();
	$.ajax({
		url: '../controllers/showPostController.php',
		success: function(response){
		    $('.posts-tbl').append(response);
		}
	})
}
function likeFunction(postID, likeStatus){
	$.ajax({
		url: '../controllers/likesController.php',
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
$(document).ready(function() {
	navActive();
	getPosts();
});