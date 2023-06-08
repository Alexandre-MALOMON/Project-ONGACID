<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{

    public function index(){
        $news = Newsletter::paginate(10);
        return view('admin.message.newslatter',compact('news'));
    }
   public function store(Request $request){
        $this->validate($request,[
            'email' => 'required'
        ]);

        Newsletter::create([
            'email' => $request->email
        ]);

        return back()->with('succes','Abonnement réussir');
   }
}
