@extends('layouts.app')


@section('content')
    <div class="container">
        <form action="{{route('editApartment', $file->id)}}" method="GET" enctype="multipart/form-data">

        @csrf
         @method('PUT')

            {{-- Nome appartamento --}}
            <div class="mb-3">
              <label for="" class="form-label">Nome ciao</label>
              <input type="text" class="form-control" id="" name="title" value='{{$file->title}}'>
            </div>

            {{-- Numero stanze --}}
            <div class="mb-3">
              <label for="" class="form-label">Numero stanze</label>
              <input type="number" class="form-control" id="" name="rooms" value='{{$file->rooms}}'>
            </div>

            {{-- Posti letto --}}
            <div class="mb-3">
                <label for="" class="form-label">Posti letto</label>
                <input type="number" class="form-control" id="" name="bedrooms" value='{{$file->bedroomns}}'>
            </div>
            {{-- Numero bagni --}}
            <div class="mb-3">
                <label for="" class="form-label">Numero bagni</label>
                <input type="number" class="form-control" id="" name="bathrooms" value='{{$file->bathrooms}}'>
            </div>

            {{-- Indirizzo --}}
            <div class="mb-3">
                <label for="" class="form-label">Indirizzo</label>
                <input type="text" class="form-control" id="" name="address" value='{{$file->address}}'>
            </div>

            {{-- Metri quadri --}}
            <div class="mb-3">
                <label for="" class="form-label">Metri quadri</label>
                <input type="number" class="form-control" id="" name="square_meters" value='{{$file->square_meters}}'>
            </div>

            {{-- Prezzo --}}
            <div class="mb-3">
                <label for="" class="form-label">Prezzo</label>
                <input type="number" class="form-control" id="" name="price" value='{{$file->price}}'>
            </div>

            {{-- immagine --}}
            <div class="mb-3">
                <label for="" class="form-label">Immagine</label>
                <input type="file" name="image">
            </div>

            {{-- Descrizione --}}
            <div class="mb-3">
                <label for="" class="form-label">Descrizione</label>
                <textarea class="form-control"  name="description" value='{{$file->description}}'></textarea>
            </div>

            {{-- Visibilita' --}}
            <div class="mb-3 form-check">
                <label class="form-check-label">Rendi visibile</label>


                {{-- <input type="checkbox" name="visibility" value=""> --}}
                <input type="hidden" name="visibility" value="0">
                <input type="checkbox" name="visibility" value="1">
            </div>

            {{-- Servizi --}}
            <div class="mb-3">
                <label for="">Servizi</label>
                @foreach ($services as $service)

                    <input type="checkbox" name="services[]" value="{{$service->id}}" {{$file->services->contains($service) ? 'checked' : ''}}>
                    {{$service->typeOfService}}
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
@endsection
