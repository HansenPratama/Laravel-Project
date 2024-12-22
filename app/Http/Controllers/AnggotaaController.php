<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnggotaaController extends Controller
{
    public function index()
    {
        return view('\anggotaa\dashboard');
    }
}
