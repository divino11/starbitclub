/* Логирование через попап */

$("#login").submit(function () {
    return $.ajax({
        type: "POST",
        url: "../login.php",
        data: $("#login").serialize(),
        success: function (t) {
            setTimeout(function () {
                $("#login").trigger("reset");
            }, 1500);
            document.location.href = '/lk.php';
        }
    }), !1
});

$(document).ready(function () {

    var show = true;
    var countbox = "#counts";
    $(window).on("scroll load resize", function () {
        if (!show) return false; // Отменяем показ анимации, если она уже была выполнена
        var w_top = $(window).scrollTop(); // Количество пикселей на которое была прокручена страница
        var e_top = $(countbox).offset().top; // Расстояние от блока со счетчиками до верха всего документа
        var w_height = $(window).height(); // Высота окна браузера
        var d_height = $(document).height(); // Высота всего документа
        var e_height = $(countbox).outerHeight(); // Полная высота блока со счетчиками
        if (w_top + 500 >= e_top || w_height + w_top == d_height || e_height + e_top < w_height) {
            $('.spincrement').css('opacity', '1');
            $('.spincrement').spincrement({
                thousandSeparator: "",
                duration: 1200
            });

            show = false;
        }
    });

});

$(".close").click(function () {
    $("#secondModal").css("display", "none");
    $("#firstModal").css("display", "none");
    $("#secondModal").css("opacity", "0");
    $("#firstModal").css("opacity", "0");
});

$(document).ready(function () {
    $(".scroll, .arrow_up_link").click(function () {
        $("html, body").animate({
            scrollTop: $($(this).attr("href")).offset().top + "px"
        }, {
            duration: 3000,
            easing: "swing"
        });
        return false;
    });
});