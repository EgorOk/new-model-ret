@extends('layout')

@section('title')
    New-model-ret список моделей бренда {{ $brand->name }}
@endsection

@section('main_content')
    <div class="row">
        <h4>{{ $brand->name }}</h4>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">id</th>
                    <th scope="col">Модель</th>
                    <th scope="col">Бренд</th>
                    <th scope="col">Кто создал</th>
                    <th scope="col">Когда создано</th>
                    <th scope="col">Кто изменил</th>
                    <th scope="col">Когда изменено</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brand->models as $key => $model)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $model->id }}</th>
                        <td>{{ $model->name }}</th>
                        <td>{{ $model->brand[0]->name }}</th>
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
