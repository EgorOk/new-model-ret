@extends('layout')

@section('title')
    New-model-ret список моделей
@endsection

@section('main_content')
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">id</th>
                    <th scope="col">Модель</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($models as $key => $model)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $model['id'] }}</th>
                        <td>{{ $model['name'] }}</th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
