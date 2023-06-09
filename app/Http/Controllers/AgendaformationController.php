<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Formation;
use Illuminate\Http\Request;

class AgendaformationController extends Controller
{
    public function agenda()
    {
        $agendas = Formation::orderBy('created_at', 'desc')->paginate(10);
        return view('home.agenda.agendaformation',compact('agendas'));
    }

    public function agendaSearch(Request $request){
        $agendas = Formation::orderBy('created_at', 'desc')->where(['title'=> $request->title])->paginate(10);
        return view('home.agenda.agendasearch',compact('agendas'));
    }

    public function descriptionagenda(Formation $agenda)
    {
        return view('home.agenda.descriptionagenda',compact('agenda'));
    }
    public function formagenda(Formation $formation)
    {
        return view('home.agenda.formagenda',compact('formation'));
    }
}
