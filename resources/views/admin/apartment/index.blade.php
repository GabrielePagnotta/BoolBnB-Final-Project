@extends('layouts.app')
@section('content')
    <div class="container">
        <div>
           @if (session()->has('error'))
               {{ session()->get('error') }}
            @endif
        </div>
        <div class="d-flex justify-content-between my-5">
            <h1>Aggiungi appartamento:</h1>
            <a class="btn btn-success p-3" href="{{ route('addApartment') }}">Aggiungi appartamento</a>

        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Indirizzo</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Stato</th>
                    <th scope="col">Dati</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($info as $elem)
                    <tr>
                        {{-- Nome Appartamento --}}
                        <td class="personal-width-200 overflow-hidden-ellipsis">{{ $elem['title'] }}</td>

                        {{-- Indirizzo Appartamento --}}
                        <td class="personal-width-80 overflow-hidden-ellipsis">{{ $elem['address'] }}</td>

                        {{-- Copertina Appartamento --}}
                        <td class="personal-width-150">
                            @if ($elem['cover'])
                                <img class="img-fluid" src="{{ asset("storage/$elem->cover") }}" alt="cover-img">
                            @else
                                <img style="max-width: 30%"
                                    src="https://www.associazionejam.it/wp-content/uploads/2017/04/non-disponibile-300x300.png"
                                    alt="image-not-found">
                            @endif
                        </td>

                        {{-- Descrizione Appartamento --}}
                        <td class="personal-width-200 overflow-hidden-ellipsis">
                            <article>{{ $elem['description'] }}</article>
                        </td>

                        {{-- Visibilità Appartamento --}}
                        <td class="personal-width-80">
                            <article>
                                @if ($elem['visibility'] == 0)
                                    <i class="fa-solid fa-ban text-danger"></i>
                                    Privato
                                @elseif($elem['visibility'] == 1)
                                    <i class="fa-solid fa-circle-check text-success"></i>
                                    Pubblico
                                @endif
                            </article>
                        </td>

                        {{-- Dati Appartamento --}}
                        <td class="d-flex justify-content-between">
                            <a href="{{ route('editApartment', $elem->id) }}"><i
                                    class="fa-regular fa-pen-to-square fs-1"></i></a>
                            <a href=""><i class="fa-solid fa-chart-simple fs-1"></i></a>
                            <form class="d-inline" action="{{ route('destroyApartment', $elem->id) }}" method="GET">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Sei sicuro di voler eliminare questo appartamento?')" class="bg-danger text-light border-0 rounded">
                                    <i class="fa-solid fa-trash fs-1"></i>
                                </button>


                                {{-- <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger p-0 px-1" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fa-solid fa-trash fs-1"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Sei sicuro di voler eliminare l'appartamento?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Da qui perderai tutti i dati dell'appartamento.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-dismiss="modal">Annulla</button>
                                            <button type="submit" class="btn btn-danger">Conferma</button>
                                        </div>
                                    </div>
                                    </div>
                                </div> --}}
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <style>
        .personal-width-200 {
            max-width: 200px;
            min-width: 200px;
        }
        .personal-width-150 {
            max-width: 150px;
            min-width: 150px;
        }
        .personal-width-80 {
            max-width: 80px;
            min-width: 80px;
        }
        .overflow-hidden-ellipsis {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .bg-pink-gradient {
            background: #ffd2dc;
        }
        .bg-lightpink-gradient {
            background: #fff8f9;
        }
    </style>
@endsection
