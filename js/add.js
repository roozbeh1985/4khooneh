(function ($) {
    $(document).on('click', '.single_add_to_cart_button', function (e) {
        var reel= $(this).attr('rel');
        var btn_html=$(this).parent().html();
        var thisss=this;

        //-----------animation----------------
        var cart = $('.fa-shopping-cart');
        var imgtodrag = $("#ry-coovv").eq(0);
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
        e.preventDefault();
        var $thisbutton = $(this),
            $form = $thisbutton.closest('form.cart'),
            id = $thisbutton.val(),
            product_qty = $("#product-number").val(),
            product_id = $("#product_id").val(),
            variation_id = $form.find('input[name=variation_id]').val() || 0;
        if (typeof reel !== typeof undefined && reel !== false) {
            product_id=reel;

        }
        var data = {
            action: 'woocommerce_ajax_add_to_cart',
            product_id: $(this).attr('rel'),
            product_sku: '',
            quantity: product_qty,
            variation_id: variation_id,
        };
        $(document.body).trigger('adding_to_cart', [$thisbutton, data]);
        $.ajax({
            type: 'post',
            url: wc_add_to_cart_params.ajax_url,
            data: data,
            beforeSend: function (response) {
                $(thisss).html('<div class="col-lg-12 ry-m1  ry-sasss"> <i class="fa fa-spinner ry-spin"></i></div>');

            },
            complete: function (response) {
                $(thisss).parent().html('<button rel="'+reel+'" class="col-lg-12 ry-m1 ry-btn-add-to-cart single_add_to_cart_button" data-toggle="modal" data-target="#exampleModalCenter"> <span> <i class="fa fa-cart-arrow-down"></i><span class="ry-a-t-c-t">افزودن به سبد خرید</span> </span></button>');
            },
            success: function (response) {

                if (response.error & response.product_url) {
                    window.location = response.product_url;
                    return;
                } else {
                    var total_basket=parseInt($("#total-basket").html());
                    total_basket=total_basket+parseInt(product_qty);
                    $("#total-basket").html(total_basket);
                    $(".total-basket").html(total_basket);
                }
            },
        });

        return false;
    });
})(jQuery);