@extends('auth.modele')

@section('contents')
    <html>
    <head>
        <meta charset="utf-8">
        <style>
            body{
                
                font-size: large;
                background-color: #3399ff;
                text-align: center;
                color:black;
            }
        </style>
    </head>
    <body>
        <div class="col wf">
            <center>  <img src="plan-time.png" class="img-fluid" alt="plan_time"> </center></br>
        </div>
        <button type="button" class="btn btn-dark">
        <a href="/enregistrement">Inscription</a></button>
        <button class="btn btn-dark">
        <a href="/connexion">Connexion</a></button><br><br>
        <q><i><b>La vie est un long chemin où vous êtes enseignant et l'étudiant.
        Parfois, vous enseignez, mais chaque jour, vous apprenez.</b></i></q><br><br>
    </body>
    </html>
@endsection
