@extends('layouts.app')
@section('content')

    <div class="container py-5">
        <h1>Pizza: {{ $pizza->name }}</h1>
        <h2>Ingredienti</h2>
        <ul>
            @if ($pizza->ingredients)
            <ul>
                @foreach ($pizza->ingredients as $ingredient)
                <li><span class="badge bg-success">{{ $ingredient->name }}</span></li>
                @endforeach

            </ul>
            @endif

         </ul>

        <h3>Prezzo: {{ $pizza->price }}</h3>
        <h3>Vegetariana: {{ $pizza->is_vegetarian ? 'si': 'no' }}
        </h3>
        <h3 class="mb-5"> {{ $pizza->popularity? 'Popolarità: '.$pizza->popularity : '' }}</h3>

        <a class="btn btn-warning" href="{{ route('admin.pizzas.edit', $pizza) }}">EDIT</a>

        <form
            method="POST" class="d-inline mx-3"
            onsubmit="return confirm('Sei sicuro di voler eliminare {{ $pizza->name }}?')"
            action="{{ route('admin.pizzas.destroy', $pizza) }}">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">DELETE</button>
        </form>

        <a class="btn btn-secondary" href="{{ route('admin.pizzas.index') }}">BACK TO LIST</a>
    </div>

@endsection
