var pathname = $(location).attr('pathname');
var id = pathname.split('/');

/*------------------ Sending email by clicking on the button ----------------*/
$('.btnBookID').click(function(event) {
    $.ajax({
        url: "/?id=" + id[2],
        type: "POST",
        success: function(response) {
            alert(
                "Книга свободна и ты можешь прийти за ней." +
                " Наш адрес: г. Кропивницкий, переулок Васильевский 10, 5 этаж." +
                " Лучше предварительно прозвонить и предупредить нас, чтоб " +
                " не попасть в неловкую ситуацию. Тел. 099 196 24 69");
        },
        error: function(response) {
            $('#result_form').html('Ошибка. Данные не отправлены.');
        }
    });
});
