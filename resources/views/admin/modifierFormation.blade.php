@extends('auth.modele')

@section('contents')
        <style>
        thead,tbody,h1,div{
            text-align: center;
        }
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
    </style>

    <p><br></p>

    <div>
        <a type="button" class="btn btn-dark" href="{{route('admin_acceuil')}}">
        Acceuil</a>
    </div>
    
    <p><br></p>
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

    <form method="post">
        <br>
        <fieldset>
            <legend><h1>Modifier une formation</h1></legend>

            <label for="id">ID : </label>
            <input type="text" name="id" value="{{old('id')}}" placeholder="ID"> <br> <br>

            <label for="intitule">Intitulé : </label>
            <input type="text" name="intitule" value="{{old('intitule')}}" placeholder="Intitulé"><br> <br>

            <input type="submit"class="btn btn-dark" value="Appliquer">
        </fieldset> 
        @csrf
    </form>
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
