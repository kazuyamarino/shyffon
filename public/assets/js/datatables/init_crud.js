// This is just example for making table with some records.
$(document).ready(function() {
	var table = $("#example").DataTable({
		"sPaginationType": "full_numbers",
		"iDisplayLength": 5,
		"aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
		"stateSave": true,
		"ajax": {
			"url": base_url("crud/data.json")  // base_url can be managed in main.js located in the Template/js/ folder
		},
		"columns": [
            { "data": "id" },
			{ "data": "id" },
            { "data": "user_code" },
            { "data": "user_name" },
            { "data": "user_status" },
            { "data": "create_date" },
            { "data": "update_date" },
            { "data": "adds_date" },
			{ "data": "id" }
        ],
		'columnDefs': [
			{
				"targets": [0],
				"className": "text-center",
				"render": function ( data, type, full, meta ) {
					if (data) {
						return 	'<div class="sub-checkbox">'+
								'<input name="admin_id[]" type="checkbox" value=' + data + '>'+
								'</div>';
					} else {
						return '';
					}
				},
				"searchable": false,
				"orderable": false,
				"width": "5%"
			},
			{
				"targets": [4],
				"className": "text-center",
				"width": "8%"
			},
			{
				"targets": [1,2,5,6,7],
				"className": "text-center"
			},
			{
				"targets": [8],
				"className": "text-center",
				"render": function ( data, type, full, meta ) {
					if (data) {
						return '<div class="action-icon">'+
									'<a id="fetch-btn" href="'+ base_url('crud/fetch/'+ data) +'"><i class="far fa-edit"></i></a>'+
									'<a id="delete-btn" data-open="delete-modal" data-url="'+ base_url('crud/delete/'+ data) +'"><i class="far fa-trash-alt"></i></a>'+
								'</div>';
					} else {
						return '';
					}
				}
			}
		],
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
	$("#reset-filter").on("click", function(e) {
		// reset Datatables filter
		table.search('').columns().search('').draw();

		// reset select-all indeterminate to false
		var checkSelAll  = $('#select-all').get(0);
		checkSelAll.indeterminate = false;

		var rows = table.rows({ 'search': 'applied' }).nodes();
		$('input[type="checkbox"]', rows).prop('checked', false);
		e.stopPropagation();
	});


	// Handle click on "Select all" control
	$('#select-all').on('click', function(e){
		// Check/uncheck all checkboxes in the table
		var rows = table.rows({ 'search': 'applied' }).nodes();
		$('input[type="checkbox"]', rows).prop('checked', this.checked);
		e.stopPropagation();
	});

	// Handle click on checkbox to set state of "Select all" control
	table.on('click', 'input[type="checkbox"]', function(e){
		var $checkBoxChecked    = $('input[type="checkbox"]:checked');
		var checkSelAll  = $('#select-all').get(0);

		if($checkBoxChecked.length === 0) {
			checkSelAll.checked = false;
			if('indeterminate' in checkSelAll) {
				checkSelAll.indeterminate = false;
			}
		} else if (checkSelAll.checked) {
			checkSelAll.checked = false;
			if('indeterminate' in checkSelAll) {
				checkSelAll.indeterminate = true;
			}
		} else if (this.checked) {
			checkSelAll.indeterminate = true;
		}

		e.stopPropagation();
	});
});
