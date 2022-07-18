@extends('layouts.app')
@section('content')

    <div class="container py-4 edit">
        <h1>Modifica di: {{ $ingredient->name }}</h1>


    <form
    action="{{ route('admin.ingredients.update', $ingredient) }}"
    method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="name" class="form-label">Ingrediente</label>
          <input
          type="text" value="{{ old('name',$ingredient->name) }}"
          class="form-control @error('name') is-invalid @enderror"
          id="name" name="name" >
          @error('name')
            <p >{{ $message }}</p>
          @enderror
        </div>

        <button type="submit" class="btn btn-success">SALVA</button>
        <button type="reset" class="btn btn-danger mx-3">RESET</button>
        <a class="btn btn-secondary" href="{{ route('admin.ingredients.index') }}">
            <i class="fa-solid fa-backward"></i>
        </a>

    </form>
    </div>

@endsection
