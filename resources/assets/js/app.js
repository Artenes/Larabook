require('./bootstrap');

$("#logout-link").click(function (e) {

    e.preventDefault();

    $("#logout-form").submit();

});
