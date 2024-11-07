<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountSettings extends Controller
{
    public function index(){
        return view('pages.users.user-settings.index');
    }
}
