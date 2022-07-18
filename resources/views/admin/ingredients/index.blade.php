@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="">Tutti i tuoi ingredienti</h1>
    </div>

    @if (session('deleted'))
        <div class="alert-danger alert py-4 my-5">
            {{ session('deleted') }}
        </div>
    @endif

    <div >
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#id</th>
                <th scope="col">Name</th>
                <th scope="col">Options</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($ingredients as $ingredient)

                <tr>
                  <td>{{ $ingredient->id }}</td>
                  <td>{{ $ingredient->name }}</td>


                  <td>
                    {{-- avendo solo nome non serve show --}}
                    {{-- <a class="btn btn-primary" href="{{ route('admin.ingredients.show', $ingredient) }}">
                        <i class="fa-solid fa-eye"></i>
                    </a> --}}
                    <a class="btn btn-dark mx-4" href="{{ route('admin.ingredients.edit', $ingredient) }}">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <form
                        method="POST" class="d-inline"
                        onsubmit="return confirm('Sei sicuro di voler eliminare {{ $ingredient->name }}?')"
                        action="{{ route('admin.ingredients.destroy', $ingredient) }}">
                        @csrf
                         @method('DELETE')

                        <button
                        data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-custom-class="custom-tooltip"
                        title="elimina"

                         type="submit" class="btn btn-danger">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>

                    </form>
                  </td>

                </tr>
                @endforeach
            </tbody>
          </table>
    </div>


</div>
@endsection
