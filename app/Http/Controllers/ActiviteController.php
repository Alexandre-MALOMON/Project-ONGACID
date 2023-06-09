<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Activitys;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ActiviteController extends Controller
{
    public function activite(Request $request)
    {
        $categoryacti =  Crypt::decrypt($request->get('activite'));
        $categories = Category::orderBy('name', 'asc')->get();
        $activites = Activitys::where(['category_id' => $categoryacti])->paginate(15);
        $activites->appends(['activite' => $categoryacti]);
        return view('home.activite.activite', compact('categories', 'activites'));
    }

    public function searchActivity(Request $request)
    {
        $categories = Category::orderBy('name', 'asc')->get();

        $activites = Category::join('activitys', 'categories.id', 'activitys.category_id')
            ->where('categories.id', $request->categorie_id)
            ->where('activitys.title', 'like', '%' . $request->title . '%')->paginate(15);
        return view('home.activite.activiteSearch', compact('activites', 'categories'));
    }

    public function descriptionactivite(Activitys $activite)
    {
        return view('home.activite.descriptionactivite', compact('activite'));
    }
}
