function success_notiupdate(){
    Lobibox.notify('success', {
    pauseDelayOnHover: true,
    continueDelayOnInactiveTab: false,
    position: 'top center',
    icon: 'fa fa-check-circle',
    msg: 'Data Berhasil di Update.'
    });
  }
function success_notihapus(){
    Lobibox.notify('success', {
    pauseDelayOnHover: true,
    continueDelayOnInactiveTab: false,
    position: 'top center',
    icon: 'fa fa-check-circle',
    msg: 'Data Berhasil di Hapus.'
    });
  }

$(document).ready(function () {
    $(document).on('click', '#master-data-cabang', function(e) {
        var dataId = $(this).attr("data-cabang");
        document.getElementById("kd_cabang3").value = dataId;
    });
    $(document).on('click', '#buttonuploaddatainventaris', function(e) {
        var dataId = $(this).attr("data-id");
        document.getElementById("kdcabang").value = dataId;
    });
    $(document).on('click', '#adduseraccount', function(e) {
        var dataId = $(this).attr("data-id");
        document.getElementById("id").value = dataId;
    });
    $(document).on('click', '#hapusdatauser', function(e) {
        var dataId = $(this).attr("data-id_user");
        document.getElementById("id_user2").value = dataId;
        var id = $(this).attr("data-id");
        document.getElementById("kd_cabang2").value = id;
    });
    $(document).on('click', '#editdatauserbaru', function(e) {
        var name = $(this).attr("data-name");
        document.getElementById("name").value = name;
        var email = $(this).attr("data-email");
        document.getElementById("username").value = email;
        var email_ = $(this).attr("data-email_");
        document.getElementById("email_").value = email_;
        var akses = $(this).attr("data-akses");
        document.getElementById("akses").value = akses;
        var id = $(this).attr("data-id");
        document.getElementById("kd_cabang").value = id;
        var id_user = $(this).attr("data-id_user");
        document.getElementById("id_user").value = id_user;
    });
    $(document).on('click', '#resetpassworddatauser', function(e) {
        var id = $(this).attr("data-id");
        document.getElementById("kd_cabang1").value = id;
        var id_user = $(this).attr("data-id_user");
        document.getElementById("id_user1").value = id_user;
    });
});
// Master Cabang
$(document).ready(function() {
    $(document).on('click', '#buttondatacabang', function(e) {
                e.preventDefault();
                var url = $(this).data('url');
                $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'html'
                    })
                    .done(function(data) {
                        $('#bodyformdatamaster').html(data);
                    })
                    .fail(function() {
                        $('#bodyformdatamaster').html(
                            '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                            );
                    });
    });
    $(document).on('click', '#buttondatalokasi', function(e) {
                e.preventDefault();
                var url = $(this).data('url');
                $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'html'
                    })
                    .done(function(data) {
                        $('#bodyformdatamaster').html(data);
                    })
                    .fail(function() {
                        $('#bodyformdatamaster').html(
                            '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                            );
                    });
    });
    $(document).on('click', '#buttondataklasifikasi', function(e) {
                e.preventDefault();
                var url = $(this).data('url');
                $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'html'
                    })
                    .done(function(data) {
                        $('#bodyformdatamaster').html(data);
                    })
                    .fail(function() {
                        $('#bodyformdatamaster').html(
                            '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                            );
                    });
    });
    $(document).on('click', '#tambahdatalokasi', function(e) {
                e.preventDefault();
                var url = $(this).data('url');
                $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'html'
                    })
                    .done(function(data) {
                        $('#diveditlokasi').html(data);
                    })
                    .fail(function() {
                        $('#diveditlokasi').html(
                            '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                            );
                    });
    });
    $(document).on('click', '#editdatalokasi', function(e) {
                e.preventDefault();
                var url = $(this).data('url');
                $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'html'
                    })
                    .done(function(data) {
                        $('#diveditlokasi').html(data);
                    })
                    .fail(function() {
                        $('#diveditlokasi').html(
                            '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                            );
                    });
    });
    $(document).on('click', '#simpanupdatedatalokasi', function(e) {
        var data = $('#formeditlokasi').serialize();
        e.preventDefault();
        var url = $(this).data('url');
        // console.log(data);
        $.ajax({
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
                },
                type: 'POST',
                data: data,
                dataType: 'html'
            })
            .done(function(data) {
                $('#divtablelokasi').html(data);
                success_noti();
            })
            .fail(function() {
                $('#divtablelokasi').html(
                    '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...' );
            });
    });
    $(document).on('click', '#simpanbarudatalokasi', function(e) {
        var data = $('#formtambahlokasi').serialize();
        e.preventDefault();
        var url = $(this).data('url');
        $.ajax({
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
                },
                type: 'POST',
                data: data,
                dataType: 'html'
            })
            .done(function(data) {
                $('#divtablelokasi').html(data);
                success_noti();
            })
            .fail(function() {
                $('#divtablelokasi').html(
                    '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...' );
            });
    });
    $(document).on('click', '#deletedatalokasibaru', function(e) {
        var data = $('#formeditlokasi').serialize();
        e.preventDefault();
        var url = $(this).data('url');
        $.ajax({
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
                },
                type: 'POST',
                data: data,
                dataType: 'html'
            })
            .done(function(data) {
                $('#divtablelokasi').html(data);
                success_notihapus();
            })
            .fail(function() {
                $('#divtablelokasi').html(
                    '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...' );
            });
    });

    $(document).on('click', '#tambahdataklasifikasi', function(e) {
        e.preventDefault();
        var url = $(this).data('url');
        $.ajax({
                url: url,
                type: 'GET',
                dataType: 'html'
            })
            .done(function(data) {
                $('#diveditklasifikasi').html(data);
            })
            .fail(function() {
                $('#diveditklasifikasi').html(
                    '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                    );
            });
    });
    $(document).on('click', '#editdataklasifikasi', function(e) {
        e.preventDefault();
        var url = $(this).data('url');
        $.ajax({
                url: url,
                type: 'GET',
                dataType: 'html'
            })
            .done(function(data) {
                $('#diveditklasifikasi').html(data);
            })
            .fail(function() {
                $('#diveditklasifikasi').html(
                    '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                    );
            });
    });
    $(document).ready(function() {
        $(document).on('click', '#hapusdatabarang', function(e) {
            e.preventDefault();
            var url = $(this).data('url');
            $('#showdatabarang').html("<img src='icon.png'  style='display: block; margin: auto;'>");
            $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'html'
                })
                .done(function(data) {
                    $('#showdatabarang').html(data);
                })
                .fail(function() {
                    $('#showdatabarang').html(
                        '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                        );
                });
        });
    });
});
// User Jquery
$(document).ready(function() {

    $(document).on('click', '#userbarucabang', function(e) {
                e.preventDefault();
                var url = $(this).data('url');

                $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'html'
                    })
                    .done(function(data) {
                        $('#showdatamaster').html(data);
                    })
                    .fail(function() {
                        $('#showdatamaster').html(
                            '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                            );
                    });
    });

    $(document).on('click', '#simpanbaruuser', function(e) {
        var data = $('#formuserbaru').serialize();
        e.preventDefault();
        var url = $(this).data('url');
        $.ajax({
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
                },
                type: 'POST',
                data: data,
                dataType: 'html'
            })
            .done(function(data) {
                $('#showdatamaster').html(data);
                success_noti();
            })
            .fail(function() {
                $('#showdatamaster').html(
                    '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...' );
            });
    });

    $(document).on('click', '#simpanedituser', function(e) {
        var data = $('#formueditserbaru').serialize();
        e.preventDefault();
        var url = $(this).data('url');
        $.ajax({
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
                },
                type: 'POST',
                data: data,
                dataType: 'html'
            })
            .done(function(data) {
                $('#showdatamaster').html(data);
                success_notiupdate();
            })
            .fail(function() {
                $('#showdatamaster').html(
                    '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...' );
            });
    });

    $(document).on('click', '#simpanresetpassworduser', function(e) {
        var data = $('#formresetuserbaru').serialize();
        e.preventDefault();
        var url = $(this).data('url');
        $.ajax({
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
                },
                type: 'POST',
                data: data,
                dataType: 'html'
            })
            .done(function(data) {
                $('#showdatamaster').html(data);
            })
            .fail(function() {
                $('#showdatamaster').html(
                    '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...' );
            });
    });

    $(document).on('click', '#simpanhapusdatauser', function(e) {
        var data = $('#formhapususer').serialize();
        e.preventDefault();
        var url = $(this).data('url');
        $.ajax({
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
                },
                type: 'POST',
                data: data,
                dataType: 'html'
            })
            .done(function(data) {
                $('#showdatamaster').html(data);
                success_notihapus();
            })
            .fail(function() {
                $('#showdatamaster').html(
                    '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...' );
            });
    });

});
// lokasi Query
$(document).ready(function() {
    $(document).on('click', '#lokasibarucabang', function(e) {
                e.preventDefault();
                var url = $(this).data('url');

                $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'html'
                    })
                    .done(function(data) {
                        $('#showdatamaster').html(data);
                    })
                    .fail(function() {
                        $('#showdatamaster').html(
                            '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                            );
                    });
    });
});
// Inventaris Query
$(document).ready(function() {
    $(document).on('click', '#datainventarsicabang', function(e) {
                e.preventDefault();
                var url = $(this).data('url');
                $('#showdatamaster').html("<img src='loading.gif'  style='display: block; margin: auto;'>");
                setTimeout(() => {
                    $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'html'
                    })
                    .done(function(data) {
                        $('#showdatamaster').html(data);
                    })
                    .fail(function() {
                        $('#showdatamaster').html(
                            '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                            );
                    });
                }, 2000);
    });

    $(document).on('click', '#masterlihatdatabarang', function(e) {
        // delete window.browseFile288;
        // delete window.resumable288;
        e.preventDefault();
        var url = $(this).data('url');
        $('#showdatabarangx').html("<img src='loading.gif'  style='display: block; margin: auto;'>");
        setTimeout(() => {
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'html'
            })
            .done(function(data) {
                $('#showdatabarangx').html(data);
            })
            .fail(function() {
                $('#showdatabarangx').html(
                    '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                    );
            });
        }, 1000);

    });

    $(document).on('click', '#mastertambahdatabarang', function(e) {
        e.preventDefault();
        var url = $(this).data('url');
        $('#showdatabarang').html("<img src='icon.png'  style='display: block; margin: auto;'>");
        $.ajax({
                url: url,
                type: 'GET',
                dataType: 'html'
            })
            .done(function(data) {
                $('#showdatabarang').html(data);
            })
            .fail(function() {
                $('#showdatabarang').html(
                    '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                    );
            });
    });
});
// Peminjaman Query
$(document).ready(function() {
    $(document).on('click', '#datapeminjamancabang', function(e) {
                e.preventDefault();
                var url = $(this).data('url');
                $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'html'
                    })
                    .done(function(data) {
                        $('#showdatamaster').html(data);
                    })
                    .fail(function() {
                        $('#showdatamaster').html(
                            '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                            );
                    });
    });


});
// Mutasi Query
$(document).ready(function() {
    $(document).on('click', '#datamutasicabang', function(e) {
                e.preventDefault();
                var url = $(this).data('url');
                $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'html'
                    })
                    .done(function(data) {
                        $('#showdatamaster').html(data);
                    })
                    .fail(function() {
                        $('#showdatamaster').html(
                            '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                            );
                    });
    });


});
// Pemusnahan Query
$(document).ready(function() {
    $(document).on('click', '#datapemusnahancabang', function(e) {
                e.preventDefault();
                var url = $(this).data('url');
                $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'html'
                    })
                    .done(function(data) {
                        $('#showdatamaster').html(data);
                    })
                    .fail(function() {
                        $('#showdatamaster').html(
                            '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                            );
                    });
    });


});
