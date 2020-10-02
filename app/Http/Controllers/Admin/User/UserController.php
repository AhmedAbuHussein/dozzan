<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Facades\App\Repository\User;

class UserController extends Controller
{
    public function index()
    {
       $users = User::all('created_at', 'DESC');
        return view('admin.users', compact('users'));
    }
}
