$(function () {
	$(document).scroll(function () {
		var $nav = $('.navigation');
		$nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
	});
});

$(document).ready(function () {
	$('#table').DataTable();
});

$('.darkbg').click(function () {
	$('.signup').hide();
	$('.signin').hide();
	$(this).fadeOut(1000);
});

function signin() {
	$('.signin').show();
	$('.darkbg').fadeIn(500);
	$('.signup').hide();
}

function tutup() {
	$('.signup').hide();
	$('.signin').hide();
	$('.darkbg').fadeOut(1000);
}

function signup() {
	$('.signin').hide();
	$('.signup').show();
}
