<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitesController extends Controller
{
    //
    public function index()
    {
        return view('welcome');
    }
    public function material()
    {
        return view('material.index');
    }
}
