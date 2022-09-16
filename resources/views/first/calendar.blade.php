@extends('layouts.main')

@section('content')
<main class="container bg-white mt-5 pb-4 rounded-3 shadow">
    <div class="row">
        <div class="col-1 mt-2">
            <a href="{{ url('first') }}" class="btn btn-secondary w-100">Back</a>
        </div>
        <div class="col-12 d-flex justify-content-between my-4">
            <h1 class="text-danger fw-bold">{{$month}}</h1>
            <h1>{{$year}}</h1>
        </div>
    </div>
    <table class="table text-center">
        <thead>
            <tr class="text-white">
                <th class="bg-dark">Pn</th>
                <th class="bg-dark">Wt</th>
                <th class="bg-dark">Śr</th>
                <th class="bg-dark">Cz</th>
                <th class="bg-dark">Pt</th>
                <th class="bg-dark">So</th>
                <th class="bg-danger">N</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rows as $row)
            <tr>
                @if (isset($row[0]['cur']))
                <td>{{$row[0]['cur']}}</td>
                @else
                <td class="text-black-50">{{$row[0]['not']}}</td>
                @endif

                @if (isset($row[1]['cur']))
                <td>{{$row[1]['cur']}}</td>
                @else
                <td class="text-black-50">{{$row[1]['not']}}</td>
                @endif

                @if (isset($row[2]['cur']))
                <td>{{$row[2]['cur']}}</td>
                @else
                <td class="text-black-50">{{$row[2]['not']}}</td>
                @endif

                @if (isset($row[3]['cur']))
                <td>{{$row[3]['cur']}}</td>
                @else
                <td class="text-black-50">{{$row[3]['not']}}</td>
                @endif

                @if (isset($row[4]['cur']))
                <td>{{$row[4]['cur']}}</td>
                @else
                <td class="text-black-50">{{$row[4]['not']}}</td>
                @endif

                @if (isset($row[5]['cur']))
                <td>{{$row[5]['cur']}}</td>
                @else
                <td class="text-black-50">{{$row[5]['not']}}</td>
                @endif

                @if (isset($row[6]['cur']))
                <td class="text-danger">{{$row[6]['cur']}}</td>
                @else
                <td  class="text-black-50">{{$row[6]['not']}}</td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</main>
@endsection