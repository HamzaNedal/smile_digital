$('.owl-carousel.owl-carousel-about').owlCarousel({
    rtl: true,
    loop: true,
    margin: 10,
    nav: false,
    autoplay: true,
    autoplayTimeout: 1000,
    autoplayHoverPause: true,
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
})

$('.owl-carousel.owl-carousel-testimonies').owlCarousel({
    rtl: true,
    loop: true,
    margin: 10,
    nav: false,
    autoplay: true,
    autoplayTimeout: 2000,
    autoplayHoverPause: true,
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
})


$('.owl-carousel.owl-carousel-clients').owlCarousel({
    rtl: true,
    loop: true,
    margin: 10,
    nav: false,
    autoplay: true,
    autoplayTimeout: 2000,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 3.5
        }
    }
})


var scroll = new SmoothScroll('a[href*="#"]');


$(window).scroll(function() {
    if ($(this).scrollTop() > 50) {
        $('#myBtn').fadeIn('slow');
    } else {
        $('#myBtn').fadeOut('slow');
    }
});
$('#myBtn').click(function() {
    $("html, body").animate({ scrollTop: 0 }, 2000);
    return false;
});



const m = document.querySelector('.hamburger-menu');
const nav = document.querySelector('.navbar-collapse.sidebar');


m.addEventListener('click', function() {
    nav.classList.toggle('change');
});