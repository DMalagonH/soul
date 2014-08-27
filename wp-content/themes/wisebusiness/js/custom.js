// lightbox initialize script -->

$(function() {

   $('a.lightbox').lightBox();

});



// dropdown setup 

$(document).ready(function(){ 

	$("ul.sf-menu").superfish({

		delay:       200,                             // one second delay on mouseout 

		animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation 

		speed:       'fast',                          // faster animation speed 

		autoArrows:  true,                           // disable generation of arrow mark-up 

		dropShadows: true                            // disable drop shadows 			

		}); 

});



//sliding boxes



$(document).ready(function(){

		//To switch directions up/down and left/right just place a "-" in front of the top/left attribute

		//Vertical Sliding

		$('.boxgrid.slidedown').hover(function(){

			$(".cover", this).stop().animate({top:'-260px'},{queue:false,duration:300});

		}, function() {

			$(".cover", this).stop().animate({top:'0px'},{queue:false,duration:300});

		});

		//Horizontal Sliding

		$('.boxgrid.slideright').hover(function(){

			$(".cover", this).stop().animate({left:'325px'},{queue:false,duration:300});

		}, function() {

			$(".cover", this).stop().animate({left:'0px'},{queue:false,duration:300});

		});

		//Diagnal Sliding

		$('.boxgrid.thecombo').hover(function(){

			$(".cover", this).stop().animate({top:'260px', left:'325px'},{queue:false,duration:300});

		}, function() {

			$(".cover", this).stop().animate({top:'0px', left:'0px'},{queue:false,duration:300});

		});

		//Partial Sliding (Only show some of background)

		$('.boxgrid.peek').hover(function(){

			$(".cover", this).stop().animate({top:'90px'},{queue:false,duration:160});

		}, function() {

			$(".cover", this).stop().animate({top:'0px'},{queue:false,duration:160});

		});

		//Full Caption Sliding (Hidden to Visible)

		$('.boxgrid.captionfull').hover(function(){

			$(".cover", this).stop().animate({top:'180px'},{queue:false,duration:160});

		}, function() {

			$(".cover", this).stop().animate({top:'250px'},{queue:false,duration:160});

		});

		//Caption Sliding (Partially Hidden to Visible)

		$('.boxgrid.caption').hover(function(){

			$(".cover", this).stop().animate({top:'180px'},{queue:false,duration:160});

		}, function() {

			$(".cover", this).stop().animate({top:'250px'},{queue:false,duration:160});

		});

	});

