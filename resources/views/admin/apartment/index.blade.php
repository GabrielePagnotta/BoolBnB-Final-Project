@extends('layouts.app')
@section('content')
<div class="container">

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">Indirizzo</th>
                <th scope="col">Foto</th>
                <th scope="col">Dati</th>
            </tr>
        </thead>
        <tbody>
            @foreach($info as $elem)
            <tr>
                <th scope="row">1</th>
                <td>{{$elem['title']}}</td>
                <td>{{$elem['address']}}</td>
                @if('cover'){
                <td>img{{$elem['cover']}}</td>
                }@else{
                <td><img src="https://www.associazionejam.it/wp-content/uploads/2017/04/non-disponibile-300x300.png"
                        alt="image-not-found"></td>
                }

            </tr>

        @endforeach
        </tbody>
    </table>
</div>
@endsection
