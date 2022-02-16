@extends('auth.modele')

@section('contents')
    <center>
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

    <p><br><br></p>
    <div>
        <a type="button" class="btn btn-dark" href="{{route('admin_acceuil')}}">Acceuil</a>    
    </div>

    <form  action="{{route('changerMdp', ['id'=>$id])}}" method="post">
    	<br>
    	<fieldset>
    		<legend><h1>Modifier MDP</h1></legend>

    		<label for="mdp">MDP actuel : 
    		</label>
                <input type="password" name="mdp" placeholder=" Mot de passe"><br> <br>

            <label for="mdp">Nouveau MDP : </label>
                <input type="password" name="newmdp" placeholder=" Mot de passe"><br> <br>

            <input type="submit" class="btn btn-dark" value="Appliquer">
    	</fieldset>
        @csrf
    </form>
    </center>
@endsection
