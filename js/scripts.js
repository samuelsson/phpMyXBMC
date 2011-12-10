/*
 *		JavaScripts
 */


/* ==|== Container Height =======================================================================
	This scripts makes content, sidebar-left and sidebar-right always the same height.
   ============================================================================================== */

$(window).load( function() {  			
	
	if ( 
		$("#container").height() < ( $("body").height() - ($("header").height() + $("footer").height()) )
		) {
		$("#sidebar-left").height( $("body").height() - ( $("header").height() + $("footer").height() ));
		$("#sidebar-right").height( $("body").height() - ( $("header").height() + $("footer").height() ));
		$("#content").height( $("body").height() - ( $("header").height() + $("footer").height() ) - 40 );
		// The number after the operator is for padding (both top and bottom) and for borders
	}
	
	else  {
		$("#sidebar-left").height( $("#container").height() );
		$("#sidebar-right").height( $("#container").height() );
		$("#content").height( $("#container").height() - 40 );
		// The number after the operator is for compensating for padding (both top and bottom) and for borders of header and footer
	}
	
});