@extends('layouts.app')
<?php
$check = 0
?>

@section('content')
<div class="container">
    <form action="{{route('saveApartment')}}" method="POST" enctype="multipart/form-data">

        @csrf


        {{-- Nome appartamento --}}



        <div class="mb-3">

            <label for="" class="form-label">Nome appartamento</label>
            <input type="text" class="form-control" id="" name="title" value="{{ old('title') }}" required>
            @error('title')
            <div class="alert alert-danger"> Inserisci un titolo valido</div>
            @enderror
        </div>


        {{-- Numero stanze --}}
        <div class="mb-3">
            <label for="" class="form-label">Numero stanze</label>
            <input type="number" class="form-control" id="" name="rooms" value="{{ old('rooms') }}" required>
            @error('rooms')
            <div class="alert alert-danger"> Inserisci un numero valido</div>
            @enderror
        </div>

        {{-- Posti letto --}}
        <div class="mb-3">
            <label for="" class="form-label">Posti letto</label>
            <input type="number" class="form-control" id="" name="bedrooms" value="{{ old('bedroom') }}" required>
            @error('bedrooms')
            <div class="alert alert-danger"> Inserisci un numero valido</div>
            @enderror
        </div>
        {{-- Numero bagni --}}
        <div class="mb-3">
            <label for="" class="form-label">Numero bagni</label>
            <input type="number" class="form-control" id="" name="bathrooms" value="{{ old('bathrooms') }}" required>
            @error('bathrooms')
            <div class="alert alert-danger"> Inserisci un numero valido</div>
            @enderror
        </div>

        {{-- Indirizzo --}}
        <div class="mb-3">
            <label for="" class="form-label">Indirizzo</label>
            <input type="text" class="form-control" id="" name="address" value="{{ old('address') }}" required>
            @error('address')
            <div class="alert alert-danger"> Inserisci un indirizzo valido</div>
            @enderror
        </div>

        {{-- Metri quadri --}}
        <div class="mb-3">
            <label for="" class="form-label">Metri quadri</label>
            <input type="number" class="form-control" id="" name="square_meters" value="{{ old('square_meters') }}" required>
            @error('square_meters')
            <div class="alert alert-danger"> Inserisci un numero valido</div>
            @enderror
        </div>

        {{-- Prezzo --}}
        <div class="mb-3">
            <label for="" class="form-label">Prezzo</label>
            <input type="number" class="form-control" id="" name="price" value="{{ old('price') }}" required>
            @error('price')
            <div class="alert alert-danger"> Inserisci un numero valido</div>
            @enderror
        </div>

        {{-- immagine --}}
        <div class="mb-3">
            <label for="" class="form-label">Immagine</label>
            <input type="file" name="image" class="form-control-file" value="{{ old('image') }}">
        </div>

        {{-- Descrizione --}}
        <div class="mb-3">
            <label for="" class="form-label">Descrizione</label>
            <textarea class="form-control" name="description" value="{{ old('description') }}" required></textarea>
            @error('description')
            <div class="alert alert-danger"> Inserisci una descrizione valida</div>
            @enderror


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
            <input type="checkbox" name="services[]" value="{{$service->id}}">
            {{$service->typeOfService}}
            @endforeach
            @error('services')
            <div class="alert alert-danger"> Devi compilare il campo richiesto</div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
