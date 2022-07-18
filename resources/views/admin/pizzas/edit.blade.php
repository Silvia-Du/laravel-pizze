@extends('layouts.app')
@section('content')

    <div class="container py-4 edit">
        <h1>Modifica di: {{ $pizza->name }}</h1>


    <form
    action="{{ route('admin.pizzas.update', $pizza) }}"
    method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="name" class="form-label">Pizza</label>
          <input
          type="text" value="{{ old('name',$pizza->name) }}"
          class="form-control @error('name') is-invalid @enderror"
          id="name" name="name" >
          @error('name')
            <p >{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-3 d-flex flex-wrap">
            @foreach ($ingredients as $ingredient)
            <div class="d-flex align-items-center">
                <input
                @if(!$errors->any() && $pizza->ingredients->contains($ingredient->id))
                    checked
                @elseif($errors->any() && in_array($ingredient->id, old('ingredients', [])))
                    checked
                @endif

                {{-- @if ( in_array($ingredient->id,old('ingredients', [])) )
                    checked
                @endif --}}
                class="mb-0" type="checkbox" name="ingredients[]" id="ingredient-{{ $loop->iteration }}" value={{ $ingredient->id }}>
                <label  for="ingredient-{{ $loop->iteration }}" class="form-label mb-0 me-3">{{ $ingredient->name }}</label>
            </div>

            @endforeach
            {{-- magari aggiungere la necessita di selezionar e minimo 2 ingrds --}}
        </div>
        @error('ingredients')
        <p>{{ $message }}</p>
        @enderror

        {{-- <div class="mb-3">

          <label for="ingredients" class="form-label">Lista ingredienti</label>
          <input type="text" value="{{ old('ingredients', $pizza->ingredients) }}"
          class="form-control @error('ingredients') is-invalid @enderror"
          id="ingredients" name="ingredients" >

          @error('ingredients')
            <p>{{ $message }}</p>
          @enderror
        </div> --}}


        <div class="mb-3">
          <label for="price" class="form-label">Prezzo: </label>
          <input type="number" value="{{ old('price', $pizza->price ) }}"
          class="form-control @error('price') is-invalid @enderror"
          id="price" name="price">

          @error('price')
            <p>{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-3">
          <label for="popularity" class="form-label">Popolarità: </label>
          <input type="number"
          value="{{old('popularity',  $pizza->popularity? $pizza->popularity : 'null') }}"
          class="form-control @error('popularity') is-invalid @enderror"
          id="popularity" name="popularity">

          @error('popularity')
            <p>{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-3">
            <label for="vegetarian" class="form-label">Vegetariana</label>

            <input type="radio" value="1" {{ old('is_vegetarian' , $pizza->is_vegetarian)== 1 ?'checked' : '' }}
            class="ms-1"
            id="vegetarian" name="is_vegetarian">

            <label for="no_vegetarian" class="form-label ms-4">Non vegetariana</label>

            <input type="radio" value="0" {{ old('is_vegetarian' , $pizza->is_vegetarian)== 0 ? 'checked' : '' }}
            class="ms-1"
            id="no_vegetarian" name="is_vegetarian">
        </div>

        <button type="submit" class="btn btn-success">SALVA</button>
        <button type="reset" class="btn btn-danger mx-3">RESET</button>
        <a class="btn btn-secondary" href="{{ route('admin.pizzas.index') }}">
            <i class="fa-solid fa-backward"></i>
        </a>

    </form>
    </div>

@endsection
