<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminAuthController extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    //--------------------------------------------------------------------

}
