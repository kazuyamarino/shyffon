<?php

namespace System\Apps\General\Controllers;

use System\Core\Load;

class Controller_Welcome extends Load
{

	public function index()
	{
		// Load MVC view page
		Load::template('Header');
		Load::view(null, 'Index_Welcome');
		Load::template('Footer');
	}
}
