<?php

namespace App\Http\Controllers;

use App\Models\Activitys;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class ActivitysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activitys = Activitys::orderBy('id', 'desc')->paginate(10);

        return view('admin.activite.index', compact('activitys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.activite.create', compact('categories'));
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
            'category_id' => 'required',
            'title' => 'required|unique:activitys,title',
            'lieu' => 'required',
            'photo' => 'required',
            'description' => 'required',
        ]);

        $activite = new Activitys();
        $activite->user_id = Auth::user()->id;
        $activite->slug = Str::slug($request->title);
        $activite->category_id = $request->category_id;
        $activite->title = $request->title;
        $activite->lieu = $request->lieu;
        if ($request->photo) {
            foreach ($request->file('photo')  as $file) {
                $name = time() . '.' . $file->getClientOriginalName();
                $file->move('storages/activite/', $name);
                $data[] = '/storages/activite/' . $name;
                $activite->photo = json_encode($data);
            }
        }
        $activite->description = $request->description;
        $activite->save();
        return redirect()->route('activity.index')->with('success', 'Activité publiée');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activitys  $activitys
     * @return \Illuminate\Http\Response
     */
    public function show(Activitys $activity)
    {
        return view('admin.activite.show',compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activitys  $activitys
     * @return \Illuminate\Http\Response
     */
    public function edit(Activitys $activity)
    {
        $categories = Category::all();
        return view('admin.activite.edit', compact('categories', 'activity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activitys  $activitys
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activitys $activity)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'title' => 'required',
            'lieu' => 'required',
            'photo' => 'array',
            'description' => 'required',
        ]);


        $activity->user_id = Auth::user()->id;
        $activity->category_id = $request->category_id;
        $activity->title = $request->title;
        $activity->slug = Str::slug($request->title);
        $activity->lieu = $request->lieu;
        if ($request->photo) {
            foreach ($request->file('photo')  as $file) {
                $name = time() . '.' . $file->getClientOriginalName();
                $file->move('storages/activite/', $name);
                $data[] = '/storages/activite/' . $name;
                $activity->photo = json_encode($data);
            }
        }
        $activity->description = $request->description;
        $activity->save();
        return redirect()->route('activity.index')->with('success', 'Activité publiée');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activitys  $activitys
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activitys $activity)
    {
        if ($activity) {
            if (file_exists(public_path($activity->photo))) {
                unlink(public_path($activity->photo));
            }
            $activity->delete();
            return back()->with('success', 'Activité supprimée');
        }
    }
}
