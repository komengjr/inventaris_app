
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
            $("#buttoninputbarangpeminjaman").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
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
});
$(document).on("click", "#hapusdatadetailpeminjaman", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    var ids = $(this).data("ids");
    let text = "Apakah Yakin Untuk di Hapus ?\n Tekan OK atau Cancel.";
    if (confirm(text) == true) {
        $.ajax({
            url: '../divisi/peminjaman/hapusdetaildatapeminjaman/'+id+'/'+ids,
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

$(document).on( "click", "#buttonpengembalianbarangpeminjaman",
    function (e) {
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
    }
);
$(document).on( "click", "#tombolbarumaintenance",
    function (e) {
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
    }
);
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
$(document).on("click", "#updatedatainventori", function (e) {
    var data = $("#form-update").serialize();
    e.preventDefault();
    $("#showdatabarang").html(
        "<br><br><br><img src='icon.png'  style='display: block; margin: auto;'>"
    );
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
            // console.log(data);
            $("#showdatabarang").html(data);
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
        "<img src='loading.gif'  style='display: block; margin: auto;'>"
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
                $("#showdatabarang").html(
                    '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                );
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
    var url = "../divisi/masterbarang/dataloginventaris/editdata/"+id;

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
    console.log('test');
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
            url: '../divisi/datamutasi/hapusdetaildatamutasi/'+id+'/'+kode,
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
        url: '../divisi/datamutasi/showdataorder/',
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
        url: '../divisi/dataaset/depresiasi/tambahmaintenance/'+id,
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
        url: '../divisi/dataaset/depresiasi/detaildatamaintenance/'+id,
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
        url: '../divisi/dataaset/depresiasi/detaildatainvoice/'+id,
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
        url: '../divisi/dataaset/depresiasi/tambahinvoiceaset/'+id,
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
        url: '../divisi/dataaset/depresiasi/pilihdatadepresiasi/'+id,
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
        url: '../divisi/masterstaff/tambah',
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
        url: '../divisi/masterlokasi/tambah',
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
        url: '../divisi/masterlokasi/lihatdata',
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
        url: '../divisi/masterlokasi/datasetup/'+id,
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
        url: '../divisi/masterlokasi/datasetup/inputdatamaster/'+no+'/'+id,
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
        url: '../divisi/masterlokasi/datasetup/resetdatamaster/'+no+'/'+id,
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
        url: '../divisi/masterlokasi/datasetup/tablemasterlokasibarang/'+id,
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
$(document).on("click", "#button-pilih-barang-maintenance", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    // var no = $(this).data("no");
    $.ajax({
        url: '../divisi/maintenance/pilihdatabarang/'+id,
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
        url: '../divisi/maintenance/showfilemaintenance/'+id,
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

