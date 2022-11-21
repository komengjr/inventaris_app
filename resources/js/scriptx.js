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
                $('#tambahsubdatamutasibarang').html("<img src='icon.png'  style='display: block; margin: auto;'>");
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
