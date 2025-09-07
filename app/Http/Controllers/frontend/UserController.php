<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user () {
        return view('frontend.pages.user');
    }

    public function profile () {
        return view('frontend.pages.profile');
    }
}
