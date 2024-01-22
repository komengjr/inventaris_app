$(document).on("click", "#button-nav-login-user", function (e) {
    e.preventDefault();
    var url = $(this).data("url");
    $("#menu-modal-nav").html('<div style="text-align: center; padding:2%;"><div class="spinner-border" role="status" > <span class="sr-only">Loading...</span> </div></div>');
    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#menu-modal-nav").html(data);
        })
        .fail(function () {
            Lobibox.notify("error", {
                pauseDelayOnHover: true,
                icon: "fa fa-info-circle",
                continueDelayOnInactiveTab: false,
                position: "center top",
                showClass: "bounceIn",
                hideClass: "bounceOut",
                sound: false,
                width: 400,
                msg: "Hubungi Administrator Jika terjadi Eror",
            });
        });
});
