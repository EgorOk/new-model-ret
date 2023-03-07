@extends('layout')

@section('title')
    New-model-ret список магазинов
@endsection

@section('main_content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Магазин</th>
                <th scope="col">Бренды</th>
                <th scope="col">Кто создал</th>
                <th scope="col">Когда создано</th>
                <th scope="col">Кто изменил</th>
                <th scope="col">Когда изменено</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shops as $key => $shop)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td><a href="/shops/{{ $shop->id }}" class="link-dark">{{ $shop->name }}</a></th>
                    <td>
                        <ul>
                            @isset($shop->brands)
                                @foreach ($shop->brands as $brand)
                                    <li>
                                        <a href="/brands/{{ $brand->id }}" class="link-dark">{{ $brand->name }}</a>
                                    </li>
                                @endforeach
                            @endisset
                        </ul>
                        </th>
                    <td>{{ $shop->create_user->name }}</th>
                    <td>{{ $shop->created_at }}</th>
                    <td>{{ $shop->update_user->name }}</th>
                    <td>{{ $shop->updated_at }}</th>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
