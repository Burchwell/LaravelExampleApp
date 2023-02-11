<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login(Request $request) {
        try {

        } catch (\Throwable $e) {
            Log::error($e->getMessage().". (".$e->getFile().":".$e->getLine().")");
        }
    }

    public function logout(Request $request) {}

    public function register(Request $request) {}

    public function refresh(Request $request) {}
}
