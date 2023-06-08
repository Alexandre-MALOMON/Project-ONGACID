<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Recrutement;
use Illuminate\Http\Request;

class OffredemploiController extends Controller
{
    public function offredemploi()
    {
        $emploies = Recrutement::where(['type'=>1])->paginate(10);
        return view('home.emploi.offredemploi',compact('emploies'));
    }
    public function formdemploi(Recrutement $emploie)
    {
        return view('home.emploi.formdemploi',compact('emploie'));
    }

    public function formvolontaire(Recrutement $emploie)
    {
        return view('home.emploi.formvolontariat',compact('emploie'));
    }
    public function volontariat()
    {
        $volontariats = Recrutement::where(['type'=>2])->paginate(10);
        return view('home.emploi.volontariat',compact('volontariats'));
    }
    public function offre()
    {
        return view('home.emploi.offre');
    }
    public function descriptionoffre(Recrutement $recrutement)
    {
        return view('home.emploi.descriptionoffredemploi',compact('recrutement'));
    }
}
