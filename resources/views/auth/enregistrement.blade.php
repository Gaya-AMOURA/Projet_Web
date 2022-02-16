@extends('auth.modele')

@section('contents')


    <center>
        <h1>Inscription</h1>
        <table class="table table-boerdered table-dark">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Intitulé</th>
                </tr>
            </thead>

            @if(!empty($form))
                @foreach($form as $f)
                    <tbody>
                    <tr>
                        <td>{{$f->id}}</td>
                        <td>{{$f->intitule}}</td>
                    </tr>
                    </tbody>
                @endforeach
        </table>
        <div class="col-md-12">
            {!!$form->links() !!}
        </div>

        @else
            <p>Indisponible</p>
        @endif
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
        
        <form action="{{route('enregistrement')}}" method="post">
            <br>
        <fieldset id="Informations">
            <legend><h1>Informations</h1></legend>


            <label for="nom">Nom : </label>
            <input type="text" name="nom" value="{{old('nom')}}" placeholder='Nom'> <br><br>

            <label for="prenom">Prénom : </label>
            <input type="text" name="prenom" value="{{old('prenom')}}"placeholder='Prénom'><br><br>

            <label for="login">Login : </label>
            <input type="text" name="login" value="{{old('login')}}"placeholder='Login'><br><br>

            <label for="mdp">MDP : </label>
            <input type="password" name="mdp"placeholder='Mot de passe'><br><br>

            <label for="nom">Cofirm MDP : </label>
            <input type="password" name="mdp_confirmation"placeholder='Confirmez votre mot de passe' size="20"><br><br>

            <label for="formation_id">Formation_ID : </label>
            <input type="text" name="formation_id" placeholder="Formation_ID"><br><br>

            <label for="type">Type : </label>
            <input type="text" name="type" placeholder="Etudiant,Enseignant,Admin"><br><br>

            <input type="submit"class="btn btn-dark" value="Envoyer">
            @csrf
        </fieldset>
        </form>
    
    </center>

@endsection
