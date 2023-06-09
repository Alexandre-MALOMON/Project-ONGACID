<?php

namespace App\Http\Controllers;

use App\Models\CategoryDon;
use App\Models\Don;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryDonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categoryDons = CategoryDon::paginate(10);

        return view('admin.categorie.don.index', compact('categoryDons'));
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
            'name' => 'required|unique:category_dons'
        ]);

        CategoryDon::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'description' => $request->description
        ]);
        return back()->with('success', 'Catégorie créer avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryDon  $categoryDon
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryDon $categoryDon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryDon  $categoryDon
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryDon $categoryDon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryDon  $categoryDon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryDon $categorydon)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $categorydon->update($request->all());
        return back()->with('success', "Catégorie mise à jour");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryDon  $categoryDon
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryDon $categorydon)
    {
        $don = Don::where(['categoryDon_id' => $categorydon->id])->get();
        if ($categorydon) {
            if ($don->count() > 0) {
                return back()->with('success', 'Cette catégorie est utilisée pour faire des publications');
            } else {
                $categorydon->delete();
                return back()->with('success', 'catégorie supprimée');
            }
        }
    }
}
