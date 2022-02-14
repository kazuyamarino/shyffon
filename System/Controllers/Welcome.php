<?php
namespace System\Controllers;

use System\Core\Load;

use System\Libraries\Cookie;
use Carbon\Carbon;

class Welcome extends Load
{

	public function index()
	{
		// Load MVC view page
		Load::template("Header");
		Load::view(null, "Index");
		Load::template("Footer");
	}

}
