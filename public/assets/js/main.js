/*
Place any jQuery/helper plugins in here.
*/

//  ****************
//  THE DATEPICKER
//  ****************
/* Range Datepicker */
var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

var checkin = $('#first_date').fdatepicker({
	format: 'yyyy-mm-dd',
	onRender: function (date) {
		return date.valueOf() < now.valueOf() ? '' : '';
	}
}).on('changeDate', function (ev) {
	if (ev.date.valueOf() > checkout.date.valueOf()) {
		var newDate = new Date(ev.date)
		newDate.setDate(newDate.getDate() + 1);
		checkout.update(newDate);
	}
	checkin.hide();
	$('#second_date')[0].focus();
}).data('datepicker');

var checkout = $('#second_date').fdatepicker({
	format: 'yyyy-mm-dd',
	onRender: function (date) {
		return date.valueOf() < checkin.date.valueOf() ? 'disabled' : '';
	}
}).on('changeDate', function (ev) {
	checkout.hide();
}).data('datepicker');

/* Single Datepicker */
$('#single_date').fdatepicker({
    format: 'yyyy-mm-dd',
    disableDblClickSelection: true
});

//  *******************************
//  Show delete confirmation modal
//  *******************************
// For single delete row
$(document).on("click", "#delete-btn" ,function () {
	var url = $(this).data('url');
	Swal.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Yes, delete it!',
		cancelButtonText: 'No, cancel!',
		reverseButtons: true
	}).then((result) => {
		if (result.value) {
			window.location.href = url;
		}
	})
});

// For multiple delete row
$(document).on("click", "#multidelete-btn" ,function () {
	Swal.fire({
		title: 'Remove the selected data?',
		text: "You won't be able to revert this!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Yes, delete all!',
		cancelButtonText: 'No, cancel!',
		reverseButtons: true
	}).then((result) => {
		if (result.value) {
			$('#multidelete-frm').submit();
		}
	})
});
