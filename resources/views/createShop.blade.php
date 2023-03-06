@extends('layout')

@section('title')
    New-model-ret добавление магазина
@endsection

@section('main_content')
    <div class="container">
        <h3> Добавление магазина</h3>
        <form href="/create-shop" method="POST">
            @csrf
            <div class="form-group">
                <div class="mb-3">
                    <label for="name" class="form-label">Название</label>
                    <input class="form-control" type="name" name="name" id="name" placeholder="Введите название">
                    @if ($errors->has('name'))
                        <p class="text-danger">{{ $errors->first('name') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="mb-3">
                    <label for="url" class="form-label">Ссылка на сайт</label>
                    <input class="form-control" type="name" name="url" id="url" placeholder="Введите ссылку">
                    @if ($errors->has('url'))
                        <span class="text-danger">{{ $errors->first('url') }}</span>
                    @endif
                </div>
            </div>
            @isset($brands)
                @foreach ($brands as $key => $brand)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="brandId[]"
                            id="flexCheckDefault{{ $key }}" value="{{ $brand->id }}">
                        <label class="form-check-label" for="flexCheckDefault{{ $key }}">
                            {{ $brand['name'] }}
                        </label>
                    </div>
                @endforeach
            @endisset
            <div id="form-check" class="form-text">Привязка к нескольким брендам автоматически делает магазин
                мультибрендом
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
    <hr>
    @isset($shop)
        <div class="container">
            <div class="row">
                <p class="text-success">Добавлено: {{ $shop['name'] }}</p>
            </div>
        </div>
    @endisset
@endsection
