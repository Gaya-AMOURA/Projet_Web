@extends('auth.modele')

@section('contents')

<div class="btn btn-dark" >
    <a href="{{route('etudiant_acceuil')}}">Acceuil</a><br>
</div>

<table class="table table-boredered table-dark">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Intitulé</th>
        </tr>
    </thead>
    <tbody>
    @if(!empty($cours) )
    @foreach($cours as $cour)
    <tr>
        <td>{{ $cour->id }}</td>
        <td>{{ $cour->intitule }}</td>
    </tr>
    @endforeach
    @else
    <tr>
        <td colspan="10">Pas de cours.</td>
    </tr>
    @endif
    </tbody>
</table>
@endsection
