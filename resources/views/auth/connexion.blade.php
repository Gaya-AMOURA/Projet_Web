@extends('auth.modele')
@section('contents')

    <center>
        <br><br>
        <style>
            legend{
                font-size: large;
            }
            input{
                width: 25%;
            }
            fieldset{
                padding:10px;
                margin:10px 10px;
                border:5px solid #1a1a1a;
            }
        </style>
        
        <form method="post">
            <br>

            <fieldset>
                <legend><h1>Connexion</h1></legend>
            
                <label for="login">Login : </label>
                <input type="text" name="login" value="{{old('login')}}" placeholder="Login"> <br> <br>


                <label for="mdp">MDP : </label>
                <input type="password" name="mdp" placeholder=" Mot de passe"><br> <br>
                
                <input type="submit"class="btn btn-dark" value="Envoyer">
            @csrf
            </fieldset>
        </form>

        <a href="{{route("enregistrement")}}"><b>Créer un compte</b></a>
    </center>
    <br>


@endsection
