<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function license()
    {
        return view('pages.license');
    }
}
