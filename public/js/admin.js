$(document).ready(function() {

    $(document).on('click', '#ubahtombolaset', function(e) {
                e.preventDefault();
                var url = $(this).data('url');

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
    $(document).on('click', '#tombolbarupeminjaman', function(e) {
                e.preventDefault();
                var url = $(this).data('url');

                $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'html'
                    })
                    .done(function(data) {
                        $('#showdatasdm').html(data);
                    })
                    .fail(function() {
                        $('#showdatasdm').html(
                            '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                            );
                    });
    });
    $(document).on('click', '#tombollengkapipeminjaman', function(e) {
                e.preventDefault();
                var url = $(this).data('url');

                $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'html'
                    })
                    .done(function(data) {
                        $('#showdatalengkapi').html(data);
                    })
                    .fail(function() {
                        $('#showdatalengkapi').html(
                            '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                            );
                    });
    });
    $(document).on('click', '#buttontambahbarangpeminjaman', function(e) {
                e.preventDefault();
                var url = $(this).data('url');

                $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'html'
                    })
                    .done(function(data) {
                        $('#buttoninputbarangpeminjaman').html(data);
                    })
                    .fail(function() {
                        $('#buttoninputbarangpeminjaman').html(
                            '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                            );
                    });
    });
    $(document).on('click', '#buttonpengembalianbarangpeminjaman', function(e) {
                e.preventDefault();
                var url = $(this).data('url');

                $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'html'
                    })
                    .done(function(data) {
                        $('#buttoninputbarangpeminjaman').html(data);
                    })
                    .fail(function() {
                        $('#buttoninputbarangpeminjaman').html(
                            '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                            );
                    });
    });
    $(document).on('click', '#verifdatainventaris', function(e) {
                e.preventDefault();
                var url = $(this).data('url');

                $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'html'
                    })
                    .done(function(data) {
                        $('#menuverifikasi').html(data);
                    })
                    .fail(function() {
                        $('#menuverifikasi').html(
                            '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                            );
                    });
    });





    $(document).on('click', '#tombolbarumutasi', function(e) {
                e.preventDefault();
                var url = $(this).data('url');

                $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'html'
                    })
                    .done(function(data) {
                        $('#showdatasdm').html(data);
                    })
                    .fail(function() {
                        $('#showdatasdm').html(
                            '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                            );
                    });
    });
    $(document).on('click', '#tombolbarupemusnahan', function(e) {
                e.preventDefault();
                var url = $(this).data('url');

                $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'html'
                    })
                    .done(function(data) {
                        $('#showdatasdm').html(data);
                    })
                    .fail(function() {
                        $('#showdatasdm').html(
                            '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                            );
                    });
    });

    $(document).ready(function() {
        $(document).on('click', '#updatedatainventori', function(e) {
            var data = $('#form-update').serialize();
            e.preventDefault();
            $('#showdatabarang').html(
                "<br><br><br><img src='icon.png'  style='display: block; margin: auto;'>");
            $.ajax({
                    url: "divisi/inventori/updatedatainventori",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
                    },

                    type: 'POST',
                    data: data,
                    dataType: 'html'
                })
                .done(function(data) {
                    // console.log(data);
                    $('#showdatabarang').html(data);
                })
                .fail(function() {
                    $('#showdatabarang').html(
                        '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                        );
                });
        });
    });
    $(document).ready(function() {
        $(document).on('click', '#mutasidatabarang', function(e) {
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
    $(document).ready(function() {
        $(document).on('click', '#tambahsubdatabarang', function(e) {

            var data = $('#form-tambah-barang').serialize();

            e.preventDefault();
            var url = $(this).data('url');
            $('#showdatabarang').html(
                "<br><br><br><img src='icon.png'  style='display: block; margin: auto;'>");
            $.ajax({
                    url: url,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')},
                    type: 'POST',
                    data: data,
                    dataType: 'html'
                })
                .done(function(data) {
                    // console.log(data);
                    $('#showdatabarang').html(data);
                })
                .fail(function() {
                    console.log(data);
                    $('#showdatabarang').html('<i class="fa fa-info-sign"></i> Gagal Baca');
                });
        });
    });
    $(document).ready(function() {
        $(document).on('click', '#editdatabarang', function(e) {
            e.preventDefault();
            var url = $(this).data('url');
            $('#showdatabarang').html("<img src='loading.gif'  style='display: block; margin: auto;'>");
            setTimeout(() => {
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
            }, 1500);

        });
    });
});
