<?php

namespace System\Apps\Modules\Crud\Controllers;

use System\Core\Load;

use System\Apps\Modules\Crud\Models\Model_Crud;

class Controller_Crud extends Load
{

	public function crud_homepage($message = '')
	{
		// create $message var
		$arr = [
			'message' => $message
		];

		// call header page from template folder
		// call index page from hmvc view folder
		// call footer page from template folder
		Load::template("Header_Crud", $arr);
		Load::view("Crud", "Index_Crud", $arr);
		Load::template("Footer_Crud", $arr);
	}

	public function crud_fetch($id)
	{
		// create array parameter from variable
		$param = [
			":id" => [$id, PAR_INT]
		];

		// call the method fetch_update
		$arr = [
			'data' => Load::model(Model_Crud::class)->fetch_update($param)
		];

		// call header page from template folder
		// call update page from hmvc view folder
		// call footer page from template folder
		Load::template("Header_Crud", $arr);
		Load::view("Crud", "Update_Crud", $arr);
		Load::template("Footer_Crud", $arr);
	}

	public function crud_data()
	{
		// call the method get_data
		$d = Load::model(Model_Crud::class)->get_data();

		// show result
		echo $d;
	}

	public function crud_insert()
	{
		// defined variables
		$user_code     = Load::model(Model_Crud::class)->get_user_code();
		$user_name     = secure_input(post('user_name'));
		$user_password = secure_input(sha1(post('user_password')));
		$user_status   = secure_input(post('user_status'));
		$date          = gmdate('Y-m-d H:i:s', time() + 60 * 60 * 7);

		// if user_name, password, & user status is empty or no input, display the message
		if (not_filled($user_name) || not_filled($user_password) || not_filled($user_status)) {
			echo "Sorry, I can't, pleaseee. The Variables is not filled";
			exit();
		} else {
			// create array parameters from variables
			$param = [
				":user_code"       => $user_code,
				":user_name"       => $user_name,
				":user_password"   => $user_password,
				":user_status"     => $user_status,
				":create_date"     => $date,
				":update_date"     => $date,
				":additional_date" => $date
			];

			// call the method insert_data
			Load::model(Model_Crud::class)->insert_data($param);

			// redirect to page url
			redirect("crud/register-success");
		}
	}

	public function crud_delete($id)
	{
		// create array parameter from variable
		$param = [
			":id" => $id
		];

		// call the method delete_data
		Load::model(Model_Crud::class)->delete_data($param);

		// redirect to page url
		redirect("crud/delete-success");
	}

	public function crud_multidelete()
	{
		// defined variables
		$ids  = post('admin_id');

		// check if variable empty
		if (not_filled($ids)) {
			redirect("crud/must-select");
		} else {
			$data = sequence(":id", $ids);

			// call the method delete_data
			Load::model(Model_Crud::class)->multidelete_data($data);

			// redirect to page url
			redirect("crud/delete-success");
		}
	}

	public function crud_update($id)
	{
		// siapkan variable update query
		$user_name      = secure_input(post('user_name'));
		$user_password  = secure_input(sha1(post('user_password')));
		$check_password = secure_input(post('user_password'));
		$user_status    = secure_input(post('user_status'));
		$date           = gmdate('Y-m-d H:i:s', time() + 60 * 60 * 7);

		// check if variable empty
		if (not_filled($check_password)) {
			// and then, if variable check password is empty, send paramater update without user_password.
			$param = [
				':id'          => $id,
				':user_name'   => $user_name,
				':user_status' => $user_status,
				':update_date' => $date
			];

			// call the method update_data
			Load::model(Model_Crud::class)->update_data_password_null($param);

			// redirect to page url
			redirect("crud/update-success");
		} else {
			// and then, if variable check password exist, send paramater update with user_password.
			$param = [
				':id'            => $id,
				':user_name'     => $user_name,
				':user_password' => $user_password,
				':user_status'   => $user_status,
				':update_date'   => $date
			];

			// call the method update_data
			Load::model(Model_Crud::class)->update_data_password_yes($param);

			// redirect to page url
			redirect("crud/update-success");
		}
	}
}
