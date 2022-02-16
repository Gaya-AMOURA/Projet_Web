@extends('auth.modele')

@section('contents')
    <p><br></p>
    <div>
        <a type="button" class="btn btn-dark" href="{{route('admin_acceuil')}}">Acceuil</a>
    </div>
    
    <p><br></p>
    <style>
            legend{
                font-size: large;
            }
            input{
                width: 25%;
            }
            fieldset{
                text-align: center;
                padding:10px;
                margin:10px 10px;
                border:5px solid #1a1a1a;
            }
            h1,div{
            text-align: center;
        }
    </style>

    <table class="table table-boredered table-dark">
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

    <form method="post">
            <br>
            <fieldset>
                <legend><h1>Modifier un cours</h1></legend>

                <label for="id">ID : </label>
                <input type="text" name="id" value="{{old('id')}}" placeholder="ID"> <br> <br>

                <label for="intitule">Intitulé : </label>
                <input type="text" name="intitule" value="{{old('intitule')}}" placeholder='Intitulé'> <br><br>

                <label for="user_id">User_ID : </label>
                <input type="text" name="user_id" value="{{old('user_id')}}"placeholder='User_ID'><br><br>

                <label for="formation_id">Formation_ID : </label>
                <input type="text" name="formation_id" value="{{old('formation_id')}}"placeholder='Formation_ID'><br><br>

                <input type="submit"class="btn btn-dark" value="Valider">
            </fieldset>

            
            @csrf
        </form>

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
