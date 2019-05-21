$(document).ready(function() {
    $(".js-form-reservation").each(function() {
        var form = $(this);
        form.on("submit", function(o) {
            o.preventDefault();
            o.stopPropagation();

            var baseDataSector = ".js-form-reservation-";
            var data = {};
            var isError = 0;

            $(form)
                .serializeArray()
                .forEach(function(item) {
                    data[item.name] = item.value;
                });

            var date = $(baseDataSector + "date input");
            if (date.length) {
                if (date.val() === "") {
                    setErrorValidationWithScroll(date, 'Укажите дату!');
                    isError = 1;
                } else {
                    removeErrorValidation(date);
                    data[date.attr("name")] = date.val();
                }
            }

            var time = $(baseDataSector + "time select");
            if (time.length) {
                if (time.val() === "") {
                    setErrorValidationWithScroll(time, 'Укажите время!');
                    isError = 1;
                } else {
                    removeErrorValidation(time);
                    data[time.attr("name")] = time.val();
                }
            }

            var count = $(baseDataSector + "count select");
            if (count.length) {
                if (count.val() === "") {
                    setErrorValidationWithScroll(count, 'Укажите количество человек!');
                    isError = 1;
                } else {
                    removeErrorValidation(count);
                    data[time.attr("name")] = time.val();
                }
            }

            var tariffs = $(baseDataSector + "tariffs input");
            if (tariffs.length) {
                if (tariffs.val() === "") {
                    alert("Укажите тариф!");
                    isError = 1;
                } else {
                    data[tariffs.attr("name")] = tariffs.val();
                }
            }

            var zones = $(baseDataSector + "zones input");
            if (zones.length) {
                if (zones.val() === "") {
                    alert("Укажите зону!");
                    isError = 1;
                } else {
                    data[zones.attr("name")] = zones.val();
                }
            }

            form.find('.field input').each(function (key, item) {
                if ($(item).val() === '') {
                    setErrorValidation(item);
                    isError = 1;
                } else {
                    removeErrorValidation(item);
                }
            });
            console.log(data);

            if (!isError) {
                $.ajax({
                    url: form.attr("action"),
                    dataType: "json",
                    data: data,
                    type: "post",
                    success: function(data) {
                        if (data.error) {
                            console.log(data.error);
                        }
                        else if (data.success) {
                            console.log(data.success);
                        }
                    }
                });

                // Модалка об успехе
                // Переместить в success, после того, как будет путь для сохранения формы
                $(".js-popup").fadeIn();
                setTimeout(function() {
                    $(".js-popup").fadeOut();
                }, 10000);

                $(".js-popup-close").on("click", function() {
                    $(".js-popup").fadeOut();
                });
                // Модалка об успехе END
            }
        });
    });

    $('.js-mask-phone').inputmask('+7 (999) 999-99-99', {
        showMaskOnHover: false,
        showMaskOnFocus: false,
    });
    $('.js-mask-date').inputmask('99/99/9999', {
        showMaskOnHover: false,
        showMaskOnFocus: false,
    });

    window.tariffSlickOptions = {
        prevArrow:
            '<button type="button" class="slick-prev"><span class="slick-arrow-icon"></span></button>',
        nextArrow:
            '<button type="button" class="slick-next"><span class="slick-arrow-icon"></span></button>',
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
    };

    window.zonesSlickOptions = {
        arrows: false,
        dots: true,
        speed: 400,
        slidesToShow: 1,
        slidesToScroll: 1,
        swipeToSlide: false,
        infinite: false
    };

    renderSelect(".js-render-time-select", "time", window.dataTemplate.time);

    renderSelect(
        ".js-render-count-select",
        "countPeople",
        window.dataTemplate.countPeople
    );

    renderTariff(
        ".js-render-count-select",
        ".js-render-tariffs",
        "tariffs",
        window.dataTemplate.countPeople
    );

    renderZone(".js-render-zones", "zones", window.dataTemplate.zones);
});

function renderSelect(selector, name, value) {
    var select = $("<select>");
    select.attr("name", name);
    if (value.length) {
        value.forEach(function(item) {
            var option = $("<option>");
            option.attr("value", item.code);
            option.text(item.name);
            select.append(option);
        });
    }

    $(selector).append(select);
    return select;
}

function renderTariff(parentSelector, selector, name, data) {
    var selectedOption = $(parentSelector + " select :selected");
    renderTariffList(selector, selectedOption, name, data);
    $(parentSelector + " select").on("change", function() {
        selectedOption = $(this).find(":selected");
        renderTariffList(selector, selectedOption, name, data);
    });

    return $(selector);
}

function renderTariffList(selector, selectedOption, name, data) {
    if ($(selector).hasClass("slick-initialized")) {
        $(selector).slick("unslick");
    }

    $(selector).html("");
    if (data.length) {
        data.forEach(function($val) {
            if ($val.code === selectedOption.val()) {
                if ($val.tariffs.length) {
                    $val.tariffs.forEach(function($tariff, $key) {
                        $(selector).append(
                            renderTariffItem(name, $tariff, $key)
                        );
                    });
                }
            }
        });
    }

    $(selector).slick(window.tariffSlickOptions);

    $(window).on('resize orientationchange', function() {
        var responsive = window.tariffSlickOptions.responsive;
        if (responsive.length) {
            responsive.forEach(function (item) {
                if ($(window).width() <= item.breakpoint) {
                    $(selector).slick('resize');
                }
            })
        }

    });
    return $(selector);
}

function renderTariffItem($name, $val, $key = 0) {
    var baseClass = "reservation-tariff__";
    var item = $("<div>").addClass(baseClass + "item");

    var inner = $("<div>").addClass(baseClass + "inner");

    var imageWrapper = $("<div>").addClass(baseClass + "image");
    var image = $("<img>", {src: $val.image, alt: $val.name});
    imageWrapper.append(image);
    inner.append(imageWrapper);

    var top = $("<div>").addClass(baseClass + "top");

    var title = $("<div>").addClass(baseClass + "title");
    title.text($val.name);
    top.append(title);

    var price = $("<div>").addClass(baseClass + "price title-h4");
    price.text($val.price);
    top.append(price);

    inner.append(top);

    var desc = $("<div>")
        .addClass(baseClass + "desc")
        .append(renderTariffText(baseClass, "Что включено", $val.description));
    inner.append(desc);

    var bottom = $("<div>")
        .addClass(baseClass + "bottom")
        .append(renderTariffText(baseClass, "Количество гостей", $val.count));
    inner.append(bottom);

    var checkbox = $("<input>", {
        type: "radio",
        name: $name,
        value: $val.code
    });

    if ($key === 0) {
        checkbox.prop("checked", true);
    } else {
        checkbox.prop("checked", false);
    }

    var button = $("<label>").addClass(baseClass + "button");
    button.append(checkbox);

    button.append(
        '<span class="button button_medium"><span class="button__content">Выбрать</span></span>'
    );
    bottom.append(button);

    item.html(inner);
    return item;
}

function renderTariffText(baseClass, title, val) {
    return $("<div>")
        .addClass(baseClass + "text")
        .append("<span>" + title + ":<span>")
        .append(val);
}

function renderZone(selector, name, data) {
    $(selector).html("");

    if (data.length) {
        data.forEach(function($zone, $key) {
            $(selector).append(renderZoneItem(name, $zone, $key));
        });
    }
    return $(selector);
}

function renderZoneItem($name, $val, $key = 0) {
    var baseClass = "zones__";
    var item = $("<div>").addClass(baseClass + "item");

    var title = $("<div>").addClass(baseClass + "name title-h2");
    title.text($val.name);
    item.append(title);

    var slider = $("<div>").addClass(baseClass + "slider");

    if ($val.slider.length) {
        $val.slider.forEach(function(path) {
            var slide = $("<a>").addClass(baseClass + "slider-item").attr({
                'href': path,
                'js-fancybox': '',
                'data-fancybox': 'images-' + ($key + 1),
                'data-type': 'image'
            });
            slide.html($("<img>", { src: path, alt: "" }));
            slider.append(slide);
        });
    }
    item.append(slider);
    slider.slick(window.zonesSlickOptions);

    var checkbox = $("<input>", {
        type: "radio",
        name: $name,
        value: $val.code
    });

    if ($key === 0) {
        checkbox.prop("checked", true);
    } else {
        checkbox.prop("checked", false);
    }

    var button = $("<label>").addClass(
        baseClass + "button reservation-tariff__button"
    );
    button.append(checkbox);

    button.append(
        '<span class="button button_medium"><span class="button__content">Выбрать</span></span>'
    );
    item.append(button);

    return item;
}

function setErrorValidationWithScroll(element, message) {
    $([document.documentElement, document.body]).animate(
        {
            scrollTop: element.offset().top - 200
        },
        1000
    );
    element.addClass('is-error');
    element.parent().find('span').hide();
    element.parent().prepend($('<span>').addClass('field-error').text(message));
}

function setErrorValidation(element) {
    element = $(element);
    element.addClass('is-error');
    element.parent().find('.field__error').addClass('show');
}

function removeErrorValidation(element) {
    element = $(element);
    element.removeClass('is-error');
    element.parent().find('span').show();
    element.parent().find('.field-error').remove();
}