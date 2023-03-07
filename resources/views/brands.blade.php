@extends('layout')

@section('title')
    New-model-ret список брендов
@endsection

@section('main_content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Бренд</th>
                <th scope="col">Кто создал</th>
                <th scope="col">Когда создано</th>
                <th scope="col">Кто изменил</th>
                <th scope="col">Когда изменено</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($brands as $key => $brand)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td><a href="/brands/{{ $brand->id }}" class="link-dark">{{ $brand->name }}</a></th>
                    <td>{{ $brand->create_user->name }}</th>
                    <td>{{ $brand->created_at }}</th>
                    <td>{{ $brand->update_user->name }}</th>
                    <td>{{ $brand->updated_at }}</th>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
