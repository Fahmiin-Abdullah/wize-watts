//JAVASCRIPT
const openFileProfile = function(event) {
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
		$('#newProductPanel').toggle(500);
	});

	$('.getEdit').on('click', function() {
		$('#editProductPanel').hide(500);
		const id = $(this).data('id');
		setTimeout(function() {
			fetch('/admin/products/getEdit/'+id)
			.then((res) => res.text())
			.then((data) => {
				let dataArray = JSON.parse(data);
				$('#editProductPanel > form').attr('action', '/admin/products/edit/' + dataArray[0]);
				$('.editName > input').attr('value', dataArray[1]);
				$('.editDescription > textarea').text(dataArray[2]);
				$('.editPricing > input').attr('value', dataArray[3]);
				$('.editStock > input').attr('value', dataArray[4]);
				$('.editShipping > input').attr('value', dataArray[5]);
				$('#editProductImage').attr('src', '/uploads/products/'+dataArray[6]);
				$('#editProductPanel').show(500);
			});
		}, 510);
	});

	$(document).on('click', '.cancelEdit', function(e) {
		e.preventDefault();
		$('#editProductPanel').hide(500);
	});
});