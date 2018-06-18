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

const subOptions = function() {
	const id = $('#select').val();
	fetch('/admin/products/suboptions/'+id)
	.then((res) => res.json())
	.then((data) => {
		let output = '';
		data.forEach(function(subcategory) {
			output += `
				<option value="${subcategory.id}">${subcategory.subcategory}</option>
			`;
		});
		$('#selectSub').fadeOut().fadeIn().html(output);
	});
};

const subOptions2 = function() {
	const id = $('#select2').val();
	fetch('/admin/products/suboptions/'+id)
	.then((res) => res.json())
	.then((data) => {
		let output = '';
		data.forEach(function(subcategory) {
			output += `
				<option value="${subcategory.id}">${subcategory.subcategory}</option>
			`;
		});
		$('#selectSub2').fadeOut().fadeIn().html(output);
	});
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

	$('.category').on('click', function() {
		const reveal = $(this).data('reveal');
		$(reveal).toggle(500);
	});

	$('.categoryLink').on('click', function(e) {
		e.preventDefault();
		$('.categoryLink').removeClass('active');
		$(this).addClass('active');
		const id = $(this).data('id');
		fetch('/admin/subcategory/'+id)
		.then((res) => res.json())
		.then((data) => {
			let output = '';
			data.forEach(function(subcategory) {
				output += `
					<div class="row margin0">
						<div class="col m10 padding0">
							<a class="collection-item" data-id="${subcategory.id}">${subcategory.subcategory}</a>
						</div>
						<div class="col m2 padding0 center-align white paddingTop13">
							<a href="#subcategoryModal${subcategory.id}" class="close red-text 
							center-align modal-trigger">
							<i class="material-icons center">close</i></a>
						</div>
					</div>
				`;
			});
			$('#subcat > div').first().html(output);
			$('#subcat').show(500);
		});
	});
});