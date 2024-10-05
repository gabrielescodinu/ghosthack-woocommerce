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

// aggiungi prodotti al carrello in tempo reale
jQuery(function ($) {
    // Intercetta il submit del form di aggiunta al carrello
    $('form.cart').on('submit', function (e) {
        e.preventDefault(); // Previene il ricaricamento della pagina

        var form = $(this);
        var formData = form.serialize(); // Serializza i dati del form

        $.ajax({
            url: '/?wc-ajax=add_to_cart', // URL per l'aggiunta al carrello di WooCommerce via AJAX
            type: 'POST',
            data: formData,
            success: function (response) {
                console.log('Prodotto aggiunto al carrello.');

                // Ora facciamo una richiesta AJAX per ottenere il conteggio aggiornato del carrello
                $.ajax({
                    url: '/wp-admin/admin-ajax.php?action=get_cart_count', // Endpoint personalizzato
                    type: 'GET',
                    success: function (cart_count) {
                        // Aggiorna il numero di prodotti nel carrello
                        $('.cart-contents-count').text(cart_count);
                    },
                    error: function () {
                        console.log('Errore durante il recupero del conteggio del carrello.');
                    }
                });
            },
            error: function () {
                alert("Errore durante l'aggiunta al carrello. Riprova.");
            }
        });
    });
});
