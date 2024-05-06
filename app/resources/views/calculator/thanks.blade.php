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

    <h1>Ваша заявка {{ $order->id }} сохранена</h1>
    <div>Сумма заказа {{ number_format($order->total, 2, ',', ' ') }}</div>
    <div>
        <a href="{!! route('calculator.index') !!}">Вернуться к расчёту</a>
    </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
<script src="/calculator.js?v={{time()}}"></script>

</body>
</html>
