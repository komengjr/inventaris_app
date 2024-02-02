$(document).on("click", "#ubahtombolaset", function (e) {
    e.preventDefault();
    var url = $(this).data("url");

    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showdatabarang").html(data);
        })
        .fail(function () {
            $("#showdatabarang").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#tombolbarupeminjaman", function (e) {
    e.preventDefault();
    var url = $(this).data("url");

    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showdatasdm").html(data);
        })
        .fail(function () {
            $("#showdatasdm").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#tombollengkapipeminjaman", function (e) {
    e.preventDefault();
    var url = $(this).data("url");
    $("#showdatalengkapi").html(
        '<div style="text-align: center; padding:2%;"><div class="spinner-border" role="status" > <span class="sr-only">Loading...</span> </div></div>'
    );
    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showdatalengkapi").html(data);
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
$(document).on("click", "#button-verifikasi-kondisi-barang-baik", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    var status = $(this).data("status");
    $("#showdatalengkapi").html(
        '<div style="text-align: center; padding:2%;"><div class="spinner-border" role="status" > <span class="sr-only">Loading...</span> </div></div>'
    );
    $.ajax({
        url: '../../divisi/verifikasi/kondisi/'+status+'/'+id,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showdatalengkapi").html(data);
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
$(document).on("click", "#editdatapeminjamaninventaris", function (e) {
    e.preventDefault();
    var url = $(this).data("url");

    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showdatasdm").html(data);
        })
        .fail(function () {
            $("#showdatasdm").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#buttontambahbarangpeminjaman", function (e) {
    e.preventDefault();
    var url = $(this).data("url");

    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#buttoninputbarangpeminjaman").html(data);
        })
        .fail(function () {
            $("#buttoninputbarangpeminjaman").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#buttoncarinamabarang", function (e) {
    e.preventDefault();
    var url = $(this).data("url");

    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#buttoninputbarangpeminjaman").html(data);
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
$(document).on("click", "#buttoninsertdatapeminjaman", function (e) {
    e.preventDefault();
    var url = $(this).data("url");

    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#tablepencariandata").html(data);
            document.getElementById("refreshtablepeminjaman").click();
        })
        .fail(function () {
            $("#tablepencariandata").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#refreshtablepeminjaman", function (e) {
    e.preventDefault();
    var url = $(this).data("url");

    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#tablepeminjaman").html(data);
        })
        .fail(function () {
            $("#tablepeminjaman").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#buttoneditbarangpeminjaman", function (e) {
    e.preventDefault();
    var url = $(this).data("url");

    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#tablepeminjaman").html(data);
        })
        .fail(function () {
            $("#tablepeminjaman").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#buttonbalikbarangpeminjaman", function (e) {
    e.preventDefault();
    var url = $(this).data("url");

    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#tablepeminjaman").html(data);
        })
        .fail(function () {
            $("#tablepeminjaman").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#buttonsimpandataupdatedetailpeminjaman", function (e) {
        var data = $("#updatedatadetailpeminjaman").serialize();

        e.preventDefault();
        var url = $(this).data("url");
        $.ajax({
            url: url,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf"]').attr("content"),
            },
            type: "POST",
            data: data,
            dataType: "html",
        })
            .done(function (data) {
                $("#tablepeminjaman").html(data);
            })
            .fail(function () {
                console.log(data);
                $("#tablepeminjaman").html(
                    '<i class="fa fa-info-sign"></i> Gagal Baca'
                );
            });
    }
);
$(document).on("click", "#hapusdatadetailpeminjaman", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    var ids = $(this).data("ids");
    let text = "Apakah Yakin Untuk di Hapus ?\n Tekan OK atau Cancel.";
    if (confirm(text) == true) {
        $.ajax({
            url:
                "../divisi/peminjaman/hapusdetaildatapeminjaman/" +
                id +
                "/" +
                ids,
            type: "GET",
            dataType: "html",
        })
            .done(function (data) {
                $("#tablepeminjaman").html(data);
            })
            .fail(function () {
                $("#tablepeminjaman").html(
                    '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                );
            });
    } else {
    }
});

$(document).on("click", "#buttonpengembalianbarangpeminjaman", function (e) {
    e.preventDefault();
    var url = $(this).data("url");

    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#buttoninputbarangpeminjaman").html(data);
        })
        .fail(function () {
            $("#buttoninputbarangpeminjaman").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#tombolbarumaintenance", function (e) {
    e.preventDefault();
    var url = $(this).data("url");
    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showdatasdm").html(data);
        })
        .fail(function () {
            $("#showdatasdm").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#verifdatainventaris", function (e) {
    e.preventDefault();
    var url = $(this).data("url");

    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#menuverifikasi").html(data);
        })
        .fail(function () {
            $("#menuverifikasi").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#button-scanner-verifdatainventaris", function (e) {
    e.preventDefault();
    var url = $(this).data("url");

    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#menuverifikasi").html(data);
        })
        .fail(function () {
            $("#menuverifikasi").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});

$(document).on("click", "#tombolbarumutasi", function (e) {
    e.preventDefault();
    var url = $(this).data("url");

    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showdatasdm").html(data);
        })
        .fail(function () {
            $("#showdatasdm").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#tombolbarupemusnahan", function (e) {
    e.preventDefault();
    var url = $(this).data("url");
    $.ajax({
        url: "../../divisi/tambahdatapemusnahan",
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showdatasdm").html(data);
        })
        .fail(function () {
            $("#showdatasdm").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#updatedatainventori", function (e) {
    var data = $("#form-update").serialize();
    e.preventDefault();
    $("#showdatabarang").html("");
    $.ajax({
        url: "divisi/inventori/updatedatainventori",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf"]').attr("content"),
        },

        type: "POST",
        data: data,
        dataType: "html",
    })
        .done(function (data) {
            $("#showdatabarang").html("");
            Lobibox.notify("success", {
                pauseDelayOnHover: true,
                icon: "fa fa-info-circle",
                continueDelayOnInactiveTab: false,
                position: "center top",
                showClass: "bounceIn",
                hideClass: "bounceOut",
                width: 600,
                msg: "Berhasil Update data",
            });
            setTimeout(() => {
                location.reload();
            }, 1500);
        })
        .fail(function () {
            $("#showdatabarang").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#mutasidatabarang", function (e) {
    e.preventDefault();
    var url = $(this).data("url");
    $("#showdatabarang").html(
        "<img src='icon.png'  style='display: block; margin: auto;'>"
    );
    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showdatabarang").html(data);
        })
        .fail(function () {
            $("#showdatabarang").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#tambahsubdatabarang", function (e) {
    var data = $("#form-tambah-barang").serialize();

    e.preventDefault();
    var url = $(this).data("url");
    $("#showdatabarang").html(
        "<br><br><br><img src='icon.png'  style='display: block; margin: auto;'>"
    );
    $.ajax({
        url: url,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf"]').attr("content"),
        },
        type: "POST",
        data: data,
        dataType: "html",
    })
        .done(function (data) {
            // console.log(data);
            $("#showdatabarang").html(data);
        })
        .fail(function () {
            console.log(data);
            $("#showdatabarang").html(
                '<i class="fa fa-info-sign"></i> Gagal Baca'
            );
        });
});

$(document).on("click", "#editdatabarang", function (e) {
    e.preventDefault();
    var url = $(this).data("url");
    $("#showdatabarang").html(
        '<div style="text-align: center; padding:2%;"><div class="spinner-border" role="status" > <span class="sr-only">Loading...</span> </div></div>'
    );
    setTimeout(() => {
        $.ajax({
            url: url,
            type: "GET",
            dataType: "html",
        })
            .done(function (data) {
                $("#showdatabarang").html(data);
            })
            .fail(function () {
                Lobibox.notify("error", {
                    pauseDelayOnHover: true,
                    icon: "fa fa-info-circle",
                    continueDelayOnInactiveTab: false,
                    position: "center top",
                    showClass: "bounceIn",
                    hideClass: "bounceOut",
                    width: 600,
                    msg: "Hubungi Administrator Jika terjadi Eror",
                });
            });
    }, 1500);
});

$(document).on("click", "#tomboltindakanmaintenance", function (e) {
    e.preventDefault();
    var url = $(this).data("url");

    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showdatasdm").html(data);
        })
        .fail(function () {
            Lobibox.notify("error", {
                pauseDelayOnHover: true,
                icon: "fa fa-info-circle",
                continueDelayOnInactiveTab: false,
                position: "center top",
                showClass: "bounceIn",
                hideClass: "bounceOut",
                width: 600,
                msg: "Hubungi Administrator Jika terjadi Eror",
            });
        });
});
$(document).on("click", "#button-cetak-maintenance", function (e) {
    e.preventDefault();
    var id = $(this).data("id");

    $.ajax({
        url: "../divisi/maintenance/printmaintenance/" + id,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            // $("#showdatasdm").html(data);
            $("#showdatasdm").html(
                '<iframe src="data:application/pdf;base64, ' +
                    data +
                    '" style="width:100%; height:500px;" frameborder="0"></iframe>'
            );
        })
        .fail(function () {
            $("#showdatasdm").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#editbarangmaster", function (e) {
    e.preventDefault();
    var url = $(this).data("url");

    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showdatasdm").html(data);
        })
        .fail(function () {
            $("#showdatasdm").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#showbarangmasterloginventory", function (e) {
    e.preventDefault();
    var url = "../divisi/masterbarang/dataloginventaris";
    $("#showdatmasterbarang").html(
        "<img src='../anim.gif'  style='display: block; margin: auto;'>"
    );
    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showdatmasterbarang").html(data);
        })
        .fail(function () {
            $("#showdatmasterbarang").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#button-cek-datalog-eror", function (e) {
    e.preventDefault();
    var url = "../divisi/masterbarang/dataloginventaris/cekeror";
    $("#showmenudataloginventaris").html(
        "<img src='../anim.gif'  style='display: block; margin: auto;'>"
    );
    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showmenudataloginventaris").html(data);
        })
        .fail(function () {
            $("#showmenudataloginventaris").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#button-cek-datalog-erorklasifikasi", function (e) {
    e.preventDefault();
    var url = "../divisi/masterbarang/dataloginventaris/cekerorklasifikasi";
    $("#showmenudataloginventaris").html(
        "<img src='../anim.gif'  style='display: block; margin: auto;'>"
    );
    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showmenudataloginventaris").html(data);
        })
        .fail(function () {
            $("#showmenudataloginventaris").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#buttoneditloginventaris", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    var url = "../divisi/masterbarang/dataloginventaris/editdata/" + id;

    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showmenudataloginventaris").html(data);
        })
        .fail(function () {
            $("#showmenudataloginventaris").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#buttoneditloginventarisklasifikasi", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    var url =
        "../divisi/masterbarang/dataloginventaris/editdataklasifikasi/" + id;

    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showmenudataloginventaris").html(data);
        })
        .fail(function () {
            $("#showmenudataloginventaris").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});

$(document).on("click", "#buttoneditdataloginventory", function (e) {
    var data = $("#form-updateloginventory").serialize();

    e.preventDefault();
    var url = $(this).data("url");
    $("#showmenudataloginventaris").html(
        "<br><br><br><img src='../icon.png'  style='display: block; margin: auto;'>"
    );
    $.ajax({
        url: url,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf"]').attr("content"),
        },
        type: "POST",
        data: data,
        dataType: "html",
    })
        .done(function (data) {
            // console.log(data);
            $("#showmenudataloginventaris").html(data);
        })
        .fail(function () {
            console.log(data);
            $("#showmenudataloginventaris").html(
                '<i class="fa fa-info-sign"></i> Gagal Baca'
            );
        });
});

$(document).on("click", "#buttontambahdataaset", function (e) {
    e.preventDefault();
    // var url = $(this).data("url");
    var url = "divisi/dataaset/tambah";

    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showdataaset").html(data);
        })
        .fail(function () {
            $("#showdataaset").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#showtableaset", function (e) {
    e.preventDefault();
    // var url = $(this).data("url");
    var url = "divisi/dataaset/tabledataaset";

    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showdataaset").html(data);
        })
        .fail(function () {
            $("#showdataaset").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#buttonpilihdataaset", function (e) {
    e.preventDefault();
    // var url = $(this).data("url");
    var url = "divisi/dataaset/pilihdata";

    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showdataaset").html(data);
        })
        .fail(function () {
            $("#showdataaset").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#buttondatadepresiasi", function (e) {
    e.preventDefault();
    // var url = $(this).data("url");
    var url = "divisi/dataaset/datadepresiasi";

    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showdataaset").html(data);
        })
        .fail(function () {
            $("#showdataaset").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#buttondatatabledepresiasi", function (e) {
    e.preventDefault();
    // var url = $(this).data("url");
    var url = "../divisi/dataaset/datadepresiasi/table";
    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showmenuaset1").html(data);
        })
        .fail(function () {
            $("#showmenuaset1").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#buttonpenambahandatadepresiasi", function (e) {
    e.preventDefault();
    // var url = $(this).data("url");
    var url = "../divisi/dataaset/datadepresiasi/penambahandata";
    console.log("test");
    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showmenuddatadepresiasi").html(data);
        })
        .fail(function () {
            $("#showmenuddatadepresiasi").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#buttondetaildataaset", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    var url = "divisi/dataaset/detaildataaset/" + id;

    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showdataaset").html(data);
        })
        .fail(function () {
            $("#showdataaset").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#buttoneditdetailaset", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    var url = "divisi/dataaset/editdetaildataaset/" + id;

    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showdataaset").html(data);
        })
        .fail(function () {
            $("#showdataaset").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#buttondetaildepresiasiaset", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    var url = $(this).data("url");

    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#menudetaildataaset").html(data);
        })
        .fail(function () {
            $("#menudetaildataaset").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#ordertiketmutasi", function (e) {
    e.preventDefault();
    var url = $(this).data("url");

    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showdatalengkapi").html(data);
        })
        .fail(function () {
            $("#showdatalengkapi").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#buttondetailmutasibarang", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
        url: "../../divisi/datamutasi/detaildatamutasi/" + id,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showdatalengkapi").html(data);
        })
        .fail(function () {
            $("#showdatalengkapi").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#buttoninsertdatamutasi", function (e) {
    e.preventDefault();
    var url = $(this).data("url");

    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showmenumutasi").html(data);
            document.getElementById("buttonrefreshtablemutasi").click();
        })
        .fail(function () {
            $("#showmenumutasi").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#buttonrefreshtablemutasi", function (e) {
    e.preventDefault();
    var url = $(this).data("url");
    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#tablemenudatamutasi").html(data);
        })
        .fail(function () {
            $("#tablemenudatamutasi").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#buttoneditbarangmutasi", function (e) {
    e.preventDefault();
    var url = $(this).data("url");
    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#tablemenudatamutasi").html(data);
        })
        .fail(function () {
            $("#tablemenudatamutasi").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});

$(document).on("click", "#buttonhapusdatabarangmutasi", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    var kode = $(this).data("kode");
    let text = "Apakah Yakin Untuk di Hapus ?\n Tekan OK atau Cancel.";
    if (confirm(text) == true) {
        $.ajax({
            url:
                "../divisi/datamutasi/hapusdetaildatamutasi/" + id + "/" + kode,
            type: "GET",
            dataType: "html",
        })
            .done(function (data) {
                $("#tablemenudatamutasi").html(data);
            })
            .fail(function () {
                $("#tablemenudatamutasi").html(
                    '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                );
            });
    } else {
    }
});
$(document).on("click", "#buttonshownotiforder", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    var kode = $(this).data("kode");
    $.ajax({
        url: "../divisi/datamutasi/showdataorder/",
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#bodymodalmutasirecord").html(data);
        })
        .fail(function () {
            $("#bodymodalmutasirecord").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#button-lengkapi-data-mutasi", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
        url: "../divisi/datamutasi/lengkapimutasi/" + id,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#bodymodalmutasirecord").html(data);
        })
        .fail(function () {
            $("#bodymodalmutasirecord").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});

$(document).on("click", "#buttontambahmaintenance", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
        url: "../divisi/dataaset/depresiasi/tambahmaintenance/" + id,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showmenuaset").html(data);
        })
        .fail(function () {
            $("#showmenuaset").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#buttondetaildatamaintenance", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
        url: "../divisi/dataaset/depresiasi/detaildatamaintenance/" + id,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showmenuaset").html(data);
        })
        .fail(function () {
            $("#showmenuaset").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#buttondetaildatainvoice", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
        url: "../divisi/dataaset/depresiasi/detaildatainvoice/" + id,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showmenuaset").html(data);
        })
        .fail(function () {
            $("#showmenuaset").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#buttontambahinvoice", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
        url: "../divisi/dataaset/depresiasi/tambahinvoiceaset/" + id,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showmenuaset").html(data);
        })
        .fail(function () {
            $("#showmenuaset").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#buttonpilihoptiondepresiasi", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
        url: "../divisi/dataaset/depresiasi/pilihdatadepresiasi/" + id,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showmenuaset").html(data);
        })
        .fail(function () {
            $("#showmenuaset").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#tambahdatainevntaris", function (e) {
    e.preventDefault();
    var url = $(this).data("url");
    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showtambahdatabarang").html(data);
        })
        .fail(function () {
            $("#showtambahdatabarang").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});

// Menu Staff
$(document).on("click", "#buttontambahstaff", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
        url: "../divisi/masterstaff/tambah",
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showdatastaff").html(data);
        })
        .fail(function () {
            $("#showdatastaff").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#button-upload-excel-staff", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
        url: "../divisi/masterstaff/uploadexcel",
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showdatastaff").html(data);
        })
        .fail(function () {
            $("#showdatastaff").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
// Menu Lokasi
$(document).on("click", "#buttontambahnomorruangan", function (e) {
    e.preventDefault();
    var url = $(this).data("id");
    $.ajax({
        url: "../divisi/masterlokasi/tambah",
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showdatalokasi").html(data);
        })
        .fail(function () {
            $("#showdatalokasi").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#buttonlihatmasterlokasi", function (e) {
    e.preventDefault();
    var url = $(this).data("id");
    $.ajax({
        url: "../divisi/masterlokasi/lihatdata",
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showdatalokasi").html(data);
        })
        .fail(function () {
            $("#showdatalokasi").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#button-show-lokasi-cabang", function (e) {
    e.preventDefault();
    var url = $(this).data("id");
    $.ajax({
        url: "../divisi/masterlokasi/lihatdatacabang",
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showdatalokasi").html(data);
        })
        .fail(function () {
            $("#showdatalokasi").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});

$(document).on("click", "#buttonsetupdataruangan", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
        url: "../divisi/masterlokasi/datasetup/" + id,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showdatalengkapi").html(data);
        })
        .fail(function () {
            $("#showdatalengkapi").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#buttoninputdatalokasi", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    var no = $(this).data("no");
    $.ajax({
        url:
            "../divisi/masterlokasi/datasetup/inputdatamaster/" + no + "/" + id,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showmenudatalokasibarang").html(data);
        })
        .fail(function () {
            $("#showmenudatalokasibarang").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#buttonresetmasterbarangdatalokasi", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    var no = $(this).data("no");
    $.ajax({
        url:
            "../divisi/masterlokasi/datasetup/resetdatamaster/" + no + "/" + id,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showmenudatalokasibarang").html(data);
        })
        .fail(function () {
            $("#showmenudatalokasibarang").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#buttontablemasterlokasibarang", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    // var no = $(this).data("no");
    $.ajax({
        url: "../divisi/masterlokasi/datasetup/tablemasterlokasibarang/" + id,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showdatalengkapi").html(data);
        })
        .fail(function () {
            $("#showdatalengkapi").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#button-edit-master-nomor-lokasi", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    // var no = $(this).data("no");
    $.ajax({
        url: "../divisi/masterlokasi/dataedit/masterlokasibarang/" + id,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showdatalokasi").html(data);
        })
        .fail(function () {
            $("#showdatalokasi").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});


$(document).on("click", "#button-pilih-barang-pemusnahan", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    // var no = $(this).data("no");
    $.ajax({
        url: "../divisi/pemusnahan/pilihdatabarang/" + id,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#menu-daftar-inevntaris").html(data);
        })
        .fail(function () {
            $("#menu-daftar-inevntaris").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#button-pilih-barang-maintenance", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    // var no = $(this).data("no");
    $.ajax({
        url: "../divisi/maintenance/pilihdatabarang/" + id,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#menu-daftar-inevntaris").html(data);
        })
        .fail(function () {
            $("#menu-daftar-inevntaris").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#button-lihat-file-maintenance", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    // var no = $(this).data("no");
    $.ajax({
        url: "../divisi/maintenance/showfilemaintenance/" + id,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#showdatasdm").html(data);
        })
        .fail(function () {
            $("#showdatasdm").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});

/// CASE DATA

$(document).on("click", "#button-tambah-data-case-baru", function (e) {
    e.preventDefault();
    $.ajax({
        url: "../divisi/case/databaru/",
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#menu-data-case").html(data);
        })
        .fail(function () {
            $("#menu-data-case").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#button-case-data-lokasi", function (e) {
    e.preventDefault();
    $.ajax({
        url: "../divisi/case/datalokasi/",
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#menu-data-case").html(data);
        })
        .fail(function () {
            $("#menu-data-case").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#button-case-data-klasifikasi", function (e) {
    e.preventDefault();
    $.ajax({
        url: "../divisi/case/dataklasifikasi/",
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#menu-data-case").html(data);
        })
        .fail(function () {
            $("#menu-data-case").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#button-detail-data-case", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
        url: "../divisi/case/datacase/detail/" + id,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#data-modal-case").html(data);
        })
        .fail(function () {
            $("#data-modal-case").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#button-cetak-stock-opname", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $("#show-menu-report-stockopname").html(
        '<span class="badge badge-warning m-1">Loading..</span>'
    );
    $.ajax({
        url: "../menu/verifdatainventaris/cetak/detail/" + id,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#show-menu-report-stockopname").html(data);
        })
        .fail(function () {
            $("#show-menu-report-stockopname").html(
                '<span class="badge badge-danger m-1">Gagal Baca Dokumen..</span>'
            );
        });
});
$(document).on("click", "#button-print-all", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    var page = document.getElementById("page").value;
    // console.log(id);
    if (page == "-") {
        Lobibox.notify("warning", {
            pauseDelayOnHover: true,
            icon: "fa fa-info-circle",
            continueDelayOnInactiveTab: false,
            position: "center top",
            showClass: "bounceIn",
            hideClass: "bounceOut",
            sound: false,
            width: 400,
            msg: "Mohon Dipilih Option",
        });
    } else {
        $("#show-menu-data-lokasi-barang").html(
            '<div style="text-align: center; padding:2%;"><div class="spinner-border" role="status" > <span class="sr-only">Loading...</span> </div></div>'
        );
        $.ajax({
            url: "/divisi/printall/ruangan/" + id + "/" + page,
            type: "GET",
            dataType: "html",
        })
            .done(function (data) {
                $("#show-menu-data-lokasi-barang").html(
                    '<iframe src="data:application/pdf;base64, ' +
                        data +
                        '" style="width:100%;; height:500px;" frameborder="0"></iframe>'
                );
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
    }
});

// REPORT
$(document).on("click", "#button-laporan-barang-keseluruhan", function (e) {
    e.preventDefault();
    $("#menu-laporan").html(
        '<div class="spinner-border" role="status"> <span class="sr-only">Loading...</span> </div>'
    );
    $.ajax({
        url: "../menu/masterlaporan/all-barang-cabang/",
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#menu-laporan").html(data);
        })
        .fail(function () {
            $("#menu-laporan").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#button-laporan-barang-lokasi", function (e) {
    e.preventDefault();
    $.ajax({
        url: "../menu/masterlaporan/lokasi-barang-cabang/",
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#menu-laporan").html(data);
        })
        .fail(function () {
            $("#menu-laporan").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#button-print-laporan-ruangan-pdf", function (e) {
    e.preventDefault();
    var url = $(this).data("url");
    var data = $("#form-report-pilihan-ruangan").serialize();
    $("#hasil-report-ruangan").html(
        '<div class="spinner-border" role="status"> <span class="sr-only">Loading...</span> </div>'
    );
    $.ajax({
        url: url,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf"]').attr("content"),
        },
        type: "POST",
        data: data,
        dataType: "html",
    })
        .done(function (data) {
            $("#hasil-report-ruangan").html(
                '<iframe src="data:application/pdf;base64, ' +
                    data +
                    '" style="width:100%;; height:500px;" frameborder="0"></iframe>'
            );
        })
        .fail(function () {
            $("#hasil-report-ruangan").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#button-print-laporan-peminjaman", function (e) {
    e.preventDefault();
    var url = $(this).data("url");
    var data = $("#form-report-peminjaman").serialize();
    var start = document.getElementById("startdate").value;
    var end = document.getElementById("enddate").value;
    if (start == "" || end == "") {
        $("#hasil-report-peminjaman").html(
            '<span class="badge badge-warning shadow-success m-0">Mohon Disi dengan benar</span>'
        );
    } else {
        $("#hasil-report-peminjaman").html(
            '<div class="spinner-border" role="status"> <span class="sr-only">Loading...</span> </div>'
        );
        $.ajax({
            url: url,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf"]').attr("content"),
            },
            type: "POST",
            data: data,
            dataType: "html",
        })
            .done(function (data) {
                $("#hasil-report-peminjaman").html(
                    '<iframe src="data:application/pdf;base64, ' +
                        data +
                        '" style="width:100%;; height:500px;" frameborder="0"></iframe>'
                );
            })
            .fail(function () {
                $("#hasil-report-peminjaman").html(
                    '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                );
            });
    }
});
$(document).on("click", "#button-print-laporan-stokopname", function (e) {
    e.preventDefault();
    var url = $(this).data("url");
    var data = $("#form-report-stokopname").serialize();
    var start = document.getElementById("startdate").value;
    var end = document.getElementById("enddate").value;
    if (start == "" || end == "") {
        $("#hasil-report-stokopname").html(
            '<span class="badge badge-warning shadow-success m-0">Mohon Disi dengan benar</span>'
        );
    } else {
        $("#hasil-report-stokopname").html(
            '<div class="spinner-border" role="status"> <span class="sr-only">Loading...</span> </div>'
        );
        $.ajax({
            url: url,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf"]').attr("content"),
            },
            type: "POST",
            data: data,
            dataType: "html",
        })
            .done(function (data) {
                $("#hasil-report-stokopname").html(
                    '<iframe src="data:application/pdf;base64, ' +
                        data +
                        '" style="width:100%;; height:500px;" frameborder="0"></iframe>'
                );
            })
            .fail(function () {
                $("#hasil-report-stokopname").html(
                    '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                );
            });
    }
});

$(document).on("click", "#button-simpan-hasil-verifikasi", function (e) {
    var data = $("#form-verifikasi-data-inevntaris").serialize();
    e.preventDefault();
    $.ajax({
        url: "../divisi/postverifikasi/scanner/simpandata",
        type: "POST",
        data: data,
        dataType: "html",
    })
        .done(function (data) {
            $("#hasil-pencarian").html(data);
        })
        .fail(function () {
            $("#hasil-pencarian").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
$(document).on("click", "#btn-show-data-belum-verif", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $("#menu-form-verifikasi-data-stockopname").html(
        '<span class="badge badge-warning m-1">Loading..</span>'
    );
    $.ajax({
        url: "../menu/verifdatainventaris/unverified/data/" + id,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#menu-form-verifikasi-data-stockopname").html(data);
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
