$(document).ready(function () {
    $(window).scroll(function () {
        // sticky navbar on scroll script
        if (this.scrollY > 20) {

            $('.navbar').addClass("sticky");
        } else {
            $('.navbar').removeClass("sticky");
        }

        // scroll-up button show/hide script
        if (this.scrollY > 500) {
            $('.scroll-up-btn').addClass("show");
        } else {
            $('.scroll-up-btn').removeClass("show");
        }
    });

    // slide-up script
    $('.scroll-up-btn').click(function () {
        $('html').animate({
            scrollTop: 0
        });
        // removing smooth scroll on slide-up button click
        $('html').css("scrollBehavior", "auto");
    });

    $('.navbar .menu li a').click(function () {
        // applying again smooth scroll on menu items click
        $('html').css("scrollBehavior", "smooth");
    });

    // toggle menu/navbar script
    $('.menu-btn').click(function () {
        $('.navbar .menu').toggleClass("active");
        $('.menu-btn i').toggleClass("active");
    });
});


/**
 * Easy selector helper function
 */
const select = (el, all = false) => {
    el = el.trim()
    if (all) {
        return $(el)
    } else {
        return $(el)[0]
    }
}

/**
 * Easy event listener function
 */
const on = (type, el, listener, all = false) => {
    let selectEl = select(el, all)
    if (selectEl) {
        if (all) {
            selectEl.each(function () {
                $(this).on(type, listener)
            })
        } else {
            $(selectEl).on(type, listener)
        }
    }
}

/**
 * Easy on scroll event listener
 */
const onscroll = (el, listener) => {
    $(el).on('scroll', listener)
}

/**
 * Scroll with ofset on page load with hash links in the url
 */
$(window).on('load', function () {
    if (window.location.hash) {
        if (select(window.location.hash)) {
            scrollto(window.location.hash)
        }
    }
});

/**
 * Navbar links active state on scroll
 */
let navbarlinks = select('.navbar .menu .menu-btn', true)
const navbarlinksActive = () => {
    let position = window.scrollY + 200
    navbarlinks.each(function () {
        if (!$(this).attr('href')) return
        let section = select($(this).attr('href'))
        if (!section) return
        if (position >= section.offsetTop && position <= (section.offsetTop + section
                .offsetHeight)) {
            $(this).addClass('active')
        } else {
            $(this).removeClass('active')
        }
    })
}
$(document).ready(navbarlinksActive)
onscroll(document, navbarlinksActive)