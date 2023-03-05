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
                    <th scope="col">Кто создал</th>
                    <th scope="col">Когда создано</th>
                    <th scope="col">Кто изменил</th>
                    <th scope="col">Когда изменено</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($models as $key => $model)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $model->id }}</th>
                        <td>{{ $model->name }}</th>
                        <td>{{ $model->create_user->name }}</th>
                        <td>{{ $model->created_at }}</th>
                        <td>{{ $model->update_user->name }}</th>
                        <td>{{ $model->updated_at }}</th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
