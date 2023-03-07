@extends('layout')

@section('title')
    New-model-ret {{ $shop->name }}
@endsection

@section('main_content')
    <div class="row">
        <h4>{{ $shop->name }} - <a href="{{ $shop->url }}" class="link-dark">Перейти на сайт</a></h4>
    </div>
    @foreach ($shop->brands as $brand)
        @isset($brand->models[0])
            <h5>{{ $brand->name }}</h5>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Модель</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brand->models as $key => $model)
                            <tr>
                                <td>{{ $model->name }}</th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endisset
    @endforeach
@endsection
