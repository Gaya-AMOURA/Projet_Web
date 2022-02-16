@extends('auth.modele')

@section('contents')
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

    <h1>Liste des cours</h1>


    <table class="table table-bordered table-dark">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Intitulé</th>
                <th scope="col">User_ID</th>
                <th scope="col">Formation_ID</th>
            </tr>
        </thead>

        @if(!empty($cours))
            @foreach($cours as $cour)
                <tbody>
                <tr>
                    <td>{{$cour->id}}</td>
                    <td>{{$cour->intitule}}</td>
                    <td>{{$cour->user_id}}</td>
                    <td>{{$cour->formation_id}}</td>
                </tr>
                </tbody>
            @endforeach
    </table>
    <div class="col-md-12">
        {!!$cours->links() !!}
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
