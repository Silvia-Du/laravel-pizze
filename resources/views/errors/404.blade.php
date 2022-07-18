@extends('layouts.app')

@section('content')
    <div class=" my-5 py-5 container d-flex justify-content-center align-items-center alert-danger alert">

        <h1>{{ $exception->getMessage() }}</h1>

    </div>
@endsection
