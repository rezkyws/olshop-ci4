<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class UserAuthController extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    //--------------------------------------------------------------------

}
