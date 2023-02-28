@extends('layout')

@section('title')
    New-model-ret загрузка
@endsection

@section('main_content')
    <div class="container">
        Загрузка файлов csv
        <form href="/download" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="formFile" class="form-label">Добавить файл</label>
                <input class="form-control" type="file" id="formFile" name="formFile">
                <div id="formFile" class="form-text">Предусмотрена загрузка лишь файлов csv</div>
            </div>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="text-danger">{{ $error }}</p>
                @endforeach
            @endif
            <button type="submit" class="btn btn-primary">Загрузить</button>
        </form>
    </div>
@endsection
