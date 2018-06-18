$(document).ready(function() {
	$('.view').on('click', function() {
		$('#customerPanel').hide(500);
		const id = $(this).data('id');
		fetch('/admin/customer/'+id)
		.then((res) => res.json())
		.then((data) => {
			$('#customerPanel').show(500);
			let output = '';
			data.forEach(function(order) {
				output += `
					<tr>
						<td class="center"><a href="#cartModal${order.id}" class="modal-trigger">${order.id}</a></td>
						<td class="center">${order.total - order.shipping}</td>
						<td class="center">${order.shipping}</td>
						<td class="center">${order.total}</td>
						<td class="center">${order.payment}</td>
						<td class="center">${order.status}</td>
					</tr>
				`;
				$('.orderHistoryModal').attr('id', 'cartModal'+order.id)
			});
		});
	});

	$('.close').on('click', function() {
		$('#customerPanel').hide(500);
	});
});