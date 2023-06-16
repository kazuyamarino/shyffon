<?php
namespace System\Models;

use System\Core\DB;

class ModelWelcome extends DB
{

	public function welcome()
	{
		return 'Welcome to NSY PHP Framework';
	}

}
