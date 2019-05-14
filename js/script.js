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