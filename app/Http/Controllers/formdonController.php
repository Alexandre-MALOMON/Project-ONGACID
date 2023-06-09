<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class formdonController extends Controller
{
    public function formdon()
    {
        return view('home.formdon');
    }
}
