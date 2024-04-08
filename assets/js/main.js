// swiper slider configuration
var swiper = new Swiper('.mySwiper', {
    grabCursor: true,
    loop: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: true
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true
    }
});

// show and hide mobile menu animation
$(document).ready(function () {
    $('#hamburger').click(function () {
        $('#menu-mobile').toggleClass('-translate-x-full');

        if ($('#hamburger').html().trim() === '<span class="material-symbols-outlined scale-150">menu</span>') {
            $('#hamburger').html('<span class="material-symbols-outlined scale-150">close</span>');
        } else {
            $('#hamburger').html('<span class="material-symbols-outlined scale-150">menu</span>');
        }

        $('body').toggleClass('overflow-hidden');
    });
});

// search panel animation
$(document).ready(function () {
    $('.search-button').click(function (e) {
        e.stopPropagation();

        // show and hide search panel
        console.log('Cliccato');
        $('#search-panel').toggleClass('translate-y-full');
    });

    // close search panel if don't click search bar
    $(document).click(function (e) {
        var searchPanel = $('#search-panel');
        var inputText = $('#search-bar');

        if (!inputText.is(e.target) && searchPanel.hasClass('translate-y-full') === false) {
            searchPanel.addClass('translate-y-full');
        }
    });

    $('#search-panel #search-bar').click(function (e) {
        e.stopPropagation();
    });
});

// submenu mobile item animation
$(document).ready(function () {
    $('.dropdown-btn').click(function (e) {
        e.preventDefault();
        $(this).next('.dropdown-menu').slideToggle('fast');
        $(this).children('.dropdown-icon').toggleClass('rotate-180');
    });
});

$(document).ready(function () {
    // Mostra il bottone dopo che l'utente ha scrollato per più di 500px
    $(window).scroll(function () {
        if ($(this).scrollTop() < 300) {
            $('#back-to-top').addClass('hidden');
        } else {
            $('#back-to-top').removeClass('hidden');
        }
    });

    // Scrolla fino in alto alla pagina quando il bottone viene cliccato
    $('#back-to-top').click(function () {
        $('html, body').animate({ scrollTop: 0 }, '300');
    });
});


