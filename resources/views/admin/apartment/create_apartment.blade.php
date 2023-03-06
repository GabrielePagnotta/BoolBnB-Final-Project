@extends('layouts.app')

@section('content')
<div class="container mainscroll">
    <form action="{{route('saveApartment')}}" method="POST" enctype="multipart/form-data">

        @csrf


        {{-- Nome appartamento --}}
        <div class="mb-3">

            <label for="" class="form-label">Nome appartamento <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="" name="title" value="{{ old('title') }}" required>
            @error('title')
            <div class="alert alert-danger"> Inserisci un titolo valido</div>
            @enderror
        </div>


        {{-- Numero stanze --}}
        <div class="mb-3">
            <label for="" class="form-label">Numero stanze <span class="text-danger">*</span></label>
            <input type="number" class="form-control" id="" min='1' name="rooms" value="{{ old('rooms') }}" required>
            @error('rooms')
            <div class="alert alert-danger"> Inserisci un numero valido</div>
            @enderror
        </div>

        {{-- Posti letto --}}
        <div class="mb-3">
            <label for="" class="form-label">Posti letto <span class="text-danger">*</span></label>
            <input type="number" class="form-control" id="" min='1' name="bedrooms" value="{{ old('bedrooms') }}" required>
            @error('bedrooms')
            <div class="alert alert-danger"> Inserisci un numero valido</div>
            @enderror
        </div>
        {{-- Numero bagni --}}
        <div class="mb-3">
            <label for="" class="form-label">Numero bagni <span class="text-danger">*</span></label>
            <input type="number" class="form-control" id="" min='1' name="bathrooms" value="{{ old('bathrooms') }}" required>
            @error('bathrooms')
            <div class="alert alert-danger"> Inserisci un numero valido</div>
            @enderror
        </div>


        {{-- Indirizzo --}}
        <div class="mb-3">
            <label for="" class="form-label">Indirizzo <span class="text-danger">*</span></label>

            <input type="hidden" name="latitude" id="inputLat">
            <input type="hidden" name="longitude" id="inputLong">

            {{-- Searchbar Geo --}}
            <div id="inputIndirizzo"></div>
            {{-- <input type="text" class="form-control" id="ricercaIndirizzo" min='1' name="address" value="{{ old('address') }}"> --}}
            @error('address')
            <div class="alert alert-danger"> Inserisci un indirizzo valido</div>
            @enderror
        </div>


        {{-- Metri quadri --}}
        <div class="mb-3">
            <label for="" class="form-label">Metri quadri <span class="text-danger">*</span></label>
            <input type="number" class="form-control" id="" min='1' name="square_meters" value="{{ old('square_meters') }}" required>
            @error('square_meters')
            <div class="alert alert-danger"> Inserisci un numero valido</div>
            @enderror
        </div>

        {{-- Prezzo --}}
        <div class="mb-3">
            <label for="" class="form-label">Prezzo <span class="text-danger">*</span></label>
            <input type="number" class="form-control" id="" min='1' name="price" value="{{ old('price') }}" required>
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
            <textarea class="form-control" name="description" value="{{ old('description') }}"></textarea>
            @error('description')
            <div class="alert alert-danger"> Inserisci una descrizione valida</div>
            @enderror


        </div>

        {{-- Visibilita' --}}
        <div class="mb-3 form-check p-0">
            <label class="form-check-label">Rendi visibile</label>


            {{-- <input type="checkbox" name="visibility" value=""> --}}

            <input type="hidden" name="visibility" value="0">
            <input type="checkbox" name="visibility" value="1">

        </div>

        {{-- Servizi --}}
        <div class="mb-3">
            <label for="">Servizi <span class="text-danger">*</span></label>
            @foreach ($services as $service)
            <input type="checkbox" name="services[]" value="{{$service->id}}">
            {{$service->typeOfService}}
            @endforeach
            <div class="erroreServizi px-2"></div>
        </div>

        <button type="submit" id="submitBtnCreate" class="btn btn-primary">Submit</button>
        <div class="campiObbligatori text-danger mt-2">* Campi obbligatori</div>
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

    var inputElement = searchBoxHTML.querySelector('input');// Selezione input della barra di ricerca
    inputElement.setAttribute('name', 'address');// Aggiunto l'attributo "name" con valore "address"
    inputElement.setAttribute('value', '{{old("address")}}'); // Aggiunto l'attributo "value" con valore "{{ old('indirizzo') }}"

    document.getElementById('inputIndirizzo').append(searchBoxHTML);

    // Selezione campi input
    var resultLat = document.getElementById('inputLat');
    var resultLong = document.getElementById('inputLong');

    // stampa latitudine e longitudine in un div che crea
    ttSearchBox.on('tomtom.searchbox.resultselected', function (event) {
        var result = event.data.result;
        var position = result.position;

        resultLat.value = `${position.lat.toFixed(3)}`;
        resultLong.value = `${position.lng.toFixed(3)}`;
    });


    // Trova tutti i checkbox con il nome "services[]"
    var checkboxes = document.querySelectorAll('input[name="services[]"]');
    // Trova il pulsante di invio
    var submitBtnCreate = document.getElementById('submitBtnCreate');
    //Seleziona div per errore servizi e lo setta a d-none
    var erroreServizi = document.querySelector('.erroreServizi');
    erroreServizi.innerHTML = '<span class="badge badge-pill badge-danger text-light">Ricorda di selezionare almeno un servizio</span>';

    // Disabilita il pulsante di invio se nessun checkbox è selezionato
    submitBtnCreate.disabled = true;
    for (let i = 0; i < checkboxes.length; i++) {
        checkboxes[i].addEventListener('change', function() {
            // Controlla se almeno un checkbox è selezionato
            let atLeastOneChecked = false;
            for (let j = 0; j < checkboxes.length; j++) {
                if (checkboxes[j].checked) {
                    atLeastOneChecked = true;
                    break;
                }
            }
            // Abilita o disabilita il pulsante di invio a seconda dello stato di selezione dei checkbox
            if (atLeastOneChecked) {
                submitBtnCreate.disabled = false;
                erroreServizi.style.display = 'none';
            } else {
                submitBtnCreate.disabled = true;
                erroreServizi.style.display = 'block';
                erroreServizi.innerHTML = '<span class="badge badge-pill badge-danger text-light">Devi selezionare almeno un servizio</span>';
            }
        });
    }

</script>
<style>
    .campiObbligatori {
        font-size: 0.8rem;
    }
</style>
@endsection
