<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryActualite;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ActualiteController extends Controller
{
    public function actualite(Request $request)
    {
        $categoryactua =  Crypt::decrypt($request->get('actualite'));
        $categories = CategoryActualite::orderBy('name', 'asc')->get();
        $postes = News::orderBy('created_at','desc')->where(['category_actualite_id' => $categoryactua])->paginate(15);
        $postes->appends(['actualite' => $categoryactua]);

        return view('home.actualite.actualite',compact('postes','categories'));
    }

    public function searchActualite(Request $request)
    {
        $categories = CategoryActualite::orderBy('name', 'asc')->get();

        $postes = CategoryActualite::join('news', 'category_actualites.id', 'news.category_actualite_id')
            ->where('category_actualites.id', $request->categorie_id)
            ->where('news.title', 'like', '%' . $request->title . '%')->paginate(15);
        return view('home.actualite.actualiteSearch', compact('postes', 'categories'));
    }


    public function descriptionactualite(News $actualite)
    {
        return view('home.actualite.descriptionactualite',compact('actualite'));
    }
}
