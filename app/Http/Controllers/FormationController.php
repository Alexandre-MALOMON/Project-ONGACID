<?php

namespace App\Http\Controllers;

use App\Mail\AgendaGratui;
use App\Mail\PassMail;
use App\Models\AgendaInscrit;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formations = Formation::orderBy('id', 'desc')->paginate(10);

        return view('admin.formation.index', compact('formations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.formation.create');
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
            'title' => 'required|unique:formations,title',
            'photo' => 'required|mimes:png,jpg,jpeg,webp',
            'debut' => 'required|date',
            'fin' => 'required|date',
            'lieu' => 'required',
            'heure' => 'required',
            'type' => 'required',
            'description' => 'required'
        ]);
        $formation = new Formation();
        $formation->title = $request->title;
        $formation->slug = Str::slug($request->title);
        $formation->debut  = $request->debut;
        $formation->fin  = $request->fin;
        $formation->lieu  = $request->lieu;
        $formation->heure  = $request->heure;
        $formation->type  = $request->type;
        $formation->prix  = $request->prix;
        $formation->lien  = $request->lien;
        $formation->description  = $request->description;
        if ($request->file('photo')) {
            $photo = $request->photo;
            $photo_new_name = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move('storages/agenda/', $photo_new_name);
            $formation->photo = '/storages/agenda/' . $photo_new_name;
        }
        $formation->save();

        return redirect()->route('formation.index')->with('success', 'Formation programée');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function show(Formation $formation)
    {
        return view('admin.formation.show', compact('formation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function edit(Formation $formation)
    {
        return view('admin.formation.edit', compact('formation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Formation $formation)
    {
        $this->validate($request, [
            'title' => 'required',
            'photo' => 'mimes:png,jpg,jpeg,webp',
            'debut' => 'required|date',
            'fin' => 'required|date',
            'lieu' => 'required',
            'heure' => 'required',
            'type' => 'required',
            'description' => 'required'
        ]);

        $formation->title = $request->title;
        $formation->slug = Str::slug($request->tile);
        $formation->debut  = $request->debut;
        $formation->fin  = $request->fin;
        $formation->lieu  = $request->lieu;
        $formation->heure  = $request->heure;
        $formation->type  = $request->type;
        $formation->prix  = $request->prix;
        $formation->lien  = $request->lien;
        $formation->description  = $request->description;
        if ($request->file('photo')) {
            $photo = $request->photo;
            $photo_new_name = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move('storages/agenda/', $photo_new_name);
            $formation->photo = '/storages/agenda/' . $photo_new_name;
        }
        $formation->save();

        return redirect()->route('formation.index')->with('success', "Formation mise à jour");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formation $formation)
    {
        if ($formation) {
            $formation->delete();

            return back()->with('success', 'Formation supprimée');
        }
    }

    public function agendaInscrit(Request $request, Formation $formation)
    {
       $inscription= Validator::make($request->all(),  [
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'contact' => 'required'
        ]);
      //  dd($request->all());
        if($inscription ->fails()){
            return response()->json($inscription->errors());
        }
      $inscrir =  AgendaInscrit::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'contact' => $request->contact,
            'formation_id' => $formation->id,
            'transaction_id'=> $request->transaction_id,
            'montant'=> $request->montant,
            'payment_method'=> $request->payment_method,
            'status'=> $request->status,
        ]);
        $infos = [
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'title' => $formation->title,
            'lien' => $formation->lien,
            'lieu' => $formation->lieu,
            'heure' => $formation->heure,
            'debut' => $formation->debut,
            'fin' => $formation->fin,
        ];
        if ($formation->type == 1) {
            Mail::to($request->email)->send(new AgendaGratui($infos));
            return response()->json([
                'status'=>200,
                'inscrit' =>  $inscrir
            ]);
        } else {
            Mail::to($request->email)->send(new AgendaGratui($infos));
            return back()->with('success', 'Votre inscription est validée nous vous enverront un mail.');
        }
    }

    public function participant(Formation $formation)
    {
        $forma = $formation->id;
        $formation = Formation::find($forma);
        $participants = AgendaInscrit::where(['formation_id' => $forma])->paginate(15);
        //$participants->appends(['formation' => $forma]);
        return view('admin.formation.participant', compact('participants', 'formation'));
    }

    public function pass(AgendaInscrit $participant)
    {
        $participant->status = 1;
        $participant->save();
        $agenda = Formation::find($participant->formation_id);
        $infos = [
            'nom' => $participant->nom,
            'prenom' => $participant->prenom,
            'title' => $agenda->title,
            'lien' => $agenda->lien,
            'lieu' => $agenda->lieu,
            'heure' => $agenda->heure,
            'debut' => $agenda->debut,
            'fin' => $agenda->fin,
        ];
        Mail::to($participant->email)->send(new PassMail($infos));

        return back()->with('success', 'Pass envoyé avec succès');
    }
}
