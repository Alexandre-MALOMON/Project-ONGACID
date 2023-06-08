<?php

namespace App\Http\Controllers;

use App\Models\CategoryActualite;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryActualiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CategoryActualite::paginate(10);
        return view('admin.categorie.actualite.index', compact('categories'));
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
            'name' => 'required|unique:category_actualites'
        ]);

        CategoryActualite::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'description' => $request->description
        ]);
        return back()->with('success', 'Catégorie créer avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryActualite  $categoryActualite
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryActualite $categoryActualite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryActualite  $categoryActualite
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryActualite $categoryActualite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryActualite  $categoryActualite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryActualite $categoriactualite)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        //dd($categoriactualite);
        $categoriactualite->update($request->all());
        return back()->with('success', "Catégorie mise à jour");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryActualite  $categoryActualite
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryActualite $categoriactualite)
    {
        $actualite = News::where(['category_actualite_id' => $categoriactualite->id])->get();
        if ($categoriactualite) {
            if ($actualite->count() > 0) {
                return back()->with('success', 'Cette catégorie est utilisée pour faire des publications');
            } else {
               
                $categoriactualite->delete();
                return back()->with('success', 'catégorie supprimée');
            }
        }
    }
}
