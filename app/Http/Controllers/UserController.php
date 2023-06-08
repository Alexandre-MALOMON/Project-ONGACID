<?php

namespace App\Http\Controllers;

use App\Mail\UserMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('lastname', 'asc')->where('role', '!=', '0')->paginate(10);

        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'lastname' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'max:255'],
            'role' => ['required', 'max:255'],
            'photo' => 'file|mimes:png,jpg,jpeg,psd',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            //'password' => ['required', 'confirmed', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/', Rules\Password::defaults()],
        ]);
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $longueurMax = strlen($caracteres);

        $chaineAleatoire = '';
        for ($i = 0; $i < 9; $i++) {
            $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
        }
        $user = new User();
        $user->lastname = $request->lastname;
        $user->firstname = $request->firstname;
        $user->contact = $request->contact;
        $user->role = $request->role;
        if ($request->file('photo')) {
            $photo = $request->photo;
            $photo_new_name = $request->lastname . '_' . $request->firstname . '.' . $photo->getClientOriginalExtension();
            $photo->move('storages/user/', $photo_new_name);
            $user->photo = '/storages/user/' . $photo_new_name;
        } else {
            $user->photo = '/images/user.svg';
        }
        $user->email = $request->email;
        $user->password = Hash::make($chaineAleatoire);

        $users = [
            'nom' => $request->lastname,
            'prenom' => $request->firstname,
            'password' => $chaineAleatoire,
            'email' => $request->email,
        ];

        Mail::to($request->email)->send(new UserMail($users));
        $user->save();

        return redirect()->route('user.index')->with('success', 'Utilisateur créer avec succèss');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'status' => 'required'
        ]);

        // $user->update($request->all());

        $user->status = $request->status;
        $user->save();


        if ($request->status == 0) {
            return back()->with('success', 'Utilisateur bloqué');
        } else {
            return back()->with('success', 'Utilisateur déloqué');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        if ($user) {
            if (file_exists(public_path($user->photo))) {
                unlink(public_path($user->photo));
            }
            $user->delete();
            return back()->with('success', 'Utilisateur supprimé');
        }
    }

    public function updateProfil(Request $request, User $user)
    {

        $this->validate($request, [
            'lastname' => 'required',
            'firstname' => 'required',
            'email' => 'required'
        ]);
        // $user->update($request->all());
        $user->lastname = $request->lastname;
        $user->firstname = $request->firstname;
        $user->email = $request->email;
        if ($request->password) {
            $user->password =  Hash::make($request->password);
        }
        $user->save();
        return back()->with('success', 'Information mise à jour');
    }
}
