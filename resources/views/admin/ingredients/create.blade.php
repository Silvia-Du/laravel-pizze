@extends('layouts.app')
@section('content')

<div class="container py-4 create">
    <h1>Aggiungi un ingrediente</h1>


    <form
        {{-- id="form" --}}
        {{-- name="myForm" --}}
        action="{{ route('admin.ingredients.store') }}"
        method="POST"
         {{-- onsubmit="return validateForm()" --}}
         >
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Ingrediente</label>
          <input type="text" value="{{ old('name') }}"
          class="form-control @error('name') is-invalid @enderror"
          id="name" name="name" >
          <p id="error_name"></p>
          @error('name')
            <p>{{ $message }}</p>
          @enderror
        </div>



    <button id="submit" type="submit" class="btn btn-success">SALVA</button>
    <button type="reset" class="btn btn-danger mx-3">RESET</button>
    <a class="btn btn-secondary" href="{{ route('admin.ingredients.index') }}">BACK TO LIST</a>
  </form>
</div>

@endsection
