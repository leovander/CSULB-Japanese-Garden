/**
 * Created by Kun Wei
 * Context: JavaScript for Video-tour page
 * Team members: Beau Squires, Israel Torres, Gyngai Ung, Kun Wei
 * Author #1: Kun Wei
 * Date: 2014/5/11
 */

jQuery(document).ready(function () {
	$('.main-sections').addClass('tab'); // hide all main sections
	$('#hill-pond').addClass('active-section'); // set the first section as active to display
	
	// highlight the first link of top and side navigations
	$('#top-pagination').find('a[href="#hill-pond"]').css('border-bottom', '3px solid #ff5600');
	$('#side-pagination').find('a[href="#hill-pond"]').css('border-bottom', '3px solid #ff5600');
	
	var tempElementID;
	
	// manage the behaviours after click on top and side navigations
	$('.tab-link').click(function(e) {
		e.preventDefault(); // overwrite link default action 
		
		// pause current playing video when click to other video links
		$('.tour-videos').each(function(index, element) {
    		element.pause();
    		if(index == 7) return false;
		});
		
		$('.active-section').removeClass('active-section'); // remove active section
		$('.main-sections').addClass('tab'); // hide all main sections
		// set new active section
		var elementID;
		elementID = $(this).attr('href');
		$(elementID).addClass('active-section');
		
		// remove inline style for the first link of top and side navigations
		$('#top-pagination').find('a[href="#hill-pond"]').removeAttr("style");
		$('#side-pagination').find('a[href="#hill-pond"]').removeAttr("style");
		// remove inline style for the last targeted link of top and side navigations
		$('#top-pagination').find('a[href="' + tempElementID + '"]').removeAttr("style");
		$('#side-pagination').find('a[href="' + tempElementID + '"]').removeAttr("style");
		
		// synchronize the highlighting of links on both top and side navigations
		var elementTitle;
		elementTitle = $(this).attr('title');
		if(elementTitle == null) { $('#top-pagination').find('a[href="' + elementID + '"]').css('border-bottom', '3px solid #ff5600'); }
		else { $('#side-pagination').find('a[href="' + elementID + '"]').css('border-bottom', '3px solid #ff5600'); }
		$(this).css('border-bottom', '3px solid #ff5600');
		
		tempElementID = elementID;		
	});
		
});


