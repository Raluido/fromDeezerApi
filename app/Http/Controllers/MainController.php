<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MainController extends Controller
{
    function index()
    {
        $token = session('access_token');
        if (!isset($token)) {
            $token = "";
        }

        return view('index', ['token' => $token]);
    }
}
