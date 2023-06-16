<?php

/**
 * This method serves to manage NSY framework sweetalert notifications
 * Attention, don't try to change the structure of the code, delete, or change. Because there is some code connected to the NSY system. So, be careful.
 */

function pull_alerts($message)
{
	if (!empty($message)) {
		if ($message == 'register-success') {
			echo '<script>Swal.fire("Success!", "Data has been sent!", "success");</script>';
		} elseif ($message == 'delete-success') {
			echo '<script>Swal.fire("Success!", "Data has been deleted!", "success");</script>';
		} elseif ($message == 'update-success') {
			echo '<script>Swal.fire("Success!", "Data has been updated!", "success");</script>';
		} elseif ($message == 'must-select') {
			echo '<script>Swal.fire("Warning!", "Data must be selected!", "warning");</script>';
		}
	}
}
