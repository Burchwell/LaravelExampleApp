<?php

namespace App\Http\Controllers;

use App\Models\User;

class HomeController
{

    public function index() {
        $users = User::all();
        if ($users !== null) {
            return view('home', compact('users'));
        }
    }
}
