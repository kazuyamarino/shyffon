<?php

namespace System\Apps\Modules\HMVC\Controllers;

use System\Core\Load;

class Controller_Hello extends Load
{

	public function index_hmvc()
	{
		// Load HMVC view page
		Load::template("Header");
		Load::view("HMVC", "Index_Hello");
		Load::template("Footer");
	}
}
