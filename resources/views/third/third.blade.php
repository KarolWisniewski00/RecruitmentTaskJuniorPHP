@extends('layouts.main')

@section('content')
<main class="container bg-white mt-5 pb-4 rounded-3 shadow">
    <div class="row text-center">
        <div class="col-1 mt-2">
            <a href="{{ url('/') }}" class="btn btn-secondary w-100">Back</a>
        </div>
        <div class="col-12">
            <h1>Rejestracja - użytkownik prywatny czy firmowy?</h1>
        </div>
        <div class="col-12">
            <div class="d-flex justify-content-center">
                <div class="m-4"><a href="register_company" class="btn btn-primary">Firma</a></div>
                <div class="m-4"><a href="register_priv" class="btn btn-primary">Użytkownik prywatny</a></div>
            </div>
        </div>
    </div>
</main>
@endsection