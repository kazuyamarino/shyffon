<?php

/**
 * Attention, don't try to change the structure of the code, delete, or change.
 * Because there is some code connected to the NSY system. So, be careful.
 *
 * Hi Welcome to NSY Assets Manager.
 * The easiest & best assets manager in history.
 * Made with love by Vikry Yuansah.
 *
 * How to use it? Simply follow this :
 * https://github.com/kazuyamarino/nsy-docs/blob/master/USERGUIDE.md#introducting-to-nsy-assets-manager
 */

function header_assets()
{
	// Site Title
	Add::custom('<title>' . get_title() . ' ' . get_version() . ' | ' . get_codename() . '</title>');

	// Meta Tag
	Add::meta('charset="utf-8"');
	Add::meta('http-equiv="x-ua-compatible"', 'ie=edge');
	Add::meta('name="description"', get_desc());
	Add::meta('name="keywords"', get_keywords());
	Add::meta('name="author"', get_author());
	Add::meta('name="viewport"', 'width=device-width, initial-scale=1, shrink-to-fit=no');

	// Favicon
	Add::link('favicon.png', 'shortcut icon');

	// Main Style
	Add::link('main.css', 'stylesheet', 'text/css');

	// Foundation CSS
	Add::link('../../node_modules/foundation-sites/dist/css/foundation.min.css', 'stylesheet', 'text/css');
	Add::link('responsive-tables.min.css', 'stylesheet', 'text/css');

	// Datatables CSS
	Add::link('../../node_modules/datatables.net-zf/css/dataTables.foundation.min.css', 'stylesheet', 'text/css');
	Add::link('../../node_modules/foundation-datepicker/css/foundation-datepicker.min.css', 'stylesheet', 'text/css');

	// Font Awesome CSS
	Add::link('../../node_modules/@fortawesome/fontawesome-free/css/all.min.css', 'stylesheet', 'text/css');

	// Modernizr JS
	Add::script('modernizr.min.js', 'text/javascript', 'UTF-8');
}

function footer_assets()
{
	// JQuery JS
	Add::script('../../node_modules/jquery/dist/jquery.min.js', 'text/javascript', 'UTF-8');
	Add::script('../../node_modules/jquery-migrate/dist/jquery-migrate.min.js', 'text/javascript', 'UTF-8');

	// Foundation JS
	Add::script('../../node_modules/foundation-sites/dist/js/foundation.min.js', 'text/javascript', 'UTF-8');
	Add::script('../../node_modules/what-input/dist/what-input.min.js', 'text/javascript', 'UTF-8');
	Add::script('../../node_modules/foundation-datepicker/js/foundation-datepicker.min.js', 'text/javascript', 'UTF-8');

	// Datatables JS
	Add::script('../../node_modules/datatables.net/js/dataTables.min.js', 'text/javascript', 'UTF-8');
	Add::script('../../node_modules/datatables.net-zf/js/dataTables.foundation.min.js', 'text/javascript', 'UTF-8');
	Add::script('responsive-tables.min.js', 'text/javascript', 'UTF-8');
	Add::link('../../node_modules/jquery-datatables-checkboxes/css/dataTables.checkboxes.css', 'stylesheet', 'text/css');
	Add::script('../../node_modules/jquery-datatables-checkboxes/js/dataTables.checkboxes.min.js', 'text/javascript', 'UTF-8');

	// System JS
	Add::script('config/system.js', 'text/javascript', 'UTF-8');

	// Base JS
	Add::script('main.js', 'text/javascript', 'UTF-8');
}

function sweetalert_init()
{
	Add::script('../../node_modules/sweetalert2/dist/sweetalert2.min.js', 'text/javascript', 'UTF-8');
	Add::link('../../node_modules/sweetalert2/dist/sweetalert2.min.css', 'stylesheet', 'text/css');
	Add::script('../../node_modules/promise-polyfill/dist/polyfill.min.js', 'text/javascript', 'UTF-8');
}

function datatables_init()
{
	Add::script('datatables/init.js', 'text/javascript', 'UTF-8');
}

function datatables_crud_init()
{
	Add::script('datatables/init_crud.js', 'text/javascript', 'UTF-8');
}
