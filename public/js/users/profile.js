$(document).ready(function() {
	$('.editAddress').on('click', function() {
		$('.addressForm').show(500);
		$('.address').hide(500);
		$(this).hide(500);
	});

	$('.addressClose').on('click', function() {
		$('.addressForm').hide(500);
		$('.editAddress, .address').show(500);
	});
});