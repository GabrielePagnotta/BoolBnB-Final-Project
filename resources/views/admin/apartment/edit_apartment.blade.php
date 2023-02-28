@extends('layouts.app')


@section('content')
<div class="container">
    <form action="{{route('updateApartment', $file->id)}}" method="GET" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        {{-- Nome appartamento --}}
        <div class="mb-3">
            <label for="" class="form-label">Titolo<span class="asterisco">*</span></label>
            <input type="text" class="form-control" id="" name="title" value='{{$file->title}}'>
        </div>

        {{-- Numero stanze --}}
        <div class="mb-3">
            <label for="" class="form-label">Numero stanze<span class="asterisco">*</span></label>
            <input type="number" class="form-control" id="" name="rooms" value='{{$file->rooms}}'>
        </div>

        {{-- Posti letto --}}
        <div class="mb-3">
            <label for="" class="form-label">Posti letto<span class="asterisco">*</span></label>
            <input type="number" class="form-control" id="" name="bedrooms" value='{{$file->bedrooms}}'>
        </div>
        {{-- Numero bagni --}}
        <div class="mb-3">
            <label for="" class="form-label">Numero bagni<span class="asterisco">*</span></label>
            <input type="number" class="form-control" id="" name="bathrooms" value='{{$file->bathrooms}}'>
        </div>

        {{-- Indirizzo --}}
        <div class="mb-3">
            <label for="" class="form-label">Indirizzo<span class="asterisco">*</span></label>

            <input type="hidden" name="latitude" id="inputLat">
            <input type="hidden" name="longitude" id="inputLong">

            {{-- Searchbar Geo --}}
            <div id="inputIndirizzo"></div>
            @error('address')
            <div class="alert alert-danger" required> Inserisci un indirizzo valido<span class="asterisco">*</span></div>
            @enderror
        </div>

        {{-- Metri quadri --}}
        <div class="mb-3">
            <label for="" class="form-label">Metri quadri<span class="asterisco">*</span></label>
            <input type="number" class="form-control" id="" name="square_meters" value='{{$file->square_meters}}' required>
        </div>

        {{-- Prezzo --}}
        <div class="mb-3">
            <label for="" class="form-label">Prezzo<span class="asterisco">*</span></label>
            <input type="number" class="form-control" id="" name="price" value='{{$file->price}}' required>
        </div>

        {{-- immagine --}}
        <div class="mb-3">
            <label for="" class="form-label">Immagine</label>
            <input type="file" name="image" value="{{asset('storage/$elem->cover')}}">
        </div>

        {{-- Descrizione --}}
        <div class="mb-3">
            <label for="" class="form-label">Descrizione<span class="asterisco">*</span></label>
            <textarea class="form-control" name="description" required>{{$file->description}}</textarea>
        </div>

        {{-- Visibilita' --}}
        <div class="mb-3 form-check">
            <label class="form-check-label">Rendi visibile</label>


            {{-- <input type="checkbox" name="visibility" value="{{$file->visibility}}"> --}}

            <input type="hidden" name="visibility" value="0">
            <input type="checkbox" name="visibility" value="1" {{ $file->visibility == 1 ? 'checked' : '' }}>



        </div>

        {{-- Servizi --}}
        <div class="mb-3">
            <label for="">Servizi<span class="asterisco">*</span></label>
            @foreach ($services as $service)

            <input type="checkbox" name="services[]" value="{{$service->id}}" {{$file->services->contains($service) ? 'checked' : ''}}>
            {{$service->typeOfService}}
            @endforeach
            @error('services')
            <div class="alert alert-danger" required> Inserisci un indirizzo valido</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <span class="asterisco">campo richiesto*</span>
    </form>
</div>

<script>
    var options = {
        searchOptions: {
            key: "gfJDXxUVZKnn9kqVOkZ2tzc6DyGlkaWn",
            language: "en-GB",
            limit: 5,
        },
        autocompleteOptions: {
            key: "gfJDXxUVZKnn9kqVOkZ2tzc6DyGlkaWn",
            language: "en-GB",
        },
    };

    var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
    var searchBoxHTML = ttSearchBox.getSearchBoxHTML()
    // document.body.append(searchBoxHTML)
    // var inputLat = document.getElementById("lat");


    var inputElement = searchBoxHTML.querySelector('input'); // Selezione input della barra di ricerca
    inputElement.setAttribute('name', 'address'); // Aggiunto l'attributo "name" con valore "address"
    inputElement.setAttribute('value', '{{$file->address}}'); // Aggiunto l'attributo "value" con valore "{{ old('indirizzo') }}"


    document.getElementById('inputIndirizzo').append(searchBoxHTML);

    // Selezione campi input
    var resultLat = document.getElementById('inputLat');
    var resultLong = document.getElementById('inputLong');



    // stampa latitudine e longitudine in un div che crea
    ttSearchBox.on('tomtom.searchbox.resultselected', function(event) {
        var result = event.data.result;
        var position = result.position;

        resultLat.value = `${position.lat.toFixed(3)}`;
        resultLong.value = `${position.lng.toFixed(3)}`;
    });
</script>
@endsection
<style>
    .asterisco {
        color: red;
    }
</style>
