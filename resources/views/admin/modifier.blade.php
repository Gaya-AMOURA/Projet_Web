@extends('auth.modele')

@section('contents')
    <p><br></p>

    <style>
        div,table,tbody,h1,form{
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

    <div>
        <a type="button" class="btn btn-dark" href="{{route('admin_acceuil')}}">Acceuil</a>    
    </div>



    <h1>Modification des informations</h1>

    <table class="table table-bordered table-dark">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Formation_ID</th>
                <th scope="col">Type</th>
            </tr>
        </thead>


        @if(!empty($us))
            @foreach($us as $users)
                <tbody>
                <tr>
                    <td>{{$users->id}}</td>
                    <td>{{$users->nom}}</td>
                    <td>{{$users->prenom}}</td>
                    <td>{{$users->formation_id}}</td>
                    <td>{{$users->type}}</td>
                </tr>
                </tbody>
            @endforeach
    </table>

    <form method="post">
        <br>
        <fieldset>
            <legend><h1>Formulaire</h1></legend>
            
            <label for="id">ID : </label>
            <input type="text" name="id" value="{{old('id')}}" placeholder="id"> <br> <br>

            <label for="nom">Nom : </label>
            <input type="text" name="nom" value="{{old('nom')}}" placeholder='Nom'> <br><br>

            <label for="prenom">Prénom : </label>
            <input type="text" name="prenom" value="{{old('prenom')}}" placeholder="Prenom"><br> <br>

            <label for="type">Type : </label>
            <input type="text" name="type" value="{{old('type')}}" placeholder="Type"><br> <br>

            <input type="submit"class="btn btn-dark" value="Appliquer">
        </fieldset> 
        @csrf
    </form>
    <div class="col-md-12">
        {!!$us->links() !!}
    </div>

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
