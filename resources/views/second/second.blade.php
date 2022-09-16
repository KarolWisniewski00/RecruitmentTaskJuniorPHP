@extends('layouts.main')

@section('content')
<main class="container bg-white mt-5 pb-4 rounded-3 shadow">
    <div class="row text-center">
        <div class="col-1 mt-2">
            <a href="{{ url('/') }}" class="btn btn-secondary w-100">Back</a>
        </div>
        <div class="col-12">
            <h1>Wpisz komórkę</h1>
            <p>Prawidłowy format np. A2</p>
            @if(Session::has('success'))
            <div class="alert alert-success w-50 offset-3">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger w-50 offset-3">{{Session::get('fail')}}</div>
            @endif
        </div>
        <div class="col-12">
            <form action="{{ route('excel') }}" method="POST">
                @csrf
                <div class="d-flex justify-content-center"><input type="text" name="cell" class="input-group-text my-3" required></div>
                <div><input type="submit" value="Potwierdź" class="btn btn-primary my-3"></div>
            </form>
        </div>
    </div>
</main>
@endsection