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
});