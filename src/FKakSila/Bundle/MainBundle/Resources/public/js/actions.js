$('td[id ^= answer]').hover(
    function () {
        $(this).addClass('answer-hover'),
        $('span[id =' + $(this).attr("id") + ']').addClass('answer-hover')
    },
    function () {
        $(this).removeClass('answer-hover'),
        $('span[id =' + $(this).attr("id") + ']').removeClass('answer-hover')
    }
);

$('td[id ^= answer]').click(
    function () {
        $(this).toggleClass('answer-hover'),
        $('span[id =' + $(this).attr("id") + ']').toggleClass('answer-hover')
    }
);

