<?php

namespace App\Http\Controllers;

use App\Models\Recrutement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RecrutementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recrutements = Recrutement::orderBy('created_at', 'desc')->where(['type'=>'1'])->paginate(10);

        return view('admin.recrutement.index', compact('recrutements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:recrutements,name',
            'start' => 'required',
            'end' => 'required',
            'description' => 'required'
        ]);
        $recrutement = Recrutement::all();
        Recrutement::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'start' => $request->start,
            'end' => $request->end,
            'num' => $recrutement->count() + 1,
            'year' => date('Y'),
            'type' => $request->type,
            'description' => $request->description
        ]);

        return back()->with('success', "Appel à candidature lancé");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recrutement  $recrutement
     * @return \Illuminate\Http\Response
     */
    public function show(Recrutement $recrutement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recrutement  $recrutement
     * @return \Illuminate\Http\Response
     */
    public function edit(Recrutement $recrutement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recrutement  $recrutement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recrutement $recrutement)
    {
        $this->validate($request, [
            'name' => 'required|unique:recrutements,name',
            'start' => 'required',
            'end' => 'required',
            'description' => 'required'
        ]);

        $recrutement->update($request->all());

        return back()->with('success','Information mise à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recrutement  $recrutement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recrutement $recrutement)
    {
       //
    }

    public function close(Recrutement $recrutement)
    {

       $recrutement->status = 0;
       $recrutement->save();

       return back()->with('success','Recrutement clôturé');
    }

    public function benevolat(){
        $recrutements = Recrutement::orderBy('created_at', 'desc')->where(['type'=>'2'])->paginate(10);
        return view('admin.benevola.index', compact('recrutements'));
    }
}
