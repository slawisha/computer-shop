(function($){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.to_cart').on('click', function(e){
        e.preventDefault();
        var data = {
            product_id : $(this).attr('data-product-id')
        };

        $.post('/cart', data, function(response){
            console.log(response);
            alert('Product ' + response[0] + ' added to Cart');
            //number of items
            $('.cart-items-number').html('(' + response[1] + ')');
        });

    });
})(jQuery);