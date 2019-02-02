function navActive(){
	var url = window.location.pathname;
	$('.mynavbar > li > a[href="'+url+'"]').parent().addClass('active');
}
function getPosts(){
	$.ajax({
		url: '../controllers/showPostController.php',
		success: function(response){
			console.log(response);
			$('.posts-tbl').append(response);
		}
	})
	
}
$(document).ready(function() {
	navActive();
	getPosts();
});