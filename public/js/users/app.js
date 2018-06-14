// JAVASCRIPT
const collapse = document.querySelectorAll('.collapsible');
M.Collapsible.init(collapse);

const dropdown = document.querySelectorAll('.dropdown-trigger');
M.Dropdown.init(dropdown);

const modal = document.querySelectorAll('.modal');
M.Modal.init(modal);

const tooltip= document.querySelectorAll('.tooltipped');
M.Tooltip.init(tooltip);


//JQUERY
$(document).ready(function() {
	$.ajaxSetup({
	  headers: {
	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
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
});