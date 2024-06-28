<?php

namespace System\Apps\Modules\Crud\Models;

use System\Core\DB;

class Model_Crud extends DB
{

	public function get_data()
	{
		// query to display the data table in json form
		$query = "SELECT * FROM crud_table";
		$data = DB::connect()->query($query)->style(FETCH_ASSOC)->fetch_all();
		$json_data = json_fetch([
			"data" => $data
		]);

		return $json_data;
	}

	public function get_user_code()
	{
		// get last id from crud_table
		$q_select_id = "SELECT MAX(id) FROM crud_table";
		$last_id = DB::connect()->query($q_select_id)->fetch_column();
		terner(not_filled($last_id), $last_id = 0, $last_id); // if last id is 0 then give it 0 value

		// get last user_code second number from crud_table
		$q_select_ucode = "SELECT
			id as id,
			SUBSTR(user_code, 2, 1) as ucode
		FROM crud_table ORDER BY id DESC LIMIT 1";
		$get_ucode_num = DB::connect()->query($q_select_ucode)->style(FETCH_ASSOC)->fetch();
		if (not_filled($get_ucode_num)) {
			$last_ucode = 0;
		} else {
			terner( $get_ucode_num['ucode'] == 9, ($last_ucode = 0), ($last_ucode = 1 + (int)$get_ucode_num['ucode']) ); // if ucode reach 9 then reset it to 0
		}

		// generate user code and setting up variables
		$gen_user_code = 2 . $last_ucode . $last_id;
		$user_code     = $gen_user_code;
		return $user_code;
	}

	public function insert_data($param)
	{
		// begin for insert data
		$q_insert_user = "INSERT INTO crud_table(
			user_code,
			user_name,
			user_password,
			user_status,
			create_date,
			update_date,
			delete_date )
		VALUES(
			:user_code,
			:user_name,
			:user_password,
			:user_status,
			:create_date,
			:update_date,
			:delete_date )";
		DB::connect()->query($q_insert_user)->vars($param)->bind()->exec();
	}

	public function delete_data($param)
	{
		// query to delete the data table
		$query = "DELETE FROM crud_table WHERE id = :id";
		DB::connect()->query($query)->vars($param)->bind()->exec();
	}

	public function multidelete_data($data)
	{
		// query to delete more than one data table
		$query = "DELETE FROM crud_table WHERE id IN ($data[0])";
		DB::connect()->query($query)->vars($data[1])->bind()->exec();
	}

	public function update_data_password_null($param)
	{
		// query for data updates without a password
		$query = "UPDATE crud_table SET
			user_name     = :user_name,
			user_password = user_password,
			user_status   = :user_status,
			create_date   = create_date,
			update_date   = :update_date,
			delete_date   = delete_date
		WHERE id            = :id";
		DB::connect()->query($query)->vars($param)->bind()->exec();
	}

	public function update_data_password_yes($param)
	{
		// query for data updates with a password
		$query = "UPDATE crud_table SET
			user_name     = :user_name,
			user_password = :user_password,
			user_status   = :user_status,
			create_date   = create_date,
			update_date   = :update_date,
			delete_date   = delete_date
		WHERE id            = :id";
		DB::connect()->query($query)->vars($param)->bind()->exec();
	}

	public function fetch_update($param)
	{
		// fetch data from the data table for updating purposes
		$query = "SELECT * FROM crud_table WHERE id = :id";
		$data = DB::connect()
			->query($query)
			->vars($param)
			->bind()
			->style(FETCH_ASSOC)
			->bind(BINDVAL)
			->fetch();

		return $data;
	}
}
