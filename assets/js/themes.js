jQuery( function( $ ) {

    /* --------------------------------------- */
    /* Sticky Navigation
    /* --------------------------------------- */
    $(".menu-sticky").sticky({topSpacing:0, zIndex: 9999});

    /* --------------------------------------- */
    /* Search
    /* --------------------------------------- */

    $('.top-search-button a').on('click', function ( e ) {
        e.preventDefault();
        $('.top-search-form').slideToggle();
    });


});
