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
            $('.navbar').prepend('<div class="alert alert-success text-center"><b>'  + response[2] + '</b>   added to Cart</div>');

            //number of items
            $('.cart-items-number').html('(' + response[1] + ')');

            $('.alert').delay(3000).fadeOut(500);
        });
    });

    $('.alert').delay(3000).fadeOut(500);

})(jQuery);