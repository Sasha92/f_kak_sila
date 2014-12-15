$('li.answer').hover(
    function () {
        $(this).addClass('answer-hover');
        $('span.answer-' + $(this).data("answer-id")).addClass('answer-hover');
    },
    function () {
        $(this).removeClass('answer-hover');
        $('span.answer-' + $(this).data("answer-id")).removeClass('answer-hover');
    }
);

$('li.answer').click(
    function () {
        $(this).toggleClass('answer-hover');
        $('span.answer-' + $(this).data("answer-id")).toggleClass('answer-hover');
    }
);

$('input').on('input', function () {
    var value = $(this).val();
    var number = value.charCodeAt(value.length - 1);

    if ((number < 63 || number > 91) && (number < 96 || number > 123) && (number != 32) && (number != 46) && (number != 47)) {
        $(this).val(value.slice(0, value.length - 1));

        if ($('.error-msg').length != 1){
            var error = "<p class='error-msg'> Допустимые символы: латиница @ / . пробел</p>";
            $('form').before(error);
        }
        setTimeout(function(){
            if ($('.error-msg').length > 0) {
                $('.error-msg').remove();
            }
        }, 3000);
    }
});

$('.input-group >ul>li').addClass('error-msg');


