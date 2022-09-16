@extends('layouts.main')

@section('content')
<main class="container bg-white mt-5 pb-4 rounded-3 shadow">
    <div class="row text-center">
        <div class="col-1 mt-2">
            <a href="{{ url('/') }}" class="btn btn-secondary w-100">Back</a>
        </div>
        <div class="col-12">
            <h1>Wybierz datę</h1>
        </div>
        <div class="col-12">
            <form action="{{route('calendar')}}" method="post">
                @csrf
                <div class="d-flex justify-content-center"><input type="month" name="date" value="{{$year}}-{{$month}}" class="input-group-text my-3"></div>
                <div><input type="submit" value="Potwierdź" class="btn btn-primary my-3"></div>
            </form>
        </div>
    </div>
</main>
@endsection