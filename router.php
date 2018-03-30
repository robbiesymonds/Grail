<?php 

	error_reporting(E_ALL);
	$url_base = rtrim($_SERVER['REQUEST_URI'], '/');

	function page($name) { include('pages/'.$name.'.php'); }
	function app($name) { include('app/'.$name.'.php'); }
	function code($name) { include('assets/php/'.$name.'.php'); }
	app('tools');

	// Frontend Pages
		// Core Pages Frontend
		if ($url_base == '')  {
			page('scoreboard');
		} else if ($url_base == '/diary')  {
			authRequired('page', 'diary');
		} else if ($url_base == '/048A3A56B014940E73F89C2F98DB2C06')  {
			page('first_clue');

		// Level One Frontend
		} else if ($url_base == '/clue/level-one')  {
			authRequired('page', 'level_one/clue');
		} else if ($url_base == '/level_one/part_one')  {
			authAndUnlockRequired('page', 'one_part_one', 'level_one/part_one');
		} else if ($url_base == '/level_one/part_two')  {
			authAndUnlockRequired('page', 'one_part_two', 'level_one/part_two');
		} else if ($url_base == '/level_one/part_three')  {
			authAndUnlockRequired('page', 'one_part_three', 'level_one/part_three');
		} else if ($url_base == '/bonus/791d06485df518a37077645f5d9568bc')  {
			authAndUnlockRequired('page', 'one_part_two', 'level_one/bonus_unlock');
		} else if ($url_base == '/level_one/bonus')  {
			authAndUnlockRequired('page', 'one_bonus', 'level_one/bonus');

		// Level Two Frontend
		} else if ($url_base == '/clue/level-two')  {
			scoreRequired('page', 1500, 'level_two/clue');
		} else if ($url_base == '/level_two/part_one')  {
			authAndUnlockRequired('page', 'two_part_one', 'level_two/part_one');

	// Backend Pages
		// Core Pages Backend
		} else if ($url_base == '/data/15ec430e978d726133be311b5d3b1097')  {
			code('first_clue');

		// Level One Backend
		} else if ($url_base == '/data/8c154af9ac2bf94569cb67a89d09b05e')  {
			code('level_one/level_one_clue');
		} else if ($url_base == '/data/8acae5da49283f7f59a919dc87b74453')  {
			code('level_one/level_one_one');
		} else if ($url_base == '/data/d3d84d54a99c8cac66e9e06fca546304')  {
			code('level_one/level_one_two');
		} else if ($url_base == '/data/ae50750d2fcdbf4e7d8fbc6e31281f3c')  {
			code('level_one/level_one_three');
		} else if ($url_base == '/data/791d06485df518a37077645f5d9568bc')  {
			code('level_one/level_one_bonus');

		// Level Two Backend
		} else if ($url_base == '/data/709712e5ebb2b6347809fc826ae80deb')  {
			code('level_two/level_two_clue');
		} else if ($url_base == '/data/2d30f10f4056b9b2c44929e65e5ca434')  {
			code('level_two/level_two_one');

	// Other
		} else if ($url_base == '/auth/create')  {
			if (isset($_COOKIE['_uaa']) && $_COOKIE['_uaa'] == true) {
				app('auth/create');
			} else {
				header('Location: /');
			}
		} else if ($url_base == '/auth/data/create_user')  {
			app('auth/php/create_user');
		} else if ($url_base == '/auth/login')  {
			app('auth/login');
		} else if ($url_base == '/auth/data/login')  {
			app('auth/php/login_user');
		} else if ($url_base == '/auth/logout')  {
			app('auth/php/logout_user');
		} else {
			page('error');
		}

 ?>