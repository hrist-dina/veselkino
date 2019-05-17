$(document).ready(function() {
    $(".js-form-reservation").each(function () {
        var form = $(this);
        form.on("submit", function (o) {
            o.preventDefault();
            o.stopPropagation();
            form.find(".field.is-error").removeClass("is-error");

            var baseDataSector = '.js-form-reservation-';
            var data = {};

            $(form).serializeArray().each(function (item) {
                data[item.name] = item.value
            });

            var date = $(baseDataSector + 'date input');
            if (date.length) {
                if (date.val() === '') {
                    $([document.documentElement, document.body]).animate({
                        scrollTop: date.offset().top - 200
                    }, 1000);
                    date.addClass('is-error');

                    //alert('Укажите дату!')
                } else {
                    data[date.attr('name')] = date.val();
                }
            }


            var time = $(baseDataSector + 'time select');
            if (time.length) {
                if (time.val() === '') {
                    alert('Укажите время!')
                } else {
                    data[time.attr('name')] = time.val();
                }
            }

            var count = $(baseDataSector + 'count select');
            if (count.length) {
                if (count.val() === '') {
                    alert('Укажите количество человек!')
                } else {
                    data[time.attr('name')] = time.val();
                }
            }


            var tariffs = $(baseDataSector + 'tariffs input');
            if (tariffs.length) {
                if (tariffs.val() === '') {
                    alert('Укажите тариф!')
                } else {
                    data[tariffs.attr('name')] = tariffs.val();
                }
            }

            var zones = $(baseDataSector + 'zones input');
            if(zones.length) {
                if (zones.val() === '') {
                    alert('Укажите зону!')
                } else {
                    data[zones.attr('name')] = zones.val();
                }
            }



            console.log(data);



            $.ajax({
                url: form.attr("action"),
                dataType: "json",
                data: data,
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
    });

    /*setTimeout(function() {
        console.log($(".js-popup"));
        $(".js-popup").fadeIn();

        setTimeout(function() {
            $(".js-popup").fadeOut();
        }, 5000);
    }, 5000);*/

    $(".js-popup").on("click", function() {
        $(this).fadeOut();
    });


    window.dataTemplate = {
        time: [
            {
                name: '11:00',
                code: '11:00',
            },
            {
                name: '14:30',
                code: '14:30',
            },
            {
                name: '18:00',
                code: '18:00',
            }
        ],
        countPeople: [
            {
                name: 'До 7 человек',
                code: '7',
                tariffs: [
                    {
                        name: 'Мини',
                        code: 'mini',
                        description: 'аренда зоны празднования на 3 часа, доступ во все зоны развлекательного центра на 3 часа, возможность пользоваться кухней (холодильник, микроволновка, чайник, раковина).',
                        count: '6 детей и 1 взрослый.',
                        price: '4000 руб.',
                        image: 'images/reservation/tariffs/tariff-1.svg'
                    },
                    {
                        name: 'Мини + квест/анимация',
                        code: 'mini-quest',
                        description: 'аренда зоны празднования на 3 часа, доступ во все зоны развлекательного центра на 3 часа, возможность пользоваться кухней (холодильник, микроволновка, чайник, раковина), анимация/квест (на выбор) в течение 40 минут.',
                        count: '6 детей и 1 взрослый.',
                        price: '6500 руб.',
                        image: 'images/reservation/tariffs/tariff-2.svg'
                    }
                ]
            },
            {
                name: 'До 15 человек',
                code: '15',
                tariffs: [
                    {
                        name: 'Базовый',
                        code: 'base',
                        description: 'аренда зоны празднования на 3 часа, доступ во все зоны развлекательного центра на 3 часа, возможность пользоваться кухней (холодильник, микроволновка, чайник, раковина).',
                        count: '12 гостей, 1 именинник и 2 взрослых.',
                        price: '6000 руб.',
                        image: 'images/reservation/tariffs/tariff-1.svg'
                    },
                    {
                        name: 'Базовый +',
                        code: 'base-plus',
                        description: 'аренда зоны празднования на 3 часа, доступ во все зоны развлекательного центра на 3 часа, возможность пользоваться кухней (холодильник, микроволновка, чайник, раковина), анимация/квест (на выбор) в течение 40 минут.',
                        count: '12 гостей, 1 именинник и 2 взрослых.',
                        price: '8000 руб.',
                        image: 'images/reservation/tariffs/tariff-2.svg'
                    },
                    {
                        name: 'Все включено',
                        code: 'all-inclusive',
                        description: 'аренда зоны празднования на 3 часа, доступ во все зоны развлекательного центра на 3 часа, возможность пользоваться кухней (холодильник, микроволновка, чайник, раковина), анимация/квест (на выбор) в течение 40 минут, оформление зоны шарами и баннером в желаемой тематике, час работы фотографа.',
                        count: '12 гостей, 1 именинник и 2 взрослых.',
                        price: '12000 руб.',
                        image: 'images/reservation/tariffs/tariff-3.svg'
                    }
                ]
            },
            {
                name: 'До 25 человек',
                code: '25',
                tariffs: [
                    {
                        name: 'Праздник',
                        code: 'celebration',
                        description: 'аренда зоны празднования на 3 часа, доступ во все зоны развлекательного центра на 3 часа, возможность пользоваться кухней (холодильник, микроволновка, чайник, раковина), анимация/квест (на выбор) в течение 40 минут, оформление зоны шарами и баннером в желаемой тематике, час работы фотографа.',
                        count: 'до 25 человек.',
                        price: '15000 руб.',
                        image: 'images/reservation/tariffs/tariff-3.svg'
                    }
                ]
            }
        ],
        zones: [
            {
                name: 'Лондон',
                code: 'london',
                slider: [
                    'images/reservation/zones/zones-slider1.png',
                    'images/reservation/zones/zones-slider2.png',
                    'images/reservation/zones/zones-slider1.png',
                    'images/reservation/zones/zones-slider2.png',
                ]
            },
            {
                name: 'Париж',
                code: 'paris',
                slider: [
                    'images/reservation/zones/zones-slider2.png',
                    'images/reservation/zones/zones-slider1.png',
                    'images/reservation/zones/zones-slider2.png',
                    'images/reservation/zones/zones-slider1.png',
                ]
            },
            {
                name: 'Лондон2',
                code: 'london2',
                slider: [
                    'images/reservation/zones/zones-slider1.png',
                    'images/reservation/zones/zones-slider2.png',
                    'images/reservation/zones/zones-slider1.png',
                    'images/reservation/zones/zones-slider2.png',
                ]
            },
            {
                name: 'Париж2',
                code: 'paris2',
                slider: [
                    'images/reservation/zones/zones-slider2.png',
                    'images/reservation/zones/zones-slider1.png',
                    'images/reservation/zones/zones-slider2.png',
                    'images/reservation/zones/zones-slider1.png',
                ]
            }
        ]
    };

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

    renderSelect('.js-render-time-select', 'time', window.dataTemplate.time);

    renderSelect('.js-render-count-select', 'countPeople', window.dataTemplate.countPeople);

    renderTariff('.js-render-count-select', '.js-render-tariffs','tariffs', window.dataTemplate.countPeople);

    renderZone( '.js-render-zones','zones', window.dataTemplate.zones);
});


function renderSelect(selector, name, data) {
    var select = $('<select>');
    select.attr('name', name);
    data.each(function (item) {
        var option = $('<option>');
        option.attr('value', item.code);
        option.text(item.name);
        select.append(option);
    });

    $(selector).append(select);
    return select;
}

function renderTariff(parentSelector, selector, name, data) {
    var selectedOption = $(parentSelector + ' select :selected');
    renderTariffList(selector, selectedOption, name, data);
    $(parentSelector + ' select').on('change', function () {
        selectedOption =  $(this).find(':selected');
        renderTariffList(selector, selectedOption, name, data);
    });

    return $(selector);
}

function renderTariffList(selector,selectedOption, name, data) {
    if ($(selector).hasClass('slick-initialized')) {
        $(selector).slick('unslick');
    }

    $(selector).html('');
    if (data.length) {
        data.each(function ($val) {
            if ($val.code === selectedOption.val())  {
                if ($val.tariffs.length) {
                    $val.tariffs.each(function ($tariff, $key) {
                        $(selector).append(renderTariffItem(name, $tariff, $key));
                    });
                }
            }
        });
    }

    $(selector).slick(window.tariffSlickOptions);
    return $(selector);
}

function renderTariffItem($name, $val, $key = 0) {
    var baseClass = 'reservation-tariff__';
    var item = $('<div>').addClass(baseClass + 'item');

    var inner = $('<div>').addClass(baseClass + 'inner');
    inner.css('background-image', 'url('+ $val.image +')');

    var title = $('<div>').addClass(baseClass + 'title');
    title.text($val.name);
    inner.append(title);

    var price = $('<div>').addClass(baseClass + 'price title-h4');
    price.text($val.price);
    inner.append(price);

    var desc = $('<div>').addClass(baseClass + 'desc').append(renderTariffText(baseClass, 'Что включено', $val.description));
    inner.append(desc);

    var bottom = $('<div>').addClass(baseClass + 'bottom').append(renderTariffText(baseClass, 'Количество гостей', $val.count));
    inner.append(bottom);

    var checkbox = $('<input>', {type: 'radio', name: $name, value: $val.code});

    if($key === 0) {
        checkbox.prop("checked", true);
    } else {
        checkbox.prop("checked", false);
    }

    var button = $('<label>').addClass(baseClass + 'button');
    button.append(checkbox);

    button.append('<span class="button button_medium"><span class="button__content">Выбрать</span></span>');
    inner.append(button);

    item.html(inner);
    return item;
}

function renderTariffText(baseClass,title, val) {
    return $('<div>').addClass(baseClass + 'text').append('<span>'+ title +':<span>').append(val);
}

function renderZone(selector, name, data) {
    $(selector).html('');

    if (data.length) {
        data.each(function ($zone, $key) {
            $(selector).append(renderZoneItem(name, $zone, $key));
        });
    }
    return $(selector);
}

function renderZoneItem($name, $val, $key = 0) {
    var baseClass = 'zones__';
    var item = $('<div>').addClass(baseClass + 'item');

    var title = $('<div>').addClass(baseClass + 'name title-h2');
    title.text($val.name);
    item.append(title);

    var slider = $('<div>').addClass(baseClass + 'slider');

    if ($val.slider.length) {
        $val.slider.each(function (path) {
            var slide = $('<div>').addClass(baseClass + 'slider-item');
            slide.html($('<img>', {src: path, alt: ''}));
            slider.append(slide);
        });
    }
    item.append(slider);
    slider.slick(window.zonesSlickOptions);

    var checkbox = $('<input>', {type: 'radio', name: $name, value: $val.code});

    if($key === 0) {
        checkbox.prop("checked", true);
    } else {
        checkbox.prop("checked", false);
    }

    var button = $('<label>').addClass(baseClass + 'button reservation-tariff__button');
    button.append(checkbox);

    button.append('<span class="button button_medium"><span class="button__content">Выбрать</span></span>');
    item.append(button);

    return item;
}