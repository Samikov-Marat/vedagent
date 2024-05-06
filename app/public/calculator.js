$(function () {
    $('.js-calculate').on('click', function () {
        reCalculate($(this).closest('form'));
        return true;
    });
    $('.js-radio-company').on('change', function () {
        reCalculate($(this).closest('form'));
        return true;
    });
    $('#weight').on('input', function () {
        reCalculate($(this).closest('form'));
        return true;
    });
    $('#distance').on('input', function () {
        reCalculate($(this).closest('form'));
        return true;
    });


});


function reCalculate($form) {
    let apiUrl = $form.data('apiUrl')

    $('#total-output').html('Заполните все поля');
    $('input[name=company_id]').removeClass('is-invalid');
    $('input[name=weight]').removeClass('is-invalid');
    $('input[name=distance]').removeClass('is-invalid');

    if (hasEmpty()) {
        return;
    }
    let formDump = getFormDump($form);
    $.get({
        url: apiUrl, data: formDump, dataType: 'json'
    }).done(function (result) {
        $('#total-output').html('Стоимость доставки будет ' + result.total.toLocaleString() + ' р.');
    }).fail(function (jqXHR, textStatus, errorThrown) {
        showErrors(jqXHR.responseJSON.errors);
    });
}

function hasEmpty() {
    // Можно проверить вручную
    return false;
}

function getFormDump($form) {
    return $form.find('input[name=company_id],input[name=weight],input[name=distance]')
        .serializeArray();
}

function showErrors(errors) {
    $.each(errors, function (fieldName, fieldError) {
        if ('company_id' === fieldName) {
            $('input[name=company_id]').addClass('is-invalid');
        }
        if ('weight' === fieldName) {
            $('input[name=weight]').addClass('is-invalid');
        }
        if ('distance' === fieldName) {
            $('input[name=distance]').addClass('is-invalid');
        }
    });
}
