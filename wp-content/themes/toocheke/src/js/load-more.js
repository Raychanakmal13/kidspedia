jQuery(function ($) {

	$('#infinite-scroll').append('<span class="load-more"></span>');
	var button = $('#infinite-scroll .load-more');
	var page = 2;
	var loading = false;
	var scrollHandling = {
		allow: true,
		reallow: function () {
			scrollHandling.allow = true;
		},
		delay: 400 //(milliseconds) adjust to the highest acceptable value
	};

	$(window).scroll(function () {
	
		if (!loading && scrollHandling.allow) {
			scrollHandling.allow = false;
			setTimeout(scrollHandling.reallow, scrollHandling.delay);
			var offset = $(button).offset().top - $(window).scrollTop();
			if (2000 > offset) {
				$('.load-more').before('<div id="loader-container"><div class="loader"></div></div>');
				loading = true;
				var data = {
					action: 'toocheke_ajax_load_more',
					page: page,
					query: toochekeloadmore.query,
				};
				$.post(toochekeloadmore.url, data, function (res) {
					if (res.success) {
						$('#infinite-scroll').append(res.data);
						$('#infinite-scroll').append(button);
						page = page + 1;
						loading = false;						
					} else {
						// console.log(res);
					}
				}).fail(function (xhr, textStatus, e) {
					// console.log(xhr.responseText);
				});
				$("#loader-container").remove();

			}
		}
	});
});