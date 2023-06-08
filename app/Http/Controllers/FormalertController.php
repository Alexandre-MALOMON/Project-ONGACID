<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alert;
use Illuminate\Http\Request;

class FormalertController extends Controller
{
    public function alert()
    {
        return view('home.formalert');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'message' => 'required',
        ]);

        Alert::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'contact' => $request->contact,
            'message' => $request->message,
        ]);

        return back()->with('success','Alert envoyé');
    }

    public function index(){
        $alertes = Alert::orderBy('created_at','desc')->paginate(10);

        return view('admin.alert.index',compact('alertes'));
    }

    public function show(Alert $alerte){
        return view('admin.alert.show',compact('alerte'));
    }
}
