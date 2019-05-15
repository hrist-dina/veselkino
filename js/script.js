$(function () {
    $("[js-reservation]").each(function () {
        var form = $(this);
        form.on("submit", function (o) {
            o.preventDefault();
            o.stopPropagation();
            form.find(".field.is-error").removeClass("is-error");
            $.ajax({
                url: form.attr("action"),
                dataType: "json",
                data: form.serialize(),
                type: "post",
                success: function (data) {
                    if (data.error) for (var i in data.error) {
                        var s = form.find('[name="' + i + '"]'), n = s.closest(".field").addClass("is-error");
                        n.find(".field__error").html(o.error[i].join("; "))
                    } else if (data.success) {
                        console.log(data);
                    }
                }
            })
        })
    })
});

console.log('test');
$(function () {
    $(".js-reservation-slider").slick(
        {
            prevArrow: '<button type="button" class="slick-prev"><span class="slick-arrow-icon"></span></button>',
            nextArrow: '<button type="button" class="slick-next"><span class="slick-arrow-icon"></span></button>',
            rows: 0,
            mobileFirst: true,
            speed: 400,
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: true,
            swipeToSlide: true,
            infinite: false,
            adaptiveHeight: true,
            variableWidth: true,
            responsive: [
                {
                    breakpoint: 768,
                    settings: "unslick"
                }
            ]
        }
    );
    console.log($(".js-zones-slider"));
    $(".js-zones-slider").slick(
        {
            arrows: false,
            dots: true,
            speed: 400,
            slidesToShow: 1,
            slidesToScroll: 1,
            swipeToSlide: false,
            infinite: false,
        }
    );
});