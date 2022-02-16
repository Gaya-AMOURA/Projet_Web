@extends('auth.modele')

@section('contents')
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
            div{
                text-align: center
            }
        </style>
    <center>
        <p><br><br></p>
        <div>
            <a type="button" class="btn btn-dark" href="{{route('admin_acceuil')}}">Acceuil</a>    
        </div>
        <form action="" method="post">
            <br>
        <fieldset id="Informations">
            <legend><h1>Créer un utilisateur</h1></legend>
            
            <label for="nom">Nom : </label>
            <input type="text" name="nom" value="{{old('nom')}}" placeholder='Nom'> <br><br>

            <label for="prenom">Prénom : </label>
            <input type="text" name="prenom" value="{{old('prenom')}}"placeholder='Prénom'><br><br>

            <label for="type">Type : </label>
            <input type="text" name="type" placeholder="Etudiant,Enseignant,Admin"><br><br>

            <label for="login">Login : </label>
            <input type="text" name="login" value="{{old('login')}}"placeholder='Login'><br><br>

            <label for="mdp">MDP : </label>
            <input type="password" name="mdp"placeholder='Mot de passe'><br><br>

            <label for="nom">Cofirm MDP : </label>
            <input type="password" name="mdp_confirmation"placeholder='Confirmez votre mot de passe' size="20"><br><br>

            <label for="formation_id">Formation_id : </label>
            <input type="text" name="formation_id" placeholder="Formation_id"><br><br>

            <input type="submit"class="btn btn-dark" value="Valider">
            @csrf
        </fieldset>
        </form>
    </center>
@endsection
