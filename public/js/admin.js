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

});
