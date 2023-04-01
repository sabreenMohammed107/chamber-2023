AOS.init({
	duration: 800,
	easing: 'slide'
});

(function ($) {

	"use strict";

	$(window).stellar({
		responsive: true,
		parallaxBackgrounds: true,
		parallaxElements: true,
		horizontalScrolling: false,
		hideDistantElements: false,
		scrollProperty: 'scroll'
	});

	var fullHeight = function () {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function () {
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	// loader
	var loader = function () {
		setTimeout(function () {
			if ($('#ftco-loader').length > 0) {
				$('#ftco-loader').removeClass('show');
			}
		}, 1);
	};
	loader();
//change lang
// check language
var language = function () {

var locale = document.getElementsByTagName("html")[0].getAttribute("lang");

if(locale === 'en'){

  document.body.classList.add('ltr');
  
} 
else {
  document.body.classList.remove('ltr')
 


}
};
language();

	// Scrollax
	$.Scrollax();

	var carousel = function () {
		$('.home-slider').owlCarousel({
			loop: true,
			autoplay: true,
			margin: 0,

			animateOut: 'fadeOut',
			animateIn: 'fadeIn',

			// autoplayTimeout:10000,
			nav: true,
			dots: false,
			autoplayHoverPause: false,
			items: 1,
			navText: ["<span class='fa fa-angle-left'></span>", "<span class='fa fa-angle-right'></span>"],
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 1
				},
				1000: {
					items: 1
				}
			}
		});

		setTimeout(function () {
			$('.owl-nav > div').on('click', function () {
				$('.owl-carousel').trigger('stop.owl.autoplay');
			})
		}, 5000);
		$('.carousel-testimony').owlCarousel({
			center: true,
			loop: true,
			items: 1,
			margin: 30,
			stagePadding: 0,
			nav: false,
			navText: ['<span class="ion-ios-arrow-back">', '<span class="ion-ios-arrow-forward">'],
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 2
				},
				1000: {
					items: 3
				}
			}
		});
	};
	carousel();
	$("#carousel6").carousel();
	//sasa start
	jQuery(window).load(function () {


		$('.carousel').carousel();

	});



	// stop video
	// $('.carousel-control-next').click(function (e) {


	// 	$('iframe').attr('src', $('iframe').attr('src'));

	// });
	// $('.carousel-control-prev').click(function (e) {


	// 	$('iframe').attr('src', $('iframe').attr('src'));

	// });
	// $('.carousel-indicators').click(function (e) {


	// 	$('iframe').attr('src', $('iframe').attr('src'));

	// });
	//end



	$('nav .dropdown').hover(function () {
		var $this = $(this);

		$this.find('.dropdown-menu').eq(0).stop(true, true).delay(200).slideDown('show');

	}, function () {
		var $this = $(this);

		$this.find('>.dropdown-menu').eq(0).stop(true, true).delay(200).slideUp('show');




	});




	// scroll
	var scrollWindow = function () {
		$(window).scroll(function () {
			var $w = $(this),
				st = $w.scrollTop(),
				navbar = $('.ftco_navbar'),
				sd = $('.js-scroll-wrap');

			if (st > 250) {
				if (!navbar.hasClass('scrolled')) {
					navbar.addClass('scrolled');
					//$('.scrolled').fadeIn();
				}

			}
			if (st < 250) {
				if (navbar.hasClass('scrolled')) {
					navbar.removeClass('scrolled sleep');
				}
			}
			if (st > 250) {
				if (!navbar.hasClass('awake')) {
					navbar.addClass('awake');
				}

				if (sd.length > 0) {
					sd.addClass('sleep');
				}
			}
			if (st < 250) {
				if (navbar.hasClass('awake')) {
					navbar.removeClass('awake');
					navbar.addClass('sleep');
				}
				if (sd.length > 0) {
					sd.removeClass('sleep');
				}
			}
		});
	};
	scrollWindow();


	var counter = function () {

		$('#section-counter').waypoint(function (direction) {

			if (direction === 'down' && !$(this.element).hasClass('ftco-animated')) {

				var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',')
				$('.number').each(function () {
					var $this = $(this),
						num = $this.data('number');
					console.log(num);
					$this.animateNumber(
						{
							number: num,
							numberStep: comma_separator_number_step
						}, 7000
					);
				});

			}

		}, { offset: '95%' });

	}
	counter();
	/*------------------
			Course Carousel
		--------------------*/
		jQuery(window).load(function () {

		$('.multi-item-example').carousel({
			// interval: 2000
			
		});
		});
	/*------------------*/
/*****************
 * tabs reg
 */$(document).ready(function() {
	$( 'ul.tabs-right li' ).on( 'click', function() {
		$( this ).parent().find( 'li.active' ).removeClass( 'active' );
		$( this ).addClass( 'active' );
  });
});

	var contentWayPoint = function () {
		var i = 0;
		$('.ftco-animate').waypoint(function (direction) {

			if (direction === 'down' && !$(this.element).hasClass('ftco-animated')) {

				i++;

				$(this.element).addClass('item-animate');
				setTimeout(function () {

					$('body .ftco-animate.item-animate').each(function (k) {
						var el = $(this);
						setTimeout(function () {
							var effect = el.data('animate-effect');
							if (effect === 'fadeIn') {
								el.addClass('fadeIn ftco-animated');
							} else if (effect === 'fadeInLeft') {
								el.addClass('fadeInLeft ftco-animated');
							} else if (effect === 'fadeInRight') {
								el.addClass('fadeInRight ftco-animated');
							} else {
								el.addClass('fadeInUp ftco-animated');
							}
							el.removeClass('item-animate');
						}, k * 50, 'easeInOutExpo');
					});

				}, 100);

			}

		}, { offset: '95%' });
	};
	contentWayPoint();


	// navigation
	var OnePageNav = function () {
		$(".smoothscroll[href^='#'], #ftco-nav ul li a[href^='#']").on('click', function (e) {
			e.preventDefault();

			var hash = this.hash,
				navToggler = $('.navbar-toggler');
			$('html, body').animate({
				scrollTop: $(hash).offset().top
			}, 700, 'easeInOutExpo', function () {
				window.location.hash = hash;
			});


			if (navToggler.is(':visible')) {
				navToggler.click();
			}
		});
		$('body').on('activate.bs.scrollspy', function () {
			console.log('nice');
		})



	};
	OnePageNav();









})(jQuery);






$(document).ready(function () {
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			$('#scroll').fadeIn();
		} else {
			$('#scroll').fadeOut();
		}
	});
	$('#scroll').click(function () {
		$("html, body").animate({ scrollTop: 0 }, 600);
		return false;
	});
});






var carouselContainer = jQuery('.carousel');
var slideInterval = 500;
/*new */
function active_course() {
  
      $("#active_course").owlCarousel({
        loop: true,
        margin: 20,
        items: 3,
        nav: true,
        autoplay: 2500,
        smartSpeed: 1500,
        dots: false,
        responsiveClass: true,
        thumbs: true,
        thumbsPrerendered: true,
        navText: ["<img src='img/courses/prev.png'>", "<img src='img/courses/next.png'>"],
        responsive: {
          0: {
            items: 1,
            margin: 0
          },
          991: {
            items: 2,
            margin: 30
          },
          1200: {
            items: 4,
            margin: 20
          }
        }
      });
    }

  active_course();
  /*end*/
jQuery(document).ready(function () {

	jQuery('#advCarousel').carousel({

		interval: 10000,
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',

	});

	if (jQuery(window).width() > 480) {

		toggleCaption(); //replace function definition with call to function instead

		jQuery('#advCarousel').bind('slide.bs.carousel', function () {
			jQuery('.advr .carousel-caption').hide();

		});

		carouselContainer.on('slid.bs.carousel', function () {
			toggleCaption();
		});
	}
});

//MOVED function outside of document.ready:
function toggleCaption() {
	jQuery('.advr .carousel-caption').hide();

	var caption = carouselContainer.find('.active').find('.advr .carousel-caption');
	caption.delay(3000).fadeToggle('slow');
}

// get day date in banner

var date = new Date();
const elementDate = document.getElementById("printDate");
const elementDay = document.getElementById("printDay");
const elementTime = document.getElementById("printTime");
const listOfDays = [
  "الاحد",
  "الإثنين",
  "الثلاثاء",
  "الاربعاء",
  "الخميس",
  "الجمعة",
  "السبت "
];


function printDate() {
  var day = date.getDate();
  var month = date.getMonth();
  var year = date.getFullYear();
   
  elementDate.innerHTML = day + " - " + (month+1) + " -" + year;
}

function printDay() {
  date = new Date();
  var numberOfDay = date.getDay();
  var day = listOfDays[numberOfDay];
  elementDay.innerHTML = day;
}

function printTime() {
  date = new Date();
  var hours = date.getHours();
  var minutes = date.getMinutes();
  var seconds = date.getSeconds();

  if (seconds < 10) {
    seconds = "0" + seconds;
  }
  if (minutes < 10) {
    minutes = "0" + minutes;
  }
  if (hours > 12) {
    hours = hours - 12;
    elementTime.innerHTML = seconds + " : " + minutes + " : " + hours + "  PM ";
  } else if (hours < 12) {
    elementTime.innerHTML = seconds + " : " + minutes + " : " + hours + "  AM ";
  } else if (hours = 12) {
    elementTime.innerHTML = seconds + " : " + minutes + " : " + hours + "  PM ";
  }
}

setInterval(function() {
  printTime();
  printDate();
  printDay();
}, 1000);
//end geting date

function myFunction(imgs) {
	// Get the expanded image
	var expandImg = document.getElementById("expandedImg");
	// Get the image text
	var imgText = document.getElementById("imgtext");
	// Use the same src in the expanded image as the image being clicked on from the grid
	expandImg.src = imgs.src;
	// Use the value of the alt attribute of the clickable image as text inside the expanded image
	imgText.innerHTML = imgs.alt;
	// Show the container element (hidden with CSS)
	expandImg.parentElement.style.display = "block";
}
//=========================clender carousal ======================


// search
$(document).ready(function() {
	$('#close-btn').click(function() {
	  $('#search-overlay').fadeOut();
	  $('#search-btn').show();
	  $('.ftco-navbar-light').show();
	});
	$('#search-btn').click(function() {
	  $(this).hide();
	  $('#search-overlay').fadeIn();
	  $('.ftco-navbar-light').hide();
	});
  });




//=========================End clender carousal ======================
//=========================table chances2=================
$(document).ready(function () {
	// DataTable initialisation
	$('#example').DataTable(
		{
			"paging": false,
			"autoWidth": true,
			"footerCallback": function (row, data, start, end, display) {
				var api = this.api();
				nb_cols = api.columns().nodes().length;
				var j = 3;
				while (j < nb_cols) {
					var pageTotal = api
						.column(j, { page: 'current' })
						.data()
						.reduce(function (a, b) {
							return Number(a) + Number(b);
						}, 0);
					// Update footer
					$(api.column(j).footer()).html(pageTotal);
					j++;
				}
			}
		}
	);
});
//=========================table 2=================
$(document).ready(function () {
	// DataTable initialisation
	$('#example2').DataTable(
		{
			"paging": true,
			"pageLength":3,
			"info": false,         
			
			language: {
				paginate: {
					previous: '‹',
					next:     '›'
				},
				
				aria: {
					paginate: {
						previous: 'Previous',
						next:     'Next'
					}
				},
				sSearch:'<i class="fa fa-search fa-2x"></i>'
			},

			
			 stateSave: false,
			"autoWidth": true,
			"footerCallback": function (row, data, start, end, display) {
				var api = this.api();
				nb_cols = api.columns().nodes().length;
				var j = 3;
				while (j < nb_cols) {
					var pageTotal = api
						.column(j, { page: 'current' })
						.data()
						.reduce(function (a, b) {
							return Number(a) + Number(b);
						}, 0);
					// Update footer
					$(api.column(j).footer()).html(pageTotal);
					j++;
				}
			}
		}
	);
});




//depts actions
$(document).ready(function () {
	$('.sidebar2 a').click(function () {
		$('.sidebar2 a').removeClass("active");
		$(this).addClass("active");
	});
});
/**
 * graid question
 */
$(document).ready(function() {

	$(".questions .grad1").show();
	$("#grad2").hide();
	$("#grad3").hide();
	$("#grad4").hide();
});
function calgrid1() {

	// $("#calgrid1").click(function() {
		$(".questions .grad1").show();
		$("#grad2").hide();
		$("#grad3").hide();
		$("#grad4").hide();
	// });
}
function calgrid2() {
	// $("#calgrid2").click(function() {
		$(".questions .grad1").hide();
		$("#grad2").show();
		$("#grad3").hide();
		$("#grad4").hide();
	// });
}
function calgrid3() {
	// $("#calgrid3").click(function() {
		$(".questions .grad1").hide();
		$("#grad2").hide();
		$("#grad3").show();
		$("#grad4").hide();
	// });
}
function calgrid4() {
  
	// $("#calgrid4").click(function() {
		$(".questions .grad1").hide();
		$("#grad2").hide();
		$("#grad3").hide();
		$("#grad4").show();
	// });
}
//   });

/*
end*/
function homedept() {
	$('.home-dept').css("display", "block");
	$('.content-dept').css("display", "none");
	$('.about-dept').css("display", "none");
	$('.news-dept').css("display", "none");
}

function aboutdept() {

	$('.home-dept').css("display", "none");
	$('.content-dept').css("display", "none");
	$('.about-dept').css("display", "block");
	$('.news-dept').css("display", "none");

}
function newsdept() {
	$('.home-dept').css("display", "none");
	$('.content-dept').css("display", "none");
	$('.about-dept').css("display", "none");
	$('.news-dept').css("display", "block");
}
function contentdept() {
	$('.home-dept').css("display", "none");
	$('.content-dept').css("display", "block");
	$('.about-dept').css("display", "none");
	$('.news-dept').css("display", "none");
}

// search function 
function myFunctiondept() {
	var input, filter, ul, li, a, i;
	input = document.getElementById("mySearch-dept");
	filter = input.value.toUpperCase();
	ul = document.getElementById("myMenu2");
	li = ul.getElementsByTagName("li");
	for (i = 0; i < li.length; i++) {
		a = li[i].getElementsByTagName("a")[0];
		if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
			li[i].style.display = "";
		} else {
			li[i].style.display = "none";
		}
	}
}
//end

//make img as modal dialog

$(document).ready(function () {
	$(".various").fancybox({
		maxWidth: 600,
		maxHeight: 500,
		fitToView: false,
		width: '70%',
		height: '70%',
		padding: 0,
		autoSize: false,
		closeClick: true,
		openEffect: 'elastic',
		helpers: { overlay: { css: { 'background': 'rgba(0, 0, 0, 0.65)' } } },
		closeEffect: 'none',
		beforeLoad: function () {
			var url = $(this.element).attr("href");
			url = url.replace(new RegExp("watch\\?v=", "i"), 'v/');
			url += '?fs=1&autoplay=1';
			this.href = url
		}
	});
});
// $(".fancybox").fancybox();
$('a.fancybox').fancybox();
// $("a.lightbox2").fancybox();


$(document).ready(function () {

	$('.lightbox').fancybox({
		'type': 'iframe'
	}
	);
});




