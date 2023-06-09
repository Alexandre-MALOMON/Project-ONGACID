<?php

namespace App\Http\Controllers;

use App\Models\Candidature;
use App\Models\Recrutement;
use Illuminate\Http\Request;

class CandidatureController extends Controller
{
    public function postuler(Request $request, Recrutement $recrutement)
    {

        $this->validate($request, [
            'nom' => 'required',
            'prenom'  => 'required',
            'email' => 'required',
            'contact' => 'required',
            'pays' => 'required',
            'ville' => 'required',
            'cv' => 'required|mimes:pdf,PDF',
            'lettre' => 'required|mimes:pdf,PDF',
            'diplome' => 'required',
        ]);
        if ($recrutement->status == 1) {
            $candidature = new Candidature();

            $candidature->recrutement_id = $recrutement->id;
            $candidature->nom = $request->nom;
            $candidature->prenom = $request->prenom;
            $candidature->email = $request->email;
            $candidature->contact = $request->contact;
            $candidature->pays = $request->pays;
            $candidature->ville = $request->ville;
            if ($request->has('cv')) {
                $cv = $request->cv;
                $image_cv_name = time() . '.' . $cv->getClientOriginalExtension();
                $cv->move('storages/cv/', $image_cv_name);
                $candidature->cv = '/storages/cv/' . $image_cv_name;
            }
            if ($request->has('lettre')) {
                $lettre = $request->lettre;
                $image_lettre_name = $request->nom .'_'.$request->prenom. '.' . $lettre->getClientOriginalExtension();
                $lettre->move('storages/lettre/', $image_lettre_name);
                $candidature->lettre = '/storages/lettre/' . $image_lettre_name;
            }
            if ($request->diplome) {
                foreach ($request->file('diplome')  as $file) {
                    $name = $request->nom .'_'.$request->prenom . '.' . $file->getClientOriginalName();
                    $file->move('storages/diplome/', $name);
                    $data[] = '/storages/diplome/' . $name;
                    $candidature->diplome = json_encode($data);
                }
            }
            $candidature->save();
            return back()->with('success', 'Vous avez postuler nous vous feront un retour.');
        } else {
            return back()->with('success', 'Candidature clôturéé');
        }
    }

    public function volontariat(Request $request, Recrutement $recrutement)
    {

        $this->validate($request, [
            'nom' => 'required',
            'prenom'  => 'required',
            'email' => 'required',
            'contact' => 'required',
            'pays' => 'required',
            'ville' => 'required',
            'cv' => 'required|mimes:pdf,PDF',
        ]);
        if ($recrutement->status == 1) {
            $candidature = new Candidature();

            $candidature->recrutement_id = $recrutement->id;
            $candidature->nom = $request->nom;
            $candidature->prenom = $request->prenom;
            $candidature->email = $request->email;
            $candidature->contact = $request->contact;
            $candidature->pays = $request->pays;
            $candidature->ville = $request->ville;
            if ($request->has('cv')) {
                $cv = $request->cv;
                $image_cv_name = $request->nom .'_'.$request->prenom. '.' . $cv->getClientOriginalExtension();
                $cv->move('storages/cv/', $image_cv_name);
                $candidature->cv = '/storages/cv/' . $image_cv_name;
            }

            $candidature->save();
            return back()->with('success', 'Vous avez postuler nous vous feront un retour.');
        } else {
            return back()->with('success', 'Candidature clôturéé');
        }
    }
}
