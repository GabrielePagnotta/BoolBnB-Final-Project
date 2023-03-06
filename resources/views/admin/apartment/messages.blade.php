@extends('layouts.app')


@section('content')
    <div class="container hg">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Mittente</th>
                    <th class="cell" scope="col ">Orario</th>
                    <th scope="col">Messaggio</th>
                    {{-- <th scope="col">Opzioni</th> --}}
                </tr>
            </thead>
            <tbody>

                @foreach ($messages as $elem)
                    <tr>
                        {{-- Mittente --}}
                        <td class="personal-width-200 overflow-hidden-ellipsis">{{ $elem['email'] }}</td>
                        {{-- orario --}}
                        <td class="personal-width-200 overflow-hidden-ellipsis cell">{{ $elem['created_at'] }}</td>
                        {{-- messaggio --}}
                        <td class="personal-width-200 overflow-hidden-ellipsis">{{ $elem['message'] }}</td>
                        {{-- delete --}}
                        {{-- <td>
                            <form class="d-inline" action="{{ route('destroyMessage', $elem->id) }}" method="GET">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Sei sicuro di voler eliminare questo messaggio?')"
                                    class="bg-danger text-light border-0 rounded">
                                    <i class="fa-solid fa-trash fs-1"></i>
                                </button>


                            </form>
                        </td> --}}
                    </tr>
                @endforeach

            </tbody>


        </table>
    </div>

    <style>
        .hg{
            height: 100wh;
        }
    </style>
@endsection
