<script src="<?php bloginfo('template_url'); ?>/swiper/js/swiper.min1.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/sweetalert2.js"></script>

<script>
	// Ensure coupon toggle works on checkout even if WooCommerce's handler didn't run
	(function () {
		function attachHandler() {
			if (window.jQuery) {
				// Use delegation; remove any previous ry-coupon-fix marker then attach
				jQuery(document).off('click', '.showcoupon').on('click', '.showcoupon', function (e) {
					e.preventDefault();
					jQuery('form.checkout_coupon').slideToggle(400);
				});
			} else {
				// native fallback (no animation)
				document.removeEventListener('click', ryCouponFallback);
				document.addEventListener('click', ryCouponFallback);
			}
		}

		function ryCouponFallback(e) {
			var el = e.target.closest ? e.target.closest('.showcoupon') : null;
			if (el) {
				e.preventDefault();
				var f = document.querySelector('form.checkout_coupon');
				if (!f) return;
				var cur = window.getComputedStyle(f).display;
				f.style.display = (cur === 'none') ? 'block' : 'none';
			}
		}

		if (document.readyState === 'loading') {
			document.addEventListener('DOMContentLoaded', attachHandler);
		} else {
			attachHandler();
		}
	})();
</script>


<script type="text/javascript">
	$(document).ready(function () {
		$(function ($) {
			$("img.lazy").Lazy({ effect: "fadeIn" });
		});
		//----------------------------------------------------
		$(".ck-book").hover(
			function () {
				$(this).addClass("ck-active-book");
			},
			function () {
				$(this).removeClass("ck-active-book");
			}
		);
		//-------------------------------------------------
		$(".ck-home").click(function () {
			location.replace("https://4khooneh.org");
		});
		$(".ck-mobile-menu").click(function () {
			$(".ck-moblie-item").animate({ width: 'toggle' }, 250);
			$(".ck-moblie-display").animate({ width: 'toggle' }, 250);
		});
		$(".ck-moblie-display").click(function () {
			$(".ck-moblie-item").animate({ width: 'toggle' }, 250);
			$(".ck-moblie-display").animate({ width: 'toggle' }, 250);
		});
		$(".ck-first").click(function () {
			var display = $(this).find(".ck-menu-level2-container").css("display");
			if (display == "none") {
				$(this).find(".ck-menu-level2-container").slideDown();
				$(this).find(".ck-halat").removeClass("fa-angle-down");
				$(this).find(".ck-halat").addClass("fa-angle-up");
			}
			else {
				$(this).find(".ck-menu-level2-container").slideUp();
				$(this).find(".ck-halat").removeClass("fa-angle-up");
				$(this).find(".ck-halat").addClass("fa-angle-down");
			}
		});
		//-----------------------modal----------------------------------------
		$('#myModal').on('shown.bs.modal', function () {
			$('#myInput').trigger('focus')
		});

		//----------------------basket---------------------------------------------
		$(".ck-basket-content").hover(
			function () {
				// $("").slideDown('fast');
				$(this).find(".ck-in-baskets").css("display", "block");
				$(this).find(".ck-in-baskets").animate({
					opacity: 1
				}, 300, function () {
				});
			},
			function () {
				// $("").slideUp('fast');
				$(this).find(".ck-in-baskets").css("opacity", "0");
				$(this).find(".ck-in-baskets").css("display", "none");
			}
		);
	});
</script>
<script type="text/javascript">
        window.RAYCHAT_TOKEN = "98e588f2-fda8-4c87-a2a0-73258a10f829";
        (function () {
            d = document;
            s = d.createElement("script");
            s.src = "https://widget-react.raychat.io/install/widget.js";
            s.async = 1;
            d.getElementsByTagName("head")[0].appendChild(s);
        })();
    </script>
<?php wp_footer(); ?>

</body>

</html>