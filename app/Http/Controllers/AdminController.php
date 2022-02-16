<?php


namespace App\Http\Controllers;


use App\Models\Cours;
use App\Models\Formation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function showUser()
    {
        $user = DB::table('users')->paginate(10);
        return view('admin.showUsers', ['user' => $user]);
    }

    public function showEnseignant()
    {
        $user = DB::table('users')->where('type', 'enseignant')->paginate(10);
        return view('admin.showEnseignants', ['user' => $user]);
    }

    public function showEtudiant()
    {
        $user = DB::table('users')->where('type', 'etudiant')->paginate(10);
        return view('admin.showEtudiants', ['user' => $user]);
    }

    public function modifierAdmin()
    {
        $user = DB::table('users')->paginate(10);
        return view('admin.modifier', ['user' => $user]);
    }

    public function modifier(Request $request)
    {
        $validated = $request->validate([
            'id' => 'bail|required|integer|gte:0|lte:150',
            'nom' => 'required|alpha|max:50',
            'prenom' => 'required|alpha|max:50',
            'type' => 'required|alpha|max:8'
        ]);

        $user = User::findOrFail($validated['id']);
        $user->nom = $validated['nom'];
        $user->prenom = $validated['prenom'];
        $user->type = $validated['type'];
        $user->save();

        $request->session()->flash('etat', 'Modification validée !');
        return redirect()->route('admin_modifier');
    }

    public function showCours()
    {
        $cours = DB::table('cours')->paginate(10);
        return view('admin.cours', ['cours' => $cours]);
    }

    public function formCours()
    {
        return view('admin.ajoutCours');
    }

    public function créerCours(Request $request)
    {
        $validated = $request->validate([
            'intitule' => 'required|alpha|max:50',
            'user_id' => 'required|integer|gte:0|lte:150',
            'formation_id' => 'required|integer|gte:0|lte:150'
        ]);
        $cours = new Cours();
        $cours->intitule = $validated['intitule'];;
        $cours->formation_id = $validated['formation_id'];;
        $cours->user_id = $validated['user_id'];
        $cours->save();

        session()->flash('etat', 'Cours ajouté !');
        return redirect()->route('admin_acceuil');
    }

    public function formModifierCours()
    {
        $cours = DB::table('cours')->paginate(10);
        return view('admin.modifierCours', ['cours' => $cours]);
    }

    public function modifierCours(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer|gte:0|lte:150',
            'intitule' => 'required|alpha|max:50',
            'user_id' => 'required|integer|gte:0|lte:150',
            'formation_id' => 'required|integer|gte:0|lte:150'
        ]);
        $cours = Cours::findOrFail($validated['id']);
        $cours->intitule = $validated['intitule'];;
        $cours->formation_id = $validated['formation_id'];;
        $cours->user_id = $validated['user_id'];
        $cours->save();

        session()->flash('etat', 'Cours modifié ! ');
        return redirect()->route('admin_acceuil');
    }

    public function showFormations()
    {
        $form = DB::table('formations')->paginate(10);
        return view('admin.formations', ['form' => $form]);
    }

    public function formModifierFormation()
    {
        $form = DB::table('formations')->paginate(10);
        return view('admin.modifierFormation', ['form' => $form]);
    }

    public function modifierFormation(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer|gte:0|lte:150',
            'intitule' => 'required|string|max:50'
        ]);
        $form = Formation::findOrFail($validated['id']);
        $form->intitule = $validated['intitule'];;
        $form->save();

        session()->flash('etat', 'Formation modifiée');
        return redirect()->route('admin_acceuil');
    }

    public function formFormation()
    {
        return view('admin.ajoutFormation');
    }

    public function créerFormation(Request $request)
    {
        $validated = $request->validate([
            'intitule' => 'required|string|max:50',
        ]);
        $form = new Formation();
        $form->intitule = $validated['intitule'];;

        $form->save();

        session()->flash('etat', 'Formation ajoutée');
        return redirect()->route('admin_acceuil');
    }

    public function créerUser(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'login' => 'required|string|max:100|unique:users',
            'mdp' => 'required|string|confirmed',
            'type' => 'required|alpha',
        ]);

        $user = new User();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->login = $request->login;
        $user->mdp = Hash::make($request->mdp);
        $user->formation_id = $request->formation_id;
        $user->save();

        session()->flash('etat', 'Utilisateur ajouté');
        return redirect()->route('admin_acceuil');
    }

    public function formCréer(){
        return view('admin.créer');
    }
}