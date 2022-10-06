$(function () {
	$(document).scroll(function () {
		var $nav = $('.navigation');
		$nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
	});
});

function signin() {
	$('.signin').show();
	$('.signup').hide();
}

function tutup() {
	$('.signup').hide();
	$('.signin').hide();
}

function signup() {
	$('.signin').hide();
	$('.signup').show();
}
