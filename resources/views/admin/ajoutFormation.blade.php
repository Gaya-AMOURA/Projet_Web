@extends('auth.modele')

@section('contents')
    <center>

    	<style>
        tbody,h1,div{
            text-align: center;
        }
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
    <p><br></p>
    <div>
        <a type="button" class="btn btn-dark" href="{{route('admin_acceuil')}}">Acceuil</a>
    </div>
    
    <p><br></p>

        <form action="{{route('ajoutFormation')}}" method="post">
            <br>
            <fieldset>
            	<legend><h1>
            		Ajouter une formation</h1></legend>

            	<label for="intitule">Intitulé : 
            	</label>
            	<input type="text" name="intitule" value="{{old('intitule')}}" placeholder='Intitulé'> <br><br>
            	<input type="submit"class="btn btn-dark" value="Valider">
            </fieldset>
            @csrf
        </form>
    </center>

@endsection

