// JAVASCRIPT
const collapse = document.querySelectorAll('.collapsible');
M.Collapsible.init(collapse);

const dropdown = document.querySelectorAll('.dropdown-trigger');
M.Dropdown.init(dropdown);

const modal = document.querySelectorAll('.modal');
M.Modal.init(modal);


//JQUERY
$(document).ready(function() {
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
});