<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PartenaireController extends Controller
{
    public function partenairelocaux()
    {
        return view('home.partenaire.partenairelocaux');
    }
    public function partenaireinternationaux()
    {
        return view('home.partenaire.partenaireinternationaux');
    }
}
