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
    <p><br></p>
    <div>
        <a type="button" class="btn btn-dark" href="{{route('enseignant_acceuil')}}">Acceuil</a>
    </div>
    <p><br></p>

    <table class="table table-boredered table-dark">
        <thead>
            <th>
                <td>ID</td>
                <td>Intitulé</td>
                <td>Date de début</td>
                <td>Date de fin</td>
            </th>
        </thead>

        @if(!empty($planning))
            @foreach($planning as $p)
                <tbody>
                <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->intitule}}</td>
                    <td>{{$p->date_debut}}</td>
                    <td>{{$p->date_fin}}</td>
                </tr>
                </tbody>
            @endforeach
    </table>

    <form method="post">
        <br>
        <fieldset>
            <legend><h1></h1></legend>

            <label for="id">ID : </label>
            <input type="text" name="id" value="{{old('id')}}" placeholder="ID"> <br> <br>

            <label for="Date de début">Date de début : </label>
            <input type="text" name="date_debut" value="{{old('date_debut')}}" placeholder="Début"><br> <br>

            <label for="Date de fin"></label>
            <input type="text" name="date_fin" value="{{old('date_fin')}}" placeholder="Fin"><br> <br>

            <input type="submit"class="btn btn-dark" value="Appliquer">
        </fieldset>
        @csrf
    </form>

    @else
        <p>Indisponible</p>
    @endif
    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


@endsection
