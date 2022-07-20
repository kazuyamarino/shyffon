<?php
namespace System\Modules\Homepage\Models;

use System\Core\DB;

class ModelHello extends DB
{

	public function mvc_page()
	{
		return "This is MVC page.";
	}

	public function hmvc_page()
	{
		return "This is HMVC page.";
	}

}
