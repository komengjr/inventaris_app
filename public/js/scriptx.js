
$(document).ready(function() {
    $(document).on('click', '#show-data-mutasi', function(e) {
        var data = $('#form-data-mutasi').serialize();
        var data_jenis = $('#greet1x').val();
        var departemen = $('#departemen').val();
        var divisi = $('#divisi').val();
        var pj = $('#pj').val();
        var penerima = $('#penerima').val();
        var menyetujui = $('#menyetujui').val();
        var ym = $('#ym').val();
        var asal_lokasi = $('#asal_lokasi').val();
        var target_lokasi = $('#target_lokasi').val();

        e.preventDefault();
        var url = $(this).data('url');
        $(".error").remove();
        console.log(data_jenis.length);
        if (data_jenis.length < 1) {
            $('#greet1x').after('<span style="color:red;" class="error">Pilih Jenis Mutasi.</span>');
        }
        if (departemen.length < 1) {
            $('#departemen').after('<span style="color:red;" class="error">Lengkapi Data Terlebih dahulu..</span>');

        }
        if (divisi.length < 1) {
            $('#divisi').after('<span style="color:red;" class="error">Lengkapi Data  dahulu.</span>');

        }
        if (pj.length < 1) {
            $('#pj').after('<span style="color:red;" class="error">Lengkapi Data  Terlebih dahulu.</span>');

        }
        if (penerima.length < 1) {
            $('#penerima').after('<span style="color:red;" class="error">Lengkapi Data  Terlebih dahulu.</span>');

        }
        if (menyetujui.length < 1) {
            $('#menyetujui').after('<span style="color:red;" class="error">Lengkapi Data  Terlebih dahulu.</span>');

        }
        if (ym.length < 1) {
            $('#ym').after('<span style="color:red;" class="error">Lengkapi Data Terlebih dahulu.</span>');

        }
        if (asal_lokasi.length < 1) {
            $('#asal_lokasi').after('<span style="color:red;" class="error">Lengkapi Data Terlebih dahulu.</span>');

        }
        if (target_lokasi.length < 1) {
            $('#target_lokasi').after('<span style="color:red;" class="error">Pilih Lokasi Cabang.</span>');

        } else if(data_jenis.length > 0){
        $('#tambahdatabaru').modal('hide');
        $('#showdatamutasi').html("<img src='icon.png'  style='display: block; margin: auto;'>");
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
                $('#showdatamutasi').html(data);
            })
            .fail(function() {
                $('#showdatamutasi').html(
                    '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                    );
            });
        }
    });
});

$(document).ready(function() {
    $(document).on('click', '#tambahbarangbarux', function(e) {
                e.preventDefault();
                var url = $(this).data('url');
                $('#tampildatabaru').html("<img src='icon.png'  style='display: block; margin: auto;'>");
                $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'html'
                    })
                    .done(function(data) {
                        $('#tampildatabaru').html(data);
                    })
                    .fail(function() {
                        $('#tampildatabaru').html(
                            '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                            );
                    });
    });
});
$(document).ready(function() {
    $(document).on('click', '#tambahsubdatamutasibarangx', function(e) {
                e.preventDefault();
                var url = $(this).data('url');

                $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'html'
                    })
                    .done(function(data) {
                        $('#tambahsubdatamutasibarang').html(data);
                    })
                    .fail(function() {
                        $('#tambahsubdatamutasibarang').html(
                            '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                            );
                    });
    });
});
$(document).ready(function() {
    $(document).on('click', '#selectlokasi', function(e) {
                e.preventDefault();
                var url = $(this).data('url');
                console.log('tets');
                $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'html'
                    })
                    .done(function(data) {
                        $('#selectlokasixx').html(data);
                    })
                    .fail(function() {
                        $('#selectlokasixx').html(
                            '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                            );
                    });
    });
});
function getOption() {
    var datakode = document.getElementById('greet').value;
    // e.preventDefault();
    // var url = $(this).data('url');
    // console.log(datakode);
    $.ajax({

            url: datakode,
            type: 'GET',
            dataType: 'html'
        })
        .done(function(data) {
            $('#selectlokasixx').html(data);
        })
        .fail(function() {
            $('#selectlokasixx').html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                );
        });
};

$(document).ready(function() {
    $(document).on('click', '#kliktambahbrgmutasi', function(e) {
        var data = $('#formbarangmutasi').serialize();
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
                $('#kliktambahbrgmutasix').html(data);
            })
            .fail(function() {
                $('#kliktambahbrgmutasix').html(
                    '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...' );
            });
    });
});

$(document).ready(function() {
    $(document).on('click', '#show-data-musnah', function(e) {
        var data = $('#form-data-musnah').serialize();
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
                $('#showdatamusnah').html(data);
            })
            .fail(function() {
                $('#showdatamusnah').html(
                    '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...' );
            });
    });
});

$(document).ready(function() {
    $(document).on('click', '#showdatamusnah123', function(e) {
                e.preventDefault();
                var url = $(this).data('url');
                $('#tampilformmusnahxx').html("<img src='icon.png'  style='display: block; margin: auto;'>");
                $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'html'
                    })
                    .done(function(data) {
                        $('#tampilformmusnahxx').html(data);
                    })
                    .fail(function() {
                        $('#tampilformmusnahxx').html( '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...' );
                    });
    });
});
$(document).ready(function() {
    $(document).on('click', '#addpemusnahanbarang', function(e) {
                e.preventDefault();
                var url = $(this).data('url');

                $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'html'
                    })
                    .done(function(data) {
                        $('#table-pemusnahan-barang').html(data);
                    })
                    .fail(function() {
                        $('#table-pemusnahan-barang').html( '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...' );
                    });
    });
});

function getOption1() {
    var datakode = document.getElementById('greet1').value;
    // e.preventDefault();
    // var url = $(this).data('url');
    // console.log(datakode);
    $.ajax({

            url: datakode,
            type: 'GET',
            dataType: 'html'
        })
        .done(function(data) {
            $('#selectlokasixx1').html(data);
        })
        .fail(function() {
            $('#selectlokasixx1').html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                );
        });
};

$(document).ready(function() {
    $(document).on('click', '#kliktambahbrgmusnah', function(e) {
        var data = $('#formbarangmusnah').serialize();
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
                $('#record-pemusnahan-barang').html(data);
            })
            .fail(function() {
                $('#record-pemusnahan-barang').html(
                    '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...' );
            });
    });
});
$(document).ready(function() {
    $(document).on('click', '#hapussubtablemusnah', function(e) {

        e.preventDefault();
        var url = $(this).data('url');

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'html'
            })
            .done(function(data) {
                $('#record-pemusnahan-barang').html(data);
            })
            .fail(function() {
                $('#record-pemusnahan-barang').html(
                    '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...' );
            });
    });
});
$(document).ready(function() {
    $(document).on('click', '#hapussubtablemusnah1', function(e) {

        e.preventDefault();
        var url = $(this).data('url');

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'html'
            })
            .done(function(data) {
                $('#record-pemusnahan-barang').html(data);
            })
            .fail(function() {
                $('#record-pemusnahan-barang').html(
                    '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...' );
            });
    });
});
function getOption1x() {
    var datakode = document.getElementById('greet1x').value;
    // e.preventDefault();
    // var url = $(this).data('url');
    // console.log(datakode);
    $.ajax({

            url: "jenis_mutasi/"+datakode,
            type: 'GET',
            dataType: 'html'
        })
        .done(function(data) {
            $('#jenis_mutasi').html(data);
        })
        .fail(function() {
            $('#jenis_mutasi').html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                );
        });
};
$(document).ready(function() {
    $(document).on('click', '#hapussubtablemutasi', function(e) {

        e.preventDefault();
        var url = $(this).data('url');
        console.log(url);

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'html'
            })
            .done(function(data) {
                $('#kliktambahbrgmutasix').html(data);
            })
            .fail(function() {
                $('#kliktambahbrgmutasix').html(
                    '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...' );
            });
    });
});

$(document).ready(function() {
    $(document).on('click', '#lihatdatabarang', function(e) {
        delete window.browseFile288;
        delete window.resumable288;
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
        }, 100);

    });
});
$(document).ready(function() {
    $(document).on('click', '#tambahdatabarang', function(e) {
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
