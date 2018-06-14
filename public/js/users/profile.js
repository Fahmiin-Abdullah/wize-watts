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

	$('.profile').on('click', function(e) {
		e.preventDefault();
		$('.information').hide(500);
		const id = $(this).data('id');
		const reveal = $(this).data('reveal');
		fetch('/profile/info/'+id)
		.then((res) => res.text())
		.then((data) => {
			const info = JSON.parse(data);
			$(reveal).show(500);
			if ((info.firstname && info.lastname) != null) {
				$('.fullname').text(info.firstname+' '+info.lastname);
			}
			$('.username').text(info.name);
			$('.email').text(info.email);
			$('.bday').text(info.bday);
			$('.phone').text(info.phone);
			$('.address').text(info.address);
		});
	});

	$('.close').on('click', function() {
		$('.information').hide(500);
	});

	$('#editFavlist').on('click', function() {
		$('.editFavlist').toggle(500);
	});

	$('.favorite').on('click', function() {
		const id = $(this).data('id');
		$(id).hide(500);
		setTimeout(function() {
			$(id).remove();
		}, 500);
	});
});