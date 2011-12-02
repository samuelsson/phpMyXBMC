/*
 *		JavaScripts
 */


//	Same height for container divs
$(window).load( function() {  			
	
	if ( $("#content").height() < ( $("body").height() - ( $("header").height() + $("footer").height() ) ) ) {
		$("#content").height( ( $("body").height() - ( $("header").height() + $("footer").height() ) ) );
		$("#sidebar-left").height( $("#content").height() );
	}
	
	else if ( $("#sidebar-left").height() > $("#content").height() ) {
		$("#content").height( $("#sidebar-left").height() );
		$("#container").height( $("#sidebar-left").height() );
	}
	
	else if ( $("#content").height() > $("#sidebar-left").height() ) {
		$("#sidebar-left").height( $("#content").height() );
		$("#container").height( $("#content").height() );
	}
	
});