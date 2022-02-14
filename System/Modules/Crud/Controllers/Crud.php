<?php
namespace System\Modules\Crud\Controllers;

use System\Core\Load;
use System\Libraries\Cookie;
use System\Modules\Crud\Models\ModelCrud;

use Carbon\Carbon;

class Crud extends Load
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
		Load::template("HeaderCrud", $arr);
		Load::view("Crud", "Index", $arr);
		Load::template("FooterCrud", $arr);
	}

	public function crud_fetch($id)
	{
		// create array parameter from variable
		$param = [
			":id" => [$id, PAR_INT]
		];

		// call the method fetch_update
		$arr = [
			'data' => Load::model('Crud\ModelCrud')->fetch_update($param)
		];

		// call header page from template folder
		// call update page from hmvc view folder
		// call footer page from template folder
		Load::template("HeaderCrud", $arr);
		Load::view("Crud", "Update", $arr);
		Load::template("FooterCrud", $arr);
	}

	public function crud_data()
	{
		// call the method get_data
		$d = Load::model('Crud\ModelCrud')->get_data();

		// show result
		echo $d;
	}

	public function crud_insert()
	{
		// defined variables
		$user_code     = Load::model('Crud\ModelCrud')->get_user_code();
		$user_name     = secure_input(post('username'));
		$user_password = secure_input(sha1(post('password')));
		$user_status   = secure_input(post('status'));
		$date          = gmdate('Y-m-d H:i:s',time()+60*60*7);

		// if username, password, & user status is empty or no input, display the message
		if ( not_filled($user_name) || not_filled($user_password) || not_filled($user_status) ) {
			echo "Sorry, I can't, pleaseee. The Variables is not filled";
			exit();
		} else {
			// create array parameters from variables
			$param = [
				":user_code"     => $user_code,
				":user_name"     => $user_name,
				":user_password" => $user_password,
				":user_status"   => $user_status,
				":create_date"   => $date,
				":update_date"   => $date,
				":adds_date"     => $date
			];

			// call the method insert_data
			Load::model('Crud\ModelCrud')->insert_data($param);

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
		Load::model('Crud\ModelCrud')->delete_data($param);

		// redirect to page url
		redirect("crud/delete-success");
	}

	public function crud_multidelete()
	{
		// defined variables
		$ids  = post('admin_id');

		// check if variable empty
		if ( not_filled($ids) ) {
			redirect("crud/must-select");
		} else {
			$data = sequence(":id", $ids);

			// call the method delete_data
			Load::model('Crud\ModelCrud')->multidelete_data($data);

			// redirect to page url
			redirect("crud/delete-success");
		}
	}

	public function crud_update($id)
	{
		// siapkan variable update query
		$user_name      = secure_input(post('username'));
		$user_password  = secure_input(sha1(post('password')));
		$check_password = secure_input(post('password'));
		$user_status    = secure_input(post('status'));
		$date           = gmdate('Y-m-d H:i:s',time()+60*60*7);

		// check if variable empty
		if ( not_filled($check_password) )
		{
			// and then, if variable check password is empty, send paramater update without user_password.
			$param = [
				':id'          => $id,
				':user_name'   => $user_name,
				':user_status' => $user_status,
				':update_date' => $date
			];

			// call the method update_data
			Load::model('Crud\ModelCrud')->update_data_password_null($param);

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
			Load::model('Crud\ModelCrud')->update_data_password_yes($param);

			// redirect to page url
			redirect("crud/update-success");
		}
	}

}
