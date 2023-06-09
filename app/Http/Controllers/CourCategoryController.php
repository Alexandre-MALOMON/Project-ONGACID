<?php

namespace App\Http\Controllers;

use App\Models\Cour;
use App\Models\CourCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courCategorys = CourCategory::paginate(10);

        return view('admin.categorie.course.index',compact('courCategorys'));
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
            'name' => 'required|unique:cour_categories'
        ]);

        CourCategory::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'description' => $request->description
        ]);
        return back()->with('success', 'Catégorie créer avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourCategory  $courCategory
     * @return \Illuminate\Http\Response
     */
    public function show(CourCategory $courCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourCategory  $courCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(CourCategory $courCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourCategory  $courCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourCategory $courscategory)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $courscategory->update($request->all());
        return back()->with('success', "Catégorie mise à jour");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourCategory  $courCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourCategory $courscategory)
    {
        $cour = Cour::where(['courCategory_id' => $courscategory->id])->get();
        if ($courscategory) {
            if ($cour->count() > 0) {
                return back()->with('success', 'Cette catégorie est utilisée pour faire des cours');
            } else {
                $courscategory->delete();
                return back()->with('success', 'catégorie supprimée');
            }
        }
    }
}
