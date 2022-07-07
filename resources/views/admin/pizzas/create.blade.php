@extends('layouts.admin')

@section('content')

<div class="container">

    @if ($errors->any)
    <div >
        <ul >
            @foreach ($errors->all() as $error )
                <li  class="alert alert-danger">{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

    <h1>Ciao {{Auth::user()->name}} crea la tua nuova pizza!</h1>
    <form action="{{route('admin.pizzas.store')}}" method="POST">
        @csrf

        <div class="mb-3">
          <label  class="form-label">New name</label>
          <input type="text" name="nome" value="{{old('nome')}}" class="form-control" id="nome" >
        </div
        @error('nome')
              is-invalid
          @enderror>
        @error('nome')
             <p style="color: red">{{$message}}</p>
          @enderror

        <label for="quantity">Scegli un nuovo prezzo (between 1 and 100):</label>
        <input type="number" id="prezzo" value="{{old('prezzo')}}" name="prezzo" min="1" max="100" step="0.1">



          <div class="mb-3">
              <label  class="form-label">Vegetarian?</label>
            {{-- @if (vegetariana) --}}


              <div class="form-check">
                <input class="form-check-input" type="radio" value="1"  name="vegetariana" id="vegetariana" checked>
                <label class="form-check-label" for="flexRadioDefault1" >
                  Vegetariana
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" value="0" name="vegetariana" id="no-vegetariana" >
                <label class="form-check-label" for="flexRadioDefault2" >
                  Non vegetariana
                </label>
              </div>
              {{-- @else --}}
              {{-- <div class="form-check">
                <input class="form-check-input" type="radio"  name="vegetariana" value="1" id="vegetariana" >
                <label class="form-check-label" for="flexRadioDefault1" >
                  Vegetariana
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" id="no-vegetariana" name="vegetariana" value="0" id="flexRadioDefault2"checked >
                <label class="form-check-label" for="flexRadioDefault2" >
                  Non vegetariana
                </label>
              </div> --}}
               {{-- @endif --}}


            </div>

            <div class="mb-3">
              <label  class="form-label">New ingredients</label>

            <textarea name="ingredienti" id="ingredienti" cols="90" rows="5" value="{{old('ingredienti')}}"

            @error('ingredienti')
            is-invalid
        @enderror
            >
              </textarea>
              @error('ingredienti')
             <p style="color: red">{{$message}}</p>

            @enderror
            </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

</div>
@endsection
