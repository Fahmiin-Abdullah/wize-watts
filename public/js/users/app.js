// JAVASCRIPT
const collapse = document.querySelectorAll('.collapsible');
M.Collapsible.init(collapse);

const dropdown = document.querySelectorAll('.dropdown-trigger');
M.Dropdown.init(dropdown);

const modal = document.querySelectorAll('.modal');
M.Modal.init(modal);

const tooltip= document.querySelectorAll('.tooltipped');
M.Tooltip.init(tooltip);

const tabs = document.querySelectorAll('.tabs');
M.Tabs.init(tabs);


//JQUERY
$(document).ready(function() {
	$.ajaxSetup({
	  headers: {
	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});

	$('.search').on('keyup', function(e) {
		const value = $(this).val();
		if (value != "") {
			$('.searchDropdown').removeClass('hidden');
		}
	});

	$(document).on('click', function(e) {
		if (!$(e.target).closest('.search').length) {
			$('.searchDropdown').addClass('hidden');
		}
	});

	$('.search').on('keyup', function(e) {
		if (e.keycode === 13) {
			e.preventDefault();
		}
		const value = $(this).val();
		$.ajax({
			type: 'GET',
			url: '/search',
			data: {value: value},
			success: function(data) {
				const products = data.data;
				let htmlString = ``;
				if (products.length === 0) {
					htmlString = `<a class="collection-item darkGrey white-text"><span>No products found! Try another search</span></a>`;
					$('.searchResults').html(htmlString);
					return;
				}

				products.forEach(product => {
					htmlString += `
					<a href="/products/view/${product.id}" class="collection-item darkGrey white-text paddingAll10">
						<div class="row margin0">
							<div class="col s8 m8 left-align">
								<p>${product.name}</p>
							</div>
							<div class="col s4 m4 right-align">
								<p>${product.pricing}</p>
							</div>
						</div>
					</a>
					`;
				})
				$('.searchResults').html(htmlString);
			}
		});
	});

	$('.footerWidget').on('click', function(e) {
		e.preventDefault();
		const link = $(this).data('reveal');
		$('.linkReveal').hide(500);
		$(link).show(500);
	});

	$('.account').on('click', function() {
		const target = $(this).data('account');
		$('.dropdownContent').hide(500);
		$(target).show(500);
	});

	$('.close').on('click', function() {
		const close = $(this).data('close');
		$(close).hide(500);
	});

	$('.favorite').on('click', function(e) {
		e.preventDefault();
		const favid = $(this).data('favid');
		$.ajax({
			method: 'POST',
			url: '/favorite/'+favid,
			data: {favid: favid},
			success: function(data) {
				if (data == 1) {
					$('#fav'+favid).removeClass('yellow');
				} else {
					$('#fav'+favid).addClass('yellow');
				}
			}
		});
	});

	$('.quantity').on('change', function() {
		const max = $(this).data('max');
		const qty = $(this).val();
		const id = $(this).data('id');
		if (qty > max) {
			$(id).addClass('disabled');
		} else {
			$(id).removeClass('disabled');
		}
	});
});