<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function encounter()
    {
        return view('encounters');
    }

    public function research()
    {
        return view('researches');
    }

    public function test()
    {
        return view('tests');
    }
}
