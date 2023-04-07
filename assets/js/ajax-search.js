(function($){
    $('#search-input').on('keyup', function() {
        var search = $(this).val();
        $('#loader').show();
        $('#search-results').hide();
        $.ajax({
            url: ajax_object.ajaxurl,
            type: 'POST',
            data: {
                action: 'ajax_search_filter',
                search: search
            },
            success: function(response) {
                $('#search-results').html(response);
                $('#loader').hide();
                $('#search-results').show();
            }
        });
    });
})(jQuery);