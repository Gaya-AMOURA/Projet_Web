@extends('auth.modele')

@section('contents')
    <style>
        div{
            text-align: center;
        }
    </style>
    <thead>
        <div class="btn-group-horizontal" role="group" aria-label="Button group with nested dropdown">

            <div class="btn-group" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Mon profil
                </button>
                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <li><a class="dropdown-item" href="{{route('mdpChanger')}}">Modifier le MDP</a></li>
                    <li><a class="dropdown-item" href="{{route('infos.modifier')}}">Modifier mes infos</a></li>
                </ul>
            </div>

            <div class="btn-group" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Gérer les utilisateurs
                </button>
                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <li><a class="dropdown-item" href="{{route('showUsers')}}">Liste des utilisateurs</a></li>
                    <li><a class="dropdown-item" href="{{route('showEnseignants')}}">Liste des enseignants</a></li>
                    <li><a class="dropdown-item" href="{{route('showEtudiants')}}">Liste des étudiants</a></li>
                    <li><a class="dropdown-item" href="{{route('admin_modifier')}}">Modifier un utilisateur</a></li>
                    <li><a class="dropdown-item" href="{{route('admin_créer')}}">Ajouter un utilisateur</a></li>
                </ul>
            </div>

            <div class="btn-group" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Gérer les cours
                </button>
                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <li><a class="dropdown-item" href="{{route('listeCours')}}">Tous les cours</a></li>
                    <li><a class="dropdown-item" href="{{route('AjoutCours')}}">Ajouter un cours</a></li>
                    <li><a class="dropdown-item" href="{{route('ModifierCours')}}">Modifier un cours</a></li>
                </ul>
            </div>
        
            <div class="btn-group" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Formations
                </button>
                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <li><a class="dropdown-item" href="{{route('listeFormation')}}">Liste des formations</a></li>
                    <li><a class="dropdown-item" href="{{route('ajoutFormation')}}">Ajouter une formation</a></li>
                    <li><a class="dropdown-item" href="{{route('ModifierFormation')}}">Modifier une formation</a></li>
                </ul>
            </div>

            <a type="button" class="btn btn-dark" href="{{route('déconnexion')}}">Déconnexion</a>
        </div>
    </thead>
    
    <center>
        <div class="col wf">
            <img src="plan-time.png" alt="plan-time">
        </div>
    </center>
@endsection
