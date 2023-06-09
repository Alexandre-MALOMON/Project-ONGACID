<?php

namespace App\Http\Controllers;

use App\Models\Cour;
use App\Models\CourCategory;
use App\Models\CoursComplete;
use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryCourses = CourCategory::all();
        $cours = Cour::orderBy('id', 'desc')->paginate(10);

        return view('admin.cours.index', compact('cours', 'categoryCourses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryCourses = CourCategory::all();
        return view('admin.cours.create', compact('categoryCourses'));
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
            'title_cours' => 'required|min:10',
            'description_cours' => 'required|min:150',
            'photo' => 'required|mimes:png,jpeg,jpg',
            'type' => 'required',
            'courCategory_id' => 'required',
            'heure' => 'required',
            'title' => 'array',
            'video' => 'array',
            'photo_episode' => 'array',
            'description' => 'array',
        ]);
        //cours
        $cour = new Cour();
        $cour->user_id = Auth::user()->id;
        $cour->title_cours = $request->title_cours;
        $cour->slug = Str::slug($request->title_cours);
        $cour->type = $request->type;
        $cour->prix = $request->prix;
        $cour->heure = $request->heure;
        $cour->courCategory_id = $request->courCategory_id;
        $cour->description_cours = $request->description_cours;

        if ($request->file('photo')) {
            $photo = $request->photo;
            $photo_new_name = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move('storages/photoCours/', $photo_new_name);
            $cour->photo = '/storages/photoCours/' . $photo_new_name;
        }
        $cour->save();
        //episode
        for ($i = 0; $i < count($request->title); $i++) {

            $episode = new Episode();

            $episode->user_id = Auth::user()->id;
            $episode->cour_id =  $cour->id;
            $episode->title = $request->title[$i];
            $episode->slug = Str::slug($request->title[$i]);
            $episode->description = $request->description[$i];

            if ($request->file('photo_episode')) {
                $photo_episode = $request->photo_episode[$i];
                $photo_episode_new_name = time() . '.' . $photo_episode->getClientOriginalExtension();
                $photo_episode->move('storages/photo_episodeepisode/', $photo_episode_new_name);
                $episode->photo_episode = '/storages/photo_episodeepisode/' . $photo_episode_new_name;
            }


            $content = $request->description[$i];
            $dom = new \DomDocument();
            $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $imageFile = $dom->getElementsByTagName('img');

            foreach($imageFile as $item => $image){
                $data = $image->getAttribute('src');
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $imgeData = base64_decode($data);
                $image_name= "/uploads/" . time().$item.'.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $imgeData);

                $image->removeAttribute('src');
                $image->setAttribute('src', $image_name);
             }

            $content = $dom->saveHTML();

            $episode->save();
        }


        return redirect()->route('cours.index')->with('success', 'Cours crée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cour  $cour
     * @return \Illuminate\Http\Response
     */
    public function show(Cour $cour)
    {
        return view('admin.cours.show', compact('cour'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cour  $cour
     * @return \Illuminate\Http\Response
     */
    public function edit(Cour $cour)
    {
        $categoryCourses = CourCategory::all();
        return view('admin.cours.edit',compact('cour','categoryCourses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cour  $cour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cour $cour)
    {

        $this->validate($request, [
            'title_cours' => 'required|unique:cours,title_cours|min:10',
            'description_cours' => 'required|min:150',
            'type' => 'required',
            'heure' => 'required',
            'courCategory_id' => 'required',
            'photo' => 'mimes:png,jpeg,jpg'
        ]);
        $cour->user_id = Auth::user()->id;
        $cour->title_cours = $request->title_cours;
        $cour->type = $request->type;
        $cour->prix = $request->prix;
        $cour->heure = $request->heure;
        $cour->courCategory_id = $request->courCategory_id;
        $cour->description_cours = $request->description_cours;
        $cour->slug = Str::slug($request->title_cours);
        if ($request->file('photo')) {
            $photo = $request->photo;
            $photo_new_name = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move('storages/photoCours/', $photo_new_name);
            $cour->photo = '/storages/photoCours/' . $photo_new_name;
        }
        $cour->save();
        return redirect()->route('cours.index')->with('success', 'Cours mis à jours');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cour  $cour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cour $cour)
    {
        if ($cour) {
            $cour->delete();
        }
        return back()->with('success', 'Cours supprimé');
    }

    public function achatLivre(Cour $cour){

        $cours = Cour::find($cour->id);

        $achats =  CoursComplete::where(['cour_id'=> $cour->id])->paginate(10);

        return view('admin.cours.achat',compact('cour','achats'));

    }
}
