<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function home() {
        $user = auth()->user();
        return view('index', ['user' => $user]);
    }
}
