@extends('layouts.app')
@section('content')

<div class="container py-4 create">
    <h1>Aggiungi una pizza al tuo men&uacute;</h1>


    <form
        {{-- id="form" --}}
        {{-- name="myForm" --}}
        action="{{ route('admin.pizzas.store') }}"
        method="POST"
         {{-- onsubmit="return validateForm()" --}}
         >
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Pizza</label>
          <input type="text" value="{{ old('name') }}"
          class="form-control @error('name') is-invalid @enderror"
          id="name" name="name" >
          <p id="error_name"></p>
          @error('name')
            <p>{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-3 d-flex flex-wrap">
            @foreach ($ingredients as $ingredient)
            <div class="d-flex align-items-center">
                <input @if ( in_array($ingredient->id,old('ingredients', [])) )
                    checked
                @endif
                class="mb-0" type="checkbox" name="ingredients[]" id="ingredient-{{ $loop->iteration }}" value={{ $ingredient->id }}>
                <label  for="ingredient-{{ $loop->iteration }}" class="form-label mb-0 me-3">{{ $ingredient->name }}</label>
            </div>

            @endforeach
            {{-- magari aggiungere la necessita di selezionar e minimo 2 ingrds --}}
        </div>
        @error('ingredients')
        <p>{{ $message }}</p>
        @enderror

        <div class="mb-3">
          <label for="price" class="form-label">Prezzo: </label>
          <input type="number" step=".01" value="{{ old('price') }}"
          class="form-control @error('price') is-invalid @enderror"
          id="price" name="price">

          @error('price')
            <p>{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-3">
          <label for="popularity" class="form-label">Popolarità: </label>
          <input type="number" value="{{ old('popularity') }}"
          class="form-control @error('popularity') is-invalid @enderror"
          id="popularity" name="popularity">

          @error('popularity')
            <p>{{ $message }}</p>
          @enderror
        </div>

    <div class="mb-3">
        <label for="vegetarian" class="form-label">Vegetariana</label>

        <input type="radio" value="1"
        {{ old('is_vegetarian')== 1 ? 'checked' : '' }}
        class="ms-1"
        id="vegetarian" name="is_vegetarian">

        <label for="no_vegetarian" class="form-label ms-4">Non vegetariana</label>

        <input type="radio" value="0" {{ old('is_vegetarian')== 0 ? 'checked' : '' }}
        class="ms-1"
        id="no_vegetarian" name="is_vegetarian">
    </div>

    <button id="submit" type="submit" class="btn btn-success">SALVA</button>
    <button type="reset" class="btn btn-danger mx-3">RESET</button>
    <a class="btn btn-secondary" href="{{ route('admin.pizzas.index') }}">BACK TO LIST</a>
  </form>
</div>

@endsection
