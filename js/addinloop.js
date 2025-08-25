(function ($) {

    $(document).on('click', '.single_add_to_cart_buttons', function (e) {
        //-----------animation----------------
        var cart = $('.fa-shopping-cart');
        var imgtodrag = $(this).parent('.ck-book').find(".ck-book-img").eq(0);
        if (imgtodrag) {
            var imgclone = imgtodrag.clone()
                .offset({
                    top: imgtodrag.offset().top,
                    left: imgtodrag.offset().left
                })
                .css({
                    'opacity': '0.5',
                    'position': 'absolute',
                    'height': '150px',
                    'width': '150px',
                    'z-index': '100'
                })
                .appendTo($('body'))
                .animate({
                    'top': cart.offset().top + 10,
                    'left': cart.offset().left + 10,
                    'width': 75,
                    'height': 75
                }, 1000, 'easeInOutExpo');
            setTimeout(function () {
                cart.effect("shake", {
                    times: 2
                }, 200);
            }, 1500);
            imgclone.animate({
                'width': 0,
                'height': 0
            }, function () {
                $(this).detach()
            });
        }

        var item=this;
        e.preventDefault();
        var $thisbutton = $(this),
            $form = $thisbutton.closest('form.cart'),
            id = $thisbutton.val(),
            product_qty = 1,
            product_id = $(this).attr('rel'),
            variation_id = $form.find('input[name=variation_id]').val() || 0;

        var data = {
            action: 'woocommerce_ajax_add_to_cart',
            product_id: $(this).attr('rel'),
            product_sku: '',
            quantity: product_qty,
            variation_id: variation_id,
        };
		console.log(data);
        $(document.body).trigger('adding_to_cart', [$thisbutton, data]);

        $.ajax({
            type: 'post',
            url: wc_add_to_cart_params.ajax_url,
            data: data,
            beforeSend: function (response) {
                $(item).html(' <i class="fa fa-spinner ry-spin ry"></i>');

            },
            complete: function (response) {
                $(item).html('افزودن به سبد خرید');
            },
            success: function (response) {

                if (response.error & response.product_url) {
                    window.location = response.product_url;
                    return;
                } else {
                    var total_basket=parseInt($("#total-basket").html());
                    total_basket=total_basket+parseInt(product_qty);
                    $("#total-basket").html(total_basket);

                }
            },
        });

        return false;
    });
})(jQuery);