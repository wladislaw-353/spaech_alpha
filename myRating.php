<?
session_start();
include 'config.php';
include 'library/main.php';
include 'library/blocks.php';
$currentUser = unserialize($_SESSION['user']);
$page_title = "myRating";
if(!isset($_SESSION['user'])){
	header('Location: /index.php');
}
include 'parts/inner_header.php';
include 'parts/inner_content.php';
include 'parts/inner_mobile_menu.php';?>
<!-- тут должен быть футер -->

<script>
	if(window.location.href == 'https://spaech.com/myRating.php#contacts') {
		$('#btn-contacs').addClass('active');
		$('.tab-content.contacts').css('display', 'flex');
		$('.filter-wrapper').css('display', 'flex');
		$('#btn-contacs').addClass('active');
		$('#btn-categories').removeClass('active');
		$('.tab-content categories').hide();
		$('html, body').animate({
			scrollTop: ($('.tabs').offset().top - 60)
		}, 500);
	}
</script>