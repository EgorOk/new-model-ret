@extends('layout')

@section('title')
    New-model-ret добавление бренда
@endsection

@section('main_content')
    <div class="container">
        <h3> Добавление бренда</h3>
        <form href="/createBrand" method="POST">
            @csrf
            <div class="mb-3">
                <div class="mb-3">
                    <label for="name" class="form-label">Название</label>
                    <input class="form-control" type="name" name="name" placeholder="Введите название">
                </div>
            </div>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="text-danger">{{ $error }}</p>
                @endforeach
            @endif
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
    <hr>
    @isset($brand)
        <div class="container">
            <div class="row">
                <p class="text-success">Добавлено: {{ $brand['name'] }}</p>
            </div>
        </div>
    @endisset
@endsection
