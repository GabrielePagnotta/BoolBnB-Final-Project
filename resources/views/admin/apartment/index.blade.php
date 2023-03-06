@extends('layouts.app')
@section('content')
    <div class="container">
        <div>

              @if (\Session::has('alert-message'))
                <div class="alert alert-{{ \Session::get('alert-type') }}">
                  {{ \Session::get('alert-message') }}
                </div>
              @endif

        </div>
        <div class="d-flex justify-content-around my-5">
            <h1>I tuoi appartamenti:</h1>
            <a class="btn btn-success p-3 d-none d-lg-inline" href="{{ route('addApartment') }}">Aggiungi appartamento</a>
            <a class="d-lg-none" href="{{ route('addApartment') }}"><i class="fa-solid fa-plus "></i></a>

        </div>
        <table class="table">.
            <thead>
                <tr>
                    <th class="w-25" scope="col">Nome</th>
                    <th scope="col">Indirizzo</th>
                    <th class=" d-none d-lg-table-cell" scope="col">Foto</th>
                    <th class="d-none d-lg-table-cell" scope="col">Descrizione</th>
                    <th class="d-none d-lg-table-cell" scope="col">Stato</th>
                    <th class="d-none d-lg-table-cell" scope="col">Messaggi</th>
                    <th scope="col ">Dati</th>
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
                        <td class="personal-width-150  d-none d-lg-table-cell">
                            @if ($elem['cover'])
                                <img class="img-fluid" src="{{ asset("storage/$elem->cover") }}" alt="cover-img">
                            @else
                                <img style="max-width: 30%"
                                    src="https://www.associazionejam.it/wp-content/uploads/2017/04/non-disponibile-300x300.png"
                                    alt="image-not-found">
                            @endif
                        </td>

                        {{-- Descrizione Appartamento --}}
                        <td class="personal-width-200 overflow-hidden-ellipsis d-none d-lg-block">
                            <article>{{ $elem['description'] }}</article>
                        </td>

                        {{-- Visibilità Appartamento --}}
                        <td class="personal-width-80 d-none d-lg-table-cell">
                            <article>
                                @if ($elem['visibility'] == 0)
                                    <i class="fa-solid fa-ban text-danger"></i>
                                    Privato
                                @elseif($elem['visibility'] == 1)
                                    <i class="fa-solid fa-circle-check text-success"></i>

                                @endif
                            </article>
                        </td>

                        <td class="d-none d-lg-table-cell"><a href="{{route('showMessages', $elem->id)}}"><i class="fa-solid fa-eye"></i></a></td>

                        {{-- Dati Appartamento --}}
                        <td>
                            <a href="{{ route('editApartment', $elem->id) }}"><i
                                    class="fa-regular fa-pen-to-square fs-1 mr-2"></i></a>
                             <a href="{{ route ('statistic', $elem->id)}}"><i class="fa-solid fa-chart-simple fs-1"></i></a>
                            <form class="d-inline" action="{{ route('destroyApartment', $elem->id) }}" method="GET">
                                @csrf
                                @method('DELETE')
                                <button type="submit" id="button-delete" onclick="return confirm('Sei sicuro di voler eliminare questo appartamento?')" class="bg-danger text-light border-0 rounded">
                                    <i class="fa-solid fa-trash fs-1"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $('#confirmDeleteModal').on('hidden.bs.modal', function () {
            $(this).find('form').off('submit').remove();
        })
    </script>

    <style>

        #button-delete{
            margin-left: 10px;
        }
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border: 1px solid black;
        }
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
        .fa-eye {
            color: #E84C69;
            margin-left: 20px;
        }

        .fa-circle-check {
            margin-left: 10px;
        }

        .fa-plus{
            font-size: 1.8rem;
            margin-top: 10px;
        }
    </style>
@endsection
