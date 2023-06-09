<?php

namespace App\Http\Controllers;

use App\Models\CategoryDon;
use App\Models\Don;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dons = Don::orderBy('id', 'desc')->paginate(10);

        return view('admin.dons.recus', compact('dons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dons = Don::orderBy('id', 'desc')->where(['status' => 1])->paginate(10);

        return view('admin.dons.recu', compact('dons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dons =   Validator::make($request->all(), [
            'categoryDon_id' => 'required',
            'lastname' => 'required',
            'firstname' => 'required',
            'contact' => 'required',
            'email' => 'required',
            'montant' => 'required',
        ]);
        if($dons ->fails()){
            return response()->json($dons->errors());
        }

        $don = Don::create([
        'categoryDon_id' => $request->categoryDon_id,
        'lastname' => $request->lastname,
        'firstname' => $request->firstname,
        'contact' => $request->contact,
        'email' => $request->email,
        'montant' => $request->montant,
        'transaction_id'=> $request->transaction_id,
        'payment_method'=> $request->payment_method,
        'status'=> $request->status,

    ]);
        // return back()->with('success','Merci nous vous contacterons');
        return response()->json([
            'status' => 200,
            'dons' => $don
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Don  $don
     * @return \Illuminate\Http\Response
     */
    public function show(Don $don)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Don  $don
     * @return \Illuminate\Http\Response
     */
    public function edit(Don $don)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Don  $don
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Don $don)
    {
        $don->status = 1;
        $don->save();

        return back()->with('success', 'Réception du don confirmé');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Don  $don
     * @return \Illuminate\Http\Response
     */
    public function destroy(Don $don)
    {
        //
    }
}
