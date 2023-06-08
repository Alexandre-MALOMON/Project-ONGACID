<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Completion;
use App\Models\Cour;
use App\Models\CoursComplete;
use App\Models\Episode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function dashboard()
    {
        $courCompletes = CoursComplete::where(['user_id' => Auth::user()->id])->paginate(10);
        $episodes = Episode::all();
        $completions = Completion::all();
        return view('profile.dashboard', compact('courCompletes', 'episodes', 'completions'));
    }

    public function parametre()
    {
        return view('profile.setting');
    }

    public function deleteAcount(Request $request, User $user)
    {
        if ($user) {
            $user->delete();
            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/');
        }
    }
}
