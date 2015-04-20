var OutboundLinkTracking = (function( window, document, $, undefined ) {
	'use strict';
	
	var app = { $links: {} };
	
	app.init = function() {
		app.parseAnchors();
		
		// initialize _gaq
		window._gaq = window._gaq || [];
		
		// run through anchors again on jQuery ajax complete
		$( document ).ajaxComplete(function() {
	    	setTimeout( app.parseAnchors, 3000 );
		});

		// run through anchors on Ext ajax complete
		if ( ( 'object' === typeof Ext ) && ( 'object' === typeof Ext.Ajax) ) {
			Ext.Ajax.on( 'requestcomplete', function( conn, response, options ) {
				if ( ! Ext.Ajax.isLoading() ) {
					setTimeout( app.parseAnchors, 3000) ;
				}
			});
		}

		// track outbound links
		$( document ).on( 'click', '.external-link', function( evt ) {
			window._gaq.push( [ '_trackEvent', 'Outbound Link', this.href ] ); 
		});
	};
	
	app.parseAnchors = function() {
		app.$links = $( 'a' ).not( '.no-track, .internal' ).filter(function() {
			return this.hostname && this.hostname !== location.hostname;
		}).attr( 'target', '_blank' ).addClass( 'external-link' );
	};
	
	$( document ).ready( app.init );
	
	return app;
	
})( window, document, jQuery );