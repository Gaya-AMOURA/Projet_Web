<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function form(){
        return view('auth.connexion');
    }

    public function connexion(Request $request){

        $request->validate([
            'login' => 'required|string',
            'mdp' => 'required|string'
            ]);

        $credentials = ['login' => $request->input('login'), 'password' => $request->input('mdp')];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $request->session()->flash('etat','Connexion aboutie ! ');

            if(Auth::user()->EstAdmin()){
                return redirect()->intended('/admin');
            }
            if(Auth::user()->EstEtudiant()){
                return redirect()->intended('/etudiantAcceuil');
            }
            if(Auth::user()->EstEnseignant()){
                return redirect()->intended('/enseignantAcceuil');
            }
            return redirect()->intended('/erreur');
        }
        return back()->withErrors([
            'login' => 'Veuillez réinsérer vos données.',
        ]);
    }

    public function déconnexion(Request $request){
        Auth::déconnexion();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}