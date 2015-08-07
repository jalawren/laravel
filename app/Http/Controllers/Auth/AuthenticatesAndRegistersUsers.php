<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\AuthenticateUsers;
use Illuminate\Foundation\Auth\RegistersUsers;

trait AuthenticatesAndRegistersUsers
{
    use AuthenticatesUsers, RegistersUsers {
        AuthenticatesUsers::redirectPath insteadof RegistersUsers;
    }
}
