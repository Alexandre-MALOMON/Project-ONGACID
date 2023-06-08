<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryActualite;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $news = News::orderBy('id', 'desc')->paginate(10);

        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CategoryActualite::all();

        return view('admin.news.create', compact('categories'));
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
            'category_actualite_id' => 'required',
            'title' => 'required|unique:news,title',
            'photo' => 'required',
            'description' => 'required',
        ]);
        $new =  new News();
        $new->user_id = Auth::user()->id;
        $new->category_actualite_id = $request->category_actualite_id;
        $new->title = $request->title;
        $new->slug = Str::slug($request->title);
        if ($request->has('photo')) {
            $image = $request->photo;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storages/new/', $image_new_name);
            $new->photo = '/storages/new/' . $image_new_name;
        }
        $new->description = $request->description;
        $new->save();

        return redirect()->route('new.index')->with('success','Article publié');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $new)
    {
       return view('admin.news.show',compact('new'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $new)
    {
        $categories = CategoryActualite::all();

        return view('admin.news.edit', compact('categories','new'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $new)
    {
        $this->validate($request, [
            'category_actualite_id' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $new->user_id = Auth::user()->id;
        $new->slug = Str::slug($request->title);
        $new->category_actualite_id = $request->category_actualite_id;
        $new->title = $request->title;
        if ($request->has('photo')) {
            $image = $request->photo;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storages/new/', $image_new_name);
            $new->photo = '/storages/new/' . $image_new_name;
        }
        $new->description = $request->description;
        $new->save();

        return redirect()->route('new.index')->with('success','Article publié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $new)
    {
        if ($new) {
            if (file_exists(public_path($new->photo))) {
                unlink(public_path($new->photo));
            }
            $new->delete();
            return back()->with('success','Livre supprimé');
        }
    }
}
