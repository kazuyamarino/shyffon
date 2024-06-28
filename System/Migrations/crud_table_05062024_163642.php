<?php

namespace System\Migrations;

/**
 * The migration class
 */
class crud_table_05062024_163642
{

	/**
	 * NSY Migration
	 */

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Mig::connect()->create_table('crud_table', [
			Mig::bigint('id', 20)->auto_increment(),
			Mig::varchar('user_name', 20)->not_null(),
			Mig::varchar('user_password')->not_null(),
			Mig::bigint('user_code')->not_null(),
			Mig::varchar('user_status', 2)->null(),
			Mig::primary('id')
		])->index('crud_table', 'BTREE', 'id');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Mig::connect()->drop_exist_table('crud_table');
	}
}
