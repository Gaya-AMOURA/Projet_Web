<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Hashing\BcryptHasher;

class RegisterUserController extends Controller
{
    public function form(){
        $form = DB::table('formations')->paginate(10);
        return view('auth.enregistrement',['form'=>$form]);
    }

    public function enregistrer(Request $request){
        $request->validate([
           'nom' => 'required|string|max:50',
           'prenom' => 'required|string|max:50',
            'login' => 'required|string|max:50|unique:users',
            'mdp' => 'required|string|confirmed',
        ]);

        $user = new User();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->login = $request->login;
        $user->mdp = Hash::make($request->mdp);
        $user->type = $request->type;
        $user->formation_id = $request->formation_id;
        $user->save();

        session()->flash('etat','Utilisateur ajouté ! ');

        Auth::connexion($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function changer(){
        $id =  Auth::id();
        return view('auth.changerMdp')->with('id', $id);
    }

    public function modifier(Request $request ,$id){
        $user = User::find($id);

        if (Hash::check($request->mdp , $user->mdp)) {

            $request->validate([
                'newmdp' => 'required|string',
            ]);
         $user->mdp = Hash::make($request->newmdp);
         $user->save();

        }else{
            return back()->with('etat','MDP invalide ! ');
        }
        return back()->with('etat','Modification appliquée ! ');
    }
}