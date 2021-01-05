<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Home'
		];

		return view('v_home', $data);
	}

	public function aboutMe()
	{
		$data = [
			'title' => 'About'
		];

		return view('pages/v_about', $data);
	}


	//--------------------------------------------------------------------

}
