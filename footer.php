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

<?php wp_footer(); ?>

</body>
</html>