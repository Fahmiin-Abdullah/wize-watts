//JAVASCRIPT
const openFileProduct = function(event) {
	const input = event.target;

	const reader = new FileReader();
	reader.onload = () => {
		const dataURL = reader.result;
		const output = document.getElementById('productimage');
		output.src = dataURL;
	};
	reader.readAsDataURL(input.files[0]);
};

const openFileEdit = function(event) {
	const input = event.target;

	const reader = new FileReader();
	reader.onload = () => {
		const dataURL = reader.result;
		const output = document.getElementById('editProductImage');
		output.src = dataURL;
	};
	reader.readAsDataURL(input.files[0]);
};


//JQUERY
$(document).ready(function() {
	$('#newProduct').on('click', function() {
		$('#newProductPanel').slideToggle(500);
	});

	$('.getEdit').on('click', function() {
		$('#editProductPanel').slideUp(500);
		const id = $(this).data('id');
		setTimeout(function() {
			fetch('/admin/products/getEdit/'+id)
			.then((res) => res.text())
			.then((data) => {
				let info = JSON.parse(data);
				$('#editProductPanel > form').attr('action', '/admin/products/edit/' + info.id);
				$('.editName > input').attr('value', info.name);
				$('.editDescription > textarea').text(info.description);
				$('.editPricing > input').attr('value', info.pricing);
				$('.editStock > input').attr('value', info.stock);
				$('.editShipping > input').attr('value', info.shipping);
				$('#editProductImage').attr('src', '/uploads/products/'+info.productimage);
				$('.editDetails > textarea').text(info.details);
				$('#editProductPanel').slideDown(500);
			});
		}, 510);
	});

	$(document).on('click', '.cancelEdit', function(e) {
		e.preventDefault();
		$('#editProductPanel').slideUp(500);
	});
});