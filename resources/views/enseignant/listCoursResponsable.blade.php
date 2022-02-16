@extends('auth.modele')

@section('contents')

    <div class="btn btn-dark" >
        <a href="{{route('enseignant_acceuil')}}">Acceuil</a><br>
    </div>

    <table class="table table-boredered table-dark">
        <tr class="thead-info">
            <th>Intitulé</th>
        </tr>
        <tbody>
        @if(!empty($cours) )
            @foreach($cours as $cour)
                <tr>
                    <td>{{ $cour->intitule }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="10">Vous n'êtes responsable d'aucun cours.</td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection
