<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function consalti()
    {
        return view('welcome');
    }

    public function contact()
    {
        return view('contact');
    }

    public function medecin()
    {
        return view('medecin');
    }

    public function index()
    {
        return view('home');
    }
}
