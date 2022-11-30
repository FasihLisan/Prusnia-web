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
