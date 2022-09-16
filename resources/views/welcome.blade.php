@extends('layouts.main')

@section('content')
<main class="container bg-white mt-5 pb-4 rounded-3 shadow">
    <div class="row text-center">
        <div class="col-12 my-5">
            <h1>Młodszy programista PHP</h1>
        </div>
        <div class="col-12 col-md-4">
            <a href="first" class="btn btn-primary">Zadanie pierwsze</a>
        </div>
        <div class="col-12 col-md-4">
            <a href="second" class="btn btn-primary">Zadanie drugie</a>
        </div>
        <div class="col-12 col-md-4">
            <a href="third" class="btn btn-primary">Zadanie trzecie</a>
        </div>
    </div>
</main>
@endsection