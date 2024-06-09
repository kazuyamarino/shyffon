$(document).ready(function () {
	var table = $("#example").DataTable({
		"sPaginationType": "full_numbers",
		"iDisplayLength": 5,
		"aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
		"stateSave": true,
		"ajax": {
			"url": base_url("crud/data.json") // base_url can be managed in system.js located in the assets/js/config directory
		},
		"columns": [
			{ "data": "id" },
			{ "data": "id" },
			{ "data": "user_code" },
			{ "data": "user_name" },
			{ "data": "user_status" },
			{ "data": "create_date" },
			{ "data": "update_date" },
			{ "data": "additional_date" },
			{ "data": "id" }
		],
		'columnDefs': [
			{
				'targets': 0,
				'checkboxes': {
					'selectRow': true
				}
			},
			{
				"targets": [4],
				"className": "text-center",
				"width": "8%"
			},
			{
				"targets": [1, 2, 5, 6, 7],
				"className": "text-center"
			},
			{
				"targets": [8],
				"className": "text-center",
				"render": function (data, type, full, meta) {
					if (data) {
						return '<div class="action-icon">' +
							'<a id="fetch-btn" href="' + base_url('crud/fetch/' + data) + '"><i class="far fa-edit"></i></a>' +
							'<a id="delete-btn" data-open="delete-modal" data-url="' + base_url('crud/delete/' + data) + '"><i class="far fa-trash-alt"></i></a>' +
							'</div>';
					} else {
						return '';
					}
				}
			}
		],
		'select': {
			'style': 'multi'
		},
		"oLanguage": {
			"oPaginate": {
				"sFirst": "<i class='fas fa-angle-double-left'></i>",
				"sLast": "<i class='fas fa-angle-double-right'></i>",
				"sPrevious": "<i class='fas fa-angle-left'></i>",
				"sNext": "<i class='fas fa-angle-right'></i>"
			}
		}
	});

	// Handle reset button on Datatables
	$("#reset-filter").on("click", function () {
		// reset Datatables filter
		table.search('').columns().search('').draw();

		// clear Datatables state
		table.state.clear();
	});

	// Handle form submission event
	$('#multidelete-frm').on('submit', function (e) {
		var form = this;

		var rows_selected = table.column(0).checkboxes.selected();

		// Iterate over all selected checkboxes
		$.each(rows_selected, function (index, rowId) {
			// Create a hidden element
			$(form).append(
				$('<input>')
					.attr('type', 'text')
					.attr('name', 'admin_id[]')
					.val(rowId)
			);
		});
	});
});
