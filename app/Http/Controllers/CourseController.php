<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cour;
use App\Models\CourCategory;
use App\Models\CoursComplete;
use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        $categories = CourCategory::all();
        $courses = Cour::orderBy('id', 'desc')->paginate(9);

        return view('cours.index', compact('courses', 'categories'));
    }

    public function show(Cour $cour)
    {
        $episodes = Episode::where(['cour_id' => $cour->id])->get();
        $courSuivis = CoursComplete::where(['cour_id' => $cour->id, 'user_id' => Auth::user()->id])->first();
        //dd($courSuivis['id']);
        return view('cours.show', compact('cour', 'episodes', 'courSuivis'));
    }

    public function payante()
    {
        return view('cours.desformpayante');
    }

    public function cours(Cour $cour)
    {
        $episodes = Episode::where(['cour_id' => $cour->id])->get();
        $courComplete = CoursComplete::where(['cour_id' => $cour->id, 'user_id' => Auth::user()->id])->get();
        if ($courComplete->count() == 0) {
            CoursComplete::create([
                'user_id' => Auth::user()->id,
                'cour_id' => $cour->id,
            ]);
        }

        return view('cours.cours', compact('cour', 'episodes'));
    }

    public function seachCours(Request $request)
    {
        $categories = CourCategory::all();

        $courses = Cour::where(['courCategory_id' => $request->categorie])->paginate(10);

        return view('cours.courSeach', compact('categories', 'courses'));
    }

    public function courTransaction(Request $request, Cour $cour)
    {

        $transaction = CoursComplete::create([
            'cour_id' => $cour->id,
            'user_id' => Auth::user()->id,
            'montant' => $request->montant,
            'transaction_id' => $request->transaction_id,
            'payment_method' => $request->payment_method,
            'status' => $request->status,
        ]);

        return response()->json([
            'status' => 200,
            'transaction' => $transaction
        ]);
    }
}
