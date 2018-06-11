//JAVASCRIPT
const openFileProfile = function(event)
{
	const input = event.target;

	const reader = new FileReader();
	reader.onload = () =>
	{
		const dataURL = reader.result;
		const output = document.getElementById('productimage');
		output.src = dataURL;
	};
	reader.readAsDataURL(input.files[0]);
};


//JQUERY
$(document).ready(function() {

	$('#newProduct').on('click', function() {
		$('#newProductPanel').toggle(500);
	});

	$('.getEdit').on('click', function() {
		$('#productPanel').children('div').hide(500);
		setTimeout(function() {
			$('#productPanel').children('div').remove();
		}, 500);
		const id = $(this).data('id');
		setTimeout(function() {
			fetch('/admin/products/getEdit/'+id)
			.then((res) => res.text())
			.then((data) => {
				if ($) {}
				$(data).appendTo('#productPanel').show(500);
			});
		}, 510);
	});

	$(document).on('click', '.cancelEdit', function(e) {
		e.preventDefault();
		$('#productPanel').children('div').hide(500);
		setTimeout(function() {
			$('#productPanel').children('div').remove();
		}, 500);
	});
});