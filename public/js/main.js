/*! --------------------------------------------------------------
# main.js
#
# Main theme js file for Hayla template.
# This is compressed js file. You get uncompressed version with download.
--------------------------------------------------------------*/

$(function($) {
	"use strict";

	// For Fixed header & Scroll to top
	$(window).on("scroll resize", function() {
		if ($(window).scrollTop() >= 75) {
			$("nav.navbar.primary-on-scroll", ".wide").addClass("bg-primary");
			$("nav.navbar.white-on-scroll", ".wide").addClass("bg-white");
		}
		if ($(window).scrollTop() < 75) {
			$("nav.navbar.primary-on-scroll", ".wide").removeClass("bg-primary");
			$("nav.navbar.white-on-scroll", ".wide").removeClass("bg-white");
		}
		if ($(window).scrollTop() >= 400) {
			$(".scroll-top-button").css("bottom", "15px");
		}
		if ($(window).scrollTop() < 400) {
			$(".scroll-top-button").css("bottom", "-50px");
		}
	});
    $(".scroll-top-button", "footer").on("click", function() {
		return $("html, body").animate({
			scrollTop: 0
		});
    });
	// For popovers
	$('[data-toggle="popover"]').popover();
	if ($('.main-wrapper').height() < $(window).height()) {
	  $('.st-footer').addClass('fixed-footer');
	}

});
