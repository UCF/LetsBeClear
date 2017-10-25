/* Best Practices

function myLinkClickHandler(){...}
$("#myLink").on("click", myLinkClickHandler);

*/

function accordion(){

	if ( $(this).hasClass('open') ) {

		$(this).removeClass('open');
		$(this).children('span').text('+');
		$(this).next().slideToggle();

	} else {

		$(this).addClass('open');
		$(this).children('span').text('-');
		$(this).next().slideToggle();

	}

}

$(document).ready(function(){

	$('.hover-info').tooltip({
	    'placement': 'bottom'
	});

	$('.single-accordion h2').on('click', accordion);

	$( '.dropdown-toggle' ).bind( 'touchend click', function() {
      var hrefvalue = $( this ).attr( 'href' );

      window.location.href = hrefvalue;
    });

    var navTimers = [];
	$( ".dropdown" ).hover(
		function () {
			var id = jQuery.data( this );
			var $this = $( this );
			navTimers[id] = setTimeout( function() {
				$this.children( '.dropdown-menu' ).toggle();
				navTimers[id] = "";
			}, 0 );
		},
		function () {
			var id = jQuery.data( this );
			if ( navTimers[id] != "" ) {
				clearTimeout( navTimers[id] );
			} else {
				$( this ).children( ".dropdown-menu" ).toggle();
			}
		}
	);

	$('.call-header').click(function (e) {
        e.preventDefault();
        $('#call-modal').fadeIn();
    });

	$('.close-call-modal').click(function (e) {
        e.preventDefault();
        $('#call-modal').fadeOut();
    });

});