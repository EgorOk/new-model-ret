@extends('layout')

@section('title')
    New-model-ret загрузка
@endsection

@section('main_content')
    <div class="container">
        <h3> Загрузка файлов csv</h3>
        <form href="/download" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="formFile" class="form-label">Добавить файл</label>
                <input class="form-control" type="file" id="formFile" name="formFile">
                <div id="formFile" class="form-text">Предусмотрена загрузка лишь файлов csv</div>
            </div>
            @isset($brands)
                @foreach ($brands as $key => $brand)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="brandId" id="flexRadioDefault{{ $key }}"
                            value="{{ $brand->id }}">
                        <label class="form-check-label" for="flexRadioDefault{{ $key }}">
                            {{ $brand['name'] }}
                        </label>
                    </div>
                @endforeach
            @endisset
            <br>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="text-danger">{{ $error }}</p>
                @endforeach
            @endif
            <button type="submit" class="btn btn-primary">Загрузить</button>
        </form>
    </div>
    <hr>
    @isset($models)
        @if ($models != null)
            <div class="container">
                <div>
                    <div class="accordion" id="accordionExample">
                        @if ($models['errorsModels'] != null)
                            <div class="accordion-item">
                                <h5 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <h5 class="text-danger">Дубликаты: {{ count($models['errorsModels']) }}</h5>
                                    </button>
                                </h5>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne">
                                    <div class="accordion-body">
                                        @foreach ($models['errorsModels'] as $key => $errorsModel)
                                            <button type="button" class="btn" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal" data-bs-whatever='{{ $errorsModel['model'] }}'
                                                data-bs-whatever-id='{{ $errorsModel['id'] }}'>{{ $key + 1 }}.
                                                {{ $errorsModel['model'] }}
                                            </button>
                                            <br>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($models['createModels'] != null)
                            <div class="accordion-item">
                                <h5 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                        <h5 class="text-success">Заведены: {{ count($models['createModels']) }}</h5>
                                    </button>
                                </h5>
                                <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo">
                                    <div class="accordion-body">
                                        @foreach ($models['createModels'] as $createModel)
                                            <p>{{ $createModel['model'] }}</p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    @endisset

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const exampleModal = document.getElementById('exampleModal')
        exampleModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget

            const model = button.getAttribute('data-bs-whatever')
            const id = button.getAttribute('data-bs-whatever-id')

            const modalTitle = exampleModal.querySelector('.modal-title')
            const modalBody = exampleModal.querySelector('.modal-body')

            modalTitle.textContent = `Модель ${model}`
            modalBody.textContent = `ID ${id}`
        })
    </script>
@endsection
