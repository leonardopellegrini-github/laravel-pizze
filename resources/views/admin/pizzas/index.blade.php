@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="d-flex">
            <h1>Lista delle pizze</h1>
            <div style="margin-left: 20px"> </div>
            <a class="btn btn-success" href="{{route('admin.pizzas.create')}}">CREATE</a>

        </div>

        <table class="table">
            <thead>

              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($pizzas as $pizza)
              <tr>
                <th scope="row">{{$pizza->id}}</th>
                <td>{{$pizza->nome}}</td>
                <td>{{$pizza->prezzo}} &euro;</td>
                <td>
                    <a class="btn btn-primary" href="{{route('admin.pizzas.show', $pizza)}}">SHOW</a>
                    <a class="btn btn-warning" href="{{route('admin.pizzas.edit', $pizza)}}">EDIT</a>
                    <form onsubmit="return confirm('vuoi eliminare il campo?')" class="d-inline" action="{{route('admin.pizzas.destroy', $pizza)}}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger" >DELETE</a>
                        </form>




                </td>

            </tr>
            @endforeach
            </tbody>
          </table>


    </div>
@endsection
