$('.owl-carousel').owlCarousel({
	loop: true,
	margin: 0,
	responsiveClass: true,
	responsive: {
		0: {
			items: 1,
		},
		768: {
			items: 2,
		},
		1100: {
			items: 3,
		},
		1400: {
			items: 4,
			loop: false,
		},
	},
});

// rating
$('#input-id').rating();
$('#input-id').rating({
	size: 'xs',
	showClear: false,
});
