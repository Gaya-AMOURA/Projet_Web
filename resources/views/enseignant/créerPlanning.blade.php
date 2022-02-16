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
</style>

<p><br><br></p>

<div class="btn btn-dark" >
    <a href="{{route('enseignant_acceuil')}}">Acceuil</a><br>
</div>

<p><br><br></p>

<center>

    <form action="" method="post">
        <br>

        <fieldset>
            <legend><h1>Création d'un planning</h1></legend>

            <label for="cours_id">Cours_ID</label>
            <input type="text" name="cours_id" value="{{old('cours_id')}}" placeholder='Cours_ID'> <br><br>

            <label for="date_debut">Date Début : </label>
            <input type="text" name="date_debut" value="{{old('date_debut')}}"placeholder='Date Début'><br><br>

            <label for="date_fin">Date Fin : </label>
            <input type="text" name="date_fin" value="{{old('date_fin')}}"placeholder='Date Fin'><br><br>

            <input type="submit"class="btn btn-dark" value="Valider">
        </fieldset>   
        @csrf
    </form>
</center>
@endsection
