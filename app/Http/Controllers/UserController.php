<?php

namespace App\Http\Controllers;

use App\Models\Planning;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function formModifier()
    {
        $id = Auth::id();
        return view('modifierInfos')->with('id', $id);
    }

    public function modifier(Request $request, $id)
    {
        $user = User::findorfail($id);
        $validated = $request->validate(
            [
                'nom' => 'required|string|max:50',
                'prenom' => 'required|string|max:50',
            ]
        );
        $user->nom = $validated['nom'];
        $user->prenom = $validated['prenom'];
        $user->save();
        $request->session()->flash('etat','Modification appliquée !');
        return back();
    }

    public function showListCours(){
        return view('listCours');
    }

    public function listCours(){
        $id = AUTH::id();

        $cours = DB::table('cours')->join('users','users.formation_id','=','cours.formation_id')
            ->where('users.id',$id)
            ->groupByRaw('cours.id ,cours.intitule')
            ->select('intitule')
        ->get();

        return view('etudiant.listCours',['cours'=>$cours]);
    }

    public function listCoursResp(){
        $id = AUTH::id();

        $cours = DB::table('cours')->join('users','users.id','=','cours.user_id')
            ->where('users.id',$id)
            ->select('intitule')
        ->get();

        return view('enseignant.listCoursResponsable',['cours'=>$cours]);
}

    public function planningCours(){
        $id = Auth::id();

        $cours = DB::table('cours')->join('plannings','plannings.cours_id','=','cours.id')
            ->where('cours.user_id',$id)
            ->select('cours.intitule','plannings.date_debut','plannings.date_fin')
        ->get();

        return view('enseignant.planningCours',['cours'=>$cours]);
    }

    public function formCréerPlanning(){
        return view('enseignant.créerPlanning');
    }

    public function créerPlanning(Request $request)
    {
        $validated = $request->validate([
            'cours_id' => 'required|integer|gte:0|lte:50',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date'
        ]);
        $cour = new Planning();
        $cour->cours_id = $validated['cours_id'];
        $cour->date_debut = $validated['date_debut'];
        $cour->date_fin = $validated['date_fin'];
        $cour->save();

        session()->flash('etat', 'Planning ajouté ! ');
        return redirect()->route('enseignant_acceuil');
    }

    public function formModifierPlanning(){
        $id = AUTH::id();
        $planning = DB::table('cours')->join('plannings','plannings.cours_id','=','cours.id')
            ->where('cours.user_id',$id)
            ->select('plannings.id','cours.intitule','plannings.date_debut','plannings.date_fin')
            ->get();
        return view('enseignant.modifierPlanning',['planning'=>$planning]);
    }

    public function modifierPlanning(Request $request){

        $validated = $request->validate([
            'id' => 'required|integer',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date'
        ]);

        $P = Planning::findOrFail($validated['id']);
        $P->date_debut = $validated['date_debut'];
        $P->date_fin = $validated['date_fin'];
        $P->save();
        session()->flash('etat', 'Planning Modifié ! ');
        return redirect()->route('enseignant_acceuil');
    }
}