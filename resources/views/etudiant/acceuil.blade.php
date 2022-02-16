@extends('auth.modele')

@section('contents')
    <style>
        div{
            text-align: center;
        }
    </style>

    <div class="btn-group-horizontal" role="group" aria-label="Button group with nested dropdown">

        
        <div class="btn-group" role="group">
            <button id="btnGroupDrop1" type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Profil</button>

            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <li><a class="dropdown-item" href="{{route('mdpChanger')}}">Modifier le MDP</a></li>
                <li><a class="dropdown-item" href="{{route('infos.edit')}}">Modifier mes infos</a></li>
            </ul>
        </div>

        <div class="btn-group" role="group">
            <button id="btnGroupDrop1" type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Gestion des Inscriptions</button>

            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <li><a class="dropdown-item" href="{{route('ListeCours')}}">Mes cours</a></li>
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
