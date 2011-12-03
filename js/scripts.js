/*
 *		JavaScripts
 */


/* ==|== Container Height =======================================================================
	This scripts makes content, sidebar-left and sidebar-rigt always the same height.
   ============================================================================================== */

$(window).load( function() {  			
	
	if ( 
		$("#content").height() < ( $("body").height() - ($("header").height() + $("footer").height()) ) &&
		$("#sidebar-left").height() < ( $("body").height() - ($("header").height() + $("footer").height()) ) &&
		$("#sidebar-right").height() < ( $("body").height() - ($("header").height() + $("footer").height()) ) 
		) {
		$("#content").height( ( $("body").height() - ( $("header").height() + $("footer").height() ) - "4" ) - "40" );
		$("#sidebar-left").height( ( $("body").height() - ( $("header").height() + $("footer").height() ) - "4" ) - "40" );
		$("#sidebar-right").height( ( $("body").height() - ( $("header").height() + $("footer").height() ) - "4" ) - "40" );
	}
	
	else if (
		$("#content").height() > $("#sidebar-left").height() &&
		$("#content").height() > $("#sidebar-right").height()
		) {
		$("#sidebar-left").height( $("#content").height() );
		$("#sidebar-right").height( $("#content").height() );
	}
	
	else if (
		$("#sidebar-left").height() > $("#content").height() &&
		$("#sidebar-left").height() > $("#sidebar-right").height()
		) {
		$("#content").height( $("#sidebar-left").height() );
		$("#sidebar-right").height( $("#sidebar-left").height() );
	}
	
	else if (
		$("#sidebar-right").height() > $("#content").height() &&
		$("#sidebar-right").height() > $("#sidebar-left").height()
		) {
		$("#content").height( $("#sidebar-right").height() );
		$("#sidebar-left").height( $("#sidebar-right").height() );
	}
	
	else if (
		$("#sidebar-right").height() > $("#content").height() ||
		$("#sidebar-left").height() > $("#sidebar-left").height()
		) {
		$("#content").height( $("#sidebar-right").height() );
	}
	
	else if (
		$("#content").height() > $("#sidebar-right").height() &&
		$("#sidebar-left").height() > $("#sidebar-right").height()
		) {
		$("#sidebar-right").height( $("#content").height() );
	}
	
	else if (
		$("#content").height() > $("#sidebar-left").height() &&
		$("#sidebar-right").height() > $("#sidebar-left").height()
		) {
		$("#sidebar-left").height( $("#content").height() );
	}
	
});