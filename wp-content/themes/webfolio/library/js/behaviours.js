jQuery.noConflict();
jQuery(document).ready(function(){


jQuery("ul.sf-menu").superfish({
		delay:       200,                             // one second delay on mouseout 
		animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation 
		speed:       'fast',                          // faster animation speed 
		autoArrows:  true,                           // disable generation of arrow mark-up 
		dropShadows: true                            // disable drop shadows 			
		}); 

/*AUDIO / VIDEO PLAYER STARTS*/
//jQuery('audio,video').mediaelementplayer();
 /*AUDIO / VIDEO PLAYER ENDS*/
	
/*ACCORDION JQUERY STARTS*/	
/********** jquery toogle function **********/
jQuery('#toggle-view li').click(function () {
	var text = jQuery(this).children('p');

	if (text.is(':hidden')) {
		text.slideDown('200');
		jQuery(this).find('.toggle-indicator').text('-');
	} else {
		text.slideUp('200');
		jQuery(this).find('.toggle-indicator').text('+');
	}
});
/*ACCORDION JQUERY ENDS*/	

/*GOOGLE MAPS STARTS*/
if ( jQuery( '#map' ).length && jQuery() ) {
var jQuerymap = jQuery('#map');
	jQuerymap.gMap({	
	address: 'Level 13, 2 Elizabeth St, Melbourne Victoria 3000 Australia',	 
	zoom: 18,
	markers: [
	{ 'address' : 'Level 13, 2 Elizabeth St, Melbourne Victoria 3000 Australia' },]	
			});
		 } 
/*GOOGLE MAPS STARTS*/

/*FIT VIDEOS STARTS*/
//jQuery(".container").fitVids();
/*FIT VIDEOS ENDS*/
	
	
/*WIDTH RESIZE*/	
 var currentWindowWidth = jQuery(window).width();
	jQuery(window).resize(function(){
		currentWindowWidth = jQuery(window).width();
	});
/*WIDTH RESIZE*/

/*PRETTY PHOTO STARTS*/
	jQuery("a[data-rel^='prettyPhoto']").prettyPhoto({
		overlay_gallery: false
	});
/*PRETTY PHOTO ENDS*/	

/*BACK TO TOP*/
jQuery(document).ready(function() { jQuery('.backtotop').click(function(){ jQuery('html, body').animate({scrollTop:0}, 'slow'); return false; }); });
/*BACK TO TOP*/

	

/*CAMERA SLIDERS STARTS*/	 
 if ( jQuery( '#camera_wrap_1' ).length && jQuery()) {
 jQuery('#camera_wrap_1').camera({
	height: '350px',
	loader: 'bar',
	pagination: false,
	thumbnails: true
 });
 }
if ( jQuery( '#camera_wrap_2' ).length && jQuery()) {
 jQuery('#camera_wrap_2').camera({
	height: '350px',
	thumbnails: true
 });
 }
/*CAMERA SLIDERS ENDS*/	  

/********** tooltip function **********/
    jQuery(".tooltip").tipTip();

  
 /*
 /* QUICKSAND PLUGIN JQUERY STARS */

  var jQueryfilterType = jQuery('#filterable li.active a').attr('class');
  var jQueryholder = jQuery('ul.portfolio-items');
  var jQuerydata = jQueryholder.clone();
	jQuery('#filterable li a').click(function(e) {
		jQuery('#filterable li').removeClass('active');
		var jQueryfilterType = jQuery(this).attr('data-type');
		jQuery(this).parent().addClass('active');
		
		if (jQueryfilterType == 'all') {
			var jQueryfilteredData = jQuerydata.find('li');
		} 
		else {
			var jQueryfilteredData = jQuerydata.find('li[data-type~="' + jQueryfilterType + '"]');
		}
		//alert(jQueryfilteredData);
		jQueryholder.quicksand(jQueryfilteredData, {
			duration: 500,
			useScaling: false,
			adjustHeight:false,
			easing: 'jswing'
		});
		return false;
	});
	  /* QUICKSAND PLUGIN JQUERY ENDS */  
});  /* JQUERY ENDS */

