<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <title>Самиков Марат. Тестовое задание. ВЭД Агент.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<div class="container-sm">
    <form method="post" action="{!! route('calculator.save') !!}" data-api-url="{!! route('calculator.calculate') !!}">
        @csrf
        <legend>Параметры расчёта</legend>
        <div class="mt-3">
            <label class="form-label">Транспортная компания</label>
            @foreach($companies as $company)
                <div class="form-check">
                    @php $radioId = 'company' . $company->id; @endphp
                    <input name="company_id" class="form-check-input js-radio-company" type="radio"
                           value="{{ $company->id }}"
                           id="{{ $radioId }}"
                           required>
                    <label class="form-check-label" for="{{ $radioId }}">
                        {{ $company->name }} <strong>{{ $company->price }}</strong>
                    </label>
                    <div class="invalid-feedback">
                        Выберите компанию
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-3">
            <label for="weight" class="form-label">Вес груза, кг (от 30 до 100 000)</label>
            <input type="number" name="weight" class="form-control" step="0.01" id="weight" autocomplete="off"
                   required>
            <div class="invalid-feedback">
                Введите корректный вес груза
            </div>
        </div>
        <div class="mt-3">
            <label for="distance" class="form-label">Расстояние, км</label>
            <input type="number" name="distance" class="form-control" id="distance" autocomplete="off"
                   required>
            <div class="invalid-feedback">
                Введите корректное расстояние
            </div>
        </div>
        <div class="mt-3">
            <label class="form-label" id="total-output"></label>
        </div>
        <div class="mt-3">
            <button type="button" class="btn btn-primary js-calculate">
                Рассчитать стоимость
            </button>
            <button type="submit" class="btn btn-primary">Заказать</button>
        </div>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
<script src="/calculator.js?v={{time()}}"></script>

</body>
</html>
