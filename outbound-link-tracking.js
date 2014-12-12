(function( $ ) { 
	$( document ).on( 'ready', function() {
		outbound_links();
		
		// after jQuery ajax requests
		$( document ).ajaxComplete(function() {
	    	setTimeout( outbound_links, 3000 );
		});
		
		// track outbound links
		$( document ).on( 'click', '.external-link', function( e ) {
			var _gaq = _gaq || [];
			_gaq.push( [ '_trackEvent', 'Outbound Link', this.href ] ); 
		});
	});
	
	function outbound_links() {
		$( 'a' ).not( '.no-track, .internal' ).filter(function() {
			return this.hostname && this.hostname !== location.hostname;
		}).attr( 'target', '_blank' ).addClass( 'external-link' );
	}
})( jQuery );