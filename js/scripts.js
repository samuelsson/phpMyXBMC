/*
 *		JavaScripts
 */


/* ==|== Container Height =======================================================================
	This scripts makes content, sidebar-left and sidebar-right always the same height.
   ============================================================================================== */

$(window).load( function() {  			
	
	if ( 
		($("#container").height() - 2 ) < ( $("body").height() - ($("header").height() + $("footer").height()) )
		// The number after the container height is for compensating the border of header and footer
		) {
		$("#sidebar-left").height( $("body").height() - ( $("header").height() + $("footer").height() ) - 4 );
		$("#sidebar-right").height( $("body").height() - ( $("header").height() + $("footer").height() ) - 4 );
		$("#content").height( $("body").height() - ( $("header").height() + $("footer").height() ) - 44 );
		// The number after the operator is for padding (both top and bottom) and for borders
	}
	
	else  {
		$("#sidebar-left").height( $("#container").height() - 2 );
		$("#sidebar-right").height( $("#container").height() - 2 );
		$("#content").height( $("#container").height() - 42 );
		// The number after the operator is for compensating for padding (both top and bottom) and for borders of header and footer
	}
	
});