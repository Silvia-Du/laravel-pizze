@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="">Tutti i tuoi prodotti</h1>
        <div class=" ">
            <i class="fa-solid fa-list text-dark fs-4" id="listIcon"></i>
            <i class="fa-solid fa-grip ms-4 text-dark fs-4" id="gridIcon"></i>
        </div>
    </div>

    @if (session('deleted'))
        <div class="alert-danger alert py-4 my-5">
            {{ session('deleted') }}
        </div>
    @endif

    <div id="listView">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#id</th>
                <th scope="col">Name</th>
                <th scope="col">Ingredients</th>
                <th scope="col">Options</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($pizze as $pizza)

                <tr>
                  <td>{{ $pizza->id }}</td>
                  <td>{{ $pizza->name }}</td>
                  <td>
                    @forelse ($pizza->ingredients as $ingredient)
                        <span class="badge bg-success">{{ $ingredient->name }}</span>
                    @empty
                        -
                    @endforelse
                  </td>

                  {{-- @foreach ($pizza->ingredients as $ingredient)
                  <li> {{ $ingredient->name }}</li>
                @endforeach --}}
                  <td>
                    <a class="btn btn-primary" href="{{ route('admin.pizzas.show', $pizza) }}">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                    <a class="btn btn-dark mx-4" href="{{ route('admin.pizzas.edit', $pizza) }}">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <form
                        method="POST" class="d-inline"
                        onsubmit="return confirm('Sei sicuro di voler eliminare {{ $pizza->name }}?')"
                        action="{{ route('admin.pizzas.destroy', $pizza) }}">
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

    {{-- fine table view --}}

    <div id="gridView" class=" d-flex justify-content-center my-5 align-content-center flex-wrap gap-2 d-none" >
        @foreach ($pizze as $pizza)

        <div class="card p-3 c-card" >
            <div class="card-body">
                <span class="card-subtitle mb-2 text-muted">#{{ $pizza->id }}</span><h5 class="ps-3 card-title fs-3 d-inline">{{ $pizza->name }}</h5>

                <div class="py-3 ">
                    <a class="btn btn-primary" href="{{ route('admin.pizzas.show', $pizza) }}">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                    <a class="btn btn-dark mx-4" href="{{ route('admin.pizzas.edit', $pizza) }}">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <form
                        method="POST" class="d-inline"
                        onsubmit="return confirm('Sei sicuro di voler eliminare {{ $pizza->name }}?')"
                        action="{{ route('admin.pizzas.destroy', $pizza) }}">
                        @csrf
                         @method('DELETE')

                        <button
                        data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-custom-class="custom-tooltip"
                        title="elimina"

                         type="submit" class="btn btn-danger">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                </div>

            </div>
        </div>

        @endforeach
    </div>
</div>
@endsection
