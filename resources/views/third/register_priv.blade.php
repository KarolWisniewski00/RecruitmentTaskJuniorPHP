@extends('layouts.main')

@section('content')
<main class="container bg-white mt-5 pb-4 rounded-3 shadow">
    <div class="row text-center">
        <div class="col-1 mt-2">
            <a href="{{ url('third') }}" class="btn btn-secondary w-100">Back</a>
        </div>
        <div class="col-12">
            <h1>Rejestracja</h1>
            @if(Session::has('success'))
            <div class="alert alert-success w-50 offset-3">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger w-50 offset-3">{{Session::get('fail')}}</div>
            @endif
        </div>
        <div class="col-12">
            <form action="{{ route('register_priv') }}" method="POST">
                @csrf
                <div class="d-flex flex-column">
                    <div class="form-floating mb-3 w-25 mx-auto">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Imię" value="{{ old('name') }}">
                        <label for="name" class="align-self-start">Imię</label>
                        @error('name')
                        <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3 w-25 mx-auto">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                        <label for="email" class="align-self-start">Email</label>
                        @error('email')
                        <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3 w-25 mx-auto">
                        <input type="date" name="date" id="date" class="form-control w-100" value="{{ old('date') }}">
                        <label for="date" class="align-self-start">Data urodzenia</label>
                        @error('date')
                        <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3 w-25 mx-auto">
                        <input type="password" name="password" id="password" class="form-control w-100" placeholder="Hasło">
                        <label for="password" class="align-self-start">Hasło</label>
                        @error('password')
                        <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3 w-25 mx-auto">
                        <input type="password" name="password_verification" id="password_verification" class="form-control w-100" placeholder="Powtórz hasło">
                        <label for="password_verification" class="align-self-start">Powtórz hasło</label>
                        @error('password_verification')
                        <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="my-4"><input type="submit" value="Zarejestruj" class="btn btn-primary"></div>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection