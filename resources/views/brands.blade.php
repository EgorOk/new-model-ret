@extends('layout')

@section('title')
    New-model-ret список брендов
@endsection

@section('main_content')
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">id</th>
                    <th scope="col">Бренд</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $key => $brand)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $brand['id'] }}</th>
                        <td>{{ $brand['name'] }}</th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
