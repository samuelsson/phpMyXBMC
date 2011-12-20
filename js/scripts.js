/*
 *		JavaScripts
 */



/* ==|== Equal Height Blocks in Rows ============================================================
	by: Chris Coyier - http://css-tricks.com/8401-equal-height-blocks-in-rows/
   ============================================================================================== */

// these are (ruh-roh) globals. You could wrap in an
// immediately-Invoked Function Expression (IIFE) if you wanted to...
var currentTallest = 0,
    currentRowStart = 0,
    rowDivs = new Array();

function setConformingHeight(el, newHeight) {
	// set the height to something new, but remember the original height in case things change
	el.data("originalHeight", (el.data("originalHeight") === undefined) ? (el.height()) : (el.data("originalHeight")));
	el.height(newHeight);
}

function getOriginalHeight(el) {
	// if the height has changed, send the originalHeight
	return (el.data("originalHeight") === undefined) ? (el.height()) : (el.data("originalHeight"));
}

function columnConform() {

	// find the tallest DIV in the row, and set the heights of all of the DIVs to match it.
	$('.coverframe').each(function() {
	
		// "caching"
		var $el = $(this);
		
		var topPosition = $el.position().top;

		if (currentRowStart != topPosition) {

			// we just came to a new row.  Set all the heights on the completed row
			for(currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) setConformingHeight(rowDivs[currentDiv], currentTallest);

			// set the variables for the new row
			rowDivs.length = 0; // empty the array
			currentRowStart = topPosition;
			currentTallest = getOriginalHeight($el);
			rowDivs.push($el);

		} else {

			// another div on the current row.  Add it to the list and check if it's taller
			rowDivs.push($el);
			currentTallest = (currentTallest < getOriginalHeight($el)) ? (getOriginalHeight($el)) : (currentTallest);

		}
		// do the last row
		for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) setConformingHeight(rowDivs[currentDiv], currentTallest);

	});

}



/* ==|== Container Height =======================================================================
	This scripts makes content, sidebar-left and sidebar-right always the same height.
   ============================================================================================== */

function containerHeight() {

	if (    $("#content").height() < ( $("#wrapper").height() - ($("header").height() + $("footer").height()) )    &&
			$("#sidebar-left").height() < ( $("#wrapper").height() - ($("header").height() + $("footer").height()) )
	){
		$("#sidebar-left").height( $("#wrapper").height() - ( $("header").height() + $("footer").height() ));
	}

	else {
		// The addition after the operator is for the border in content (20px top and 20px bottom).
		$("#sidebar-left").height( $("#content").height() + 40 );
	}
}



/* ==|== Call functions =========================================================================
	These call the functions depending on the situation.
   ============================================================================================== */

$(window).load( function() {
	columnConform();
});

$(window).resize(function() {
	columnConform();
});