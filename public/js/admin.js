$(document).ready(function () {
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

    $(document).ready(function () {
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
    });
    $(document).ready(function () {
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
    });
    $(document).ready(function () {
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
    });
    $(document).ready(function () {
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
});
