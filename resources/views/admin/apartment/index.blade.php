@extends('layouts.app')
@section('content')
<div class="container">

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Indirizzo</th>
                <th scope="col">Foto</th>
                <th scope="col">Dati</th>
            </tr>
        </thead>
        <tbody>
            @foreach($info as $elem)
            <tr>

                <td class="w-25">{{$elem['title']}}</td>
                <td>{{$elem['address']}}</td>
                <td>
                    @if($elem['cover'])
                       <img src="{{asset("storage/$elem->cover")}}" alt="cover-img">
                    @else
                        <img class='w-25' src="https://www.associazionejam.it/wp-content/uploads/2017/04/non-disponibile-300x300.png" alt="image-not-found">
                    @endif
                </td>
                <td>
                    <a href="{{route('editApartment',$elem->id)}}"><i class="fa-regular fa-pen-to-square fs-1"></i></a>
                    <a href=""><i class="fa-solid fa-chart-simple fs-1"></i></a>
                    <form class="d-inline" action="{{route('destroyApartment',$elem->id)}}" method="GET">
                        @csrf
                        @method('DELETE')
                        <button type="submit"><i class="fa-solid fa-trash fs-1"></i></button>
                    </form>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>
@endsection
