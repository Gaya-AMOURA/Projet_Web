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
        <p><br></p>

        <div>
            <a type="button" class="btn btn-dark" href="{{route('admin_acceuil')}}">Acceuil</a>
        </div>

        <p><br></p>

        <style>
            h1,div{
            text-align: center;
            }
        </style>

        <form action="{{route('AjoutCours')}}" method="post">
            <br>
            <fieldset>
                <legend><h1>Ajouter un cours</h1></legend>

                <label for="intitule">Intitulé : </label>
                <input type="text" name="intitule" value="{{old('intitule')}}" placeholder='Intitulé'> <br><br>

                <label for="formation_id">Formation_ID : </label>
                <input type="text" name="formation_id" value="{{old('formation_id')}}"placeholder='Formation_ID'><br><br>

                <label for="user_id">User_ID : </label>
                <input type="text" name="user_id" value="{{old('user_id')}}"placeholder='User_ID'><br><br>

                <input type="submit"class="btn btn-dark" value="Valider">
            </fieldset>

            
            @csrf
        </form>
    </center>

@endsection
