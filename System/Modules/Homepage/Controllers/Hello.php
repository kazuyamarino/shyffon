<?php

namespace System\Modules\Homepage\Controllers;

use System\Core\Load;

class Hello extends Load
{

	public function index_hmvc()
	{
		// Load HMVC view page
		Load::template("Header");
		Load::view("Homepage", "Index");
		Load::template("Footer");
	}
}
