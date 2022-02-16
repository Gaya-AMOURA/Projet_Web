@extends('auth.modele')

@section('contents')
    <style>
        div{
            text-align: center;
        }
    </style>

    <div class="btn-group-horizontal" role="group" aria-label="Button group with nested dropdown">

        <a type="button" class="btn btn-dark" href="{{route('ListeCoursResponsable')}}">Cours Responsable</a>
        <div class="btn-group" role="group">
            <button id="btnGroupDrop1" type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Profil</button>
            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <li><a class="dropdown-item" href="{{route('mdpChanger')}}">Modifier le MDP</a></li>
                <li><a class="dropdown-item" href="{{route('infos.modifier')}}">Modifier mes infos</a></li>
            </ul>
        </div>

        <div class="btn-group" role="group">
            <button id="btnGroupDrop1" type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Planning</button>
            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <li><a class="dropdown-item" href="{{route('PlanningCours')}}">Planning</a></li>
                <li><a class="dropdown-item" href="{{route('nouveauPlanning')}}">Ajouter une séance</a></li>
                <li><a class="dropdown-item" href="{{route('ModifierPlanning')}}">Modifier une séance</a></li>
            </ul>
        </div>

        <a type="button" class="btn btn-dark" href="{{route('déconnexion')}}">Deconnexion</a>
    </div>
    <center>
        <div class="col wf">
            <img src="plan-time.png" alt="plan-time">
        </div>
    </center>
    </div>

@endsection
