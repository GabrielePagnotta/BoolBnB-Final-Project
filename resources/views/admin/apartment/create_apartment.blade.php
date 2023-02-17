@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="" method="POST">

        @csrf
            <div class="mb-3">
              <label for="" class="form-label">Nome appartamento</label>
              <input type="text" class="form-control" id="" aria-describedby="">
            </div>

            <div class="mb-3">
              <label for="" class="form-label">Numero stanze</label>
              <input type="number" class="form-control" id="">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Posti letto</label>
                <input type="number" class="form-control" id="">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Numero bagni</label>
                <input type="number" class="form-control" id="">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Indirizzo</label>
                <input type="text" class="form-control" id="">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Metri quadri</label>
                <input type="number" class="form-control" id="">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Prezzo</label>
                <input type="number" class="form-control" id="">
            </div>


            <div class="mb-3">
                <label for="" class="form-label">Immagine</label>
                <input type="file" name="image">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Descrizione</label>
                <textarea type="text" class="form-control" id=""></textarea>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="">Rendi visibile</label>
            </div>

            <div class="mb-3">
                <label for="">Servizi</label>
                @foreach ($services as $service)
                    <input type="checkbox" name="services[]" value="{{$service->id}}">
                    {{$service->typeOfService}}
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
@endsection
