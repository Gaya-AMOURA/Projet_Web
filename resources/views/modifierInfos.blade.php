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
    <form action="{{route('infosmodifier', ['id'=>$id])}}" method='POST'>
    	<br>
            
            <fieldset>
            	<legend><h1>Modifier Infos</h1></legend>

            	<label for="nom">Nouveau nom : </label>
            	<input type="text"   name="nom" placeholder="Nom" value="{{old('nom')}}"> <br><br>

            	<label for="prenom">Nouveau prénom : </label>
            	<input type="text"  name="prenom" placeholder="Prénom" value="{{old('prenom')}}"> <br><br>
               
                @csrf
                <button type="submit" class="btn btn-dark">Appliquer</button>
            </fieldset>
        </form>
</center>
@endsection