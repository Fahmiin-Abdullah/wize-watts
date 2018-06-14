$(document).ready(function() {
	$('.view').on('click', function() {
		$('#customerPanel').hide(500);
		const id = $(this).data('id');
		fetch('/admin/customer/'+id)
		.then((res) => res.json())
		.then((data) => {
			$('#customerPanel').show(500);
		});
	});

	$('.close').on('click', function() {
		$('#customerPanel').hide(500);
	});
});