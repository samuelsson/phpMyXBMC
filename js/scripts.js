/*
 *		JavaScripts
 */


/* ==|== Container Height =======================================================================
	This scripts makes content, sidebar-left and sidebar-right always the same height.
   ============================================================================================== */

$(window).load( function() {  			
	
	if ( 
		($("#container").height() - 2 ) < ( $("body").height() - ($("header").height() + $("footer").height()) )
		// The number after the container height is for compenating the border on header and footer
		) {
		$("#content").height( $("body").height() - ( $("header").height() + $("footer").height() ) - 44 );
		$("#sidebar-left").height( $("body").height() - ( $("header").height() + $("footer").height() ) - 44 );
		$("#sidebar-right").height( $("body").height() - ( $("header").height() + $("footer").height() ) - 44 );
		// The number after the operator is for padding (both top and bottom) and for borders
	}
	
	else  {
		$("#sidebar-left").height( $("#container").height() - 42 );
		$("#content").height( $("#container").height() - 42 );
		$("#sidebar-right").height( $("#container").height() - 42 );
		// The number after the operator is for compenasating for padding (both top and bottom) and for borders on header and footer
	}
	
});