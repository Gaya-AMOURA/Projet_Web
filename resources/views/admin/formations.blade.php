@extends('auth.modele')

@section('contents')
<style>
        table,tbody,h1,div{
            text-align: center;
        }
    </style>
    <p><br></p>
    <div>
        <a type="button" class="btn btn-dark" href="{{route('admin_acceuil')}}">Acceuil</a>
    </div>
    
    <p><br></p>

    <h1>Liste des formations</h1>

    <table class="table table-bordered table-dark">
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
