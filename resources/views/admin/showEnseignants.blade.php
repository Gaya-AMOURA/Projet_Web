@extends('auth.modele')

@section('contents')
    <p><br></p>
    <style>
        table,tbody,h1{
            text-align: center;
        }
    </style>

    <div>
        <a type="button" class="btn btn-dark" href="{{route('admin_acceuil')}}">Acceuil</a>
    </div>

    <p><br></p>

    <h1>Liste des enseignants</h1>

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
                    <td>{{$users->type->enseignant}}</td>
                </tr>
                </tbody>
            @endforeach
    </table>

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
