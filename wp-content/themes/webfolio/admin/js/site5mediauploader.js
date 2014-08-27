//PORTFOLIO BUTTON
jQuery(document).ready(function() {

jQuery('#webfoliop_pitembutton').click(function() {
window.send_to_editor = function(html) {
 imgurl = jQuery('img',html).attr('src');
 jQuery('#webfoliop_pitemlink').val(imgurl);
 jQuery('#webfoliop_pitemlink_img').attr('src',imgurl);
 tb_remove();
}


tb_show('', 'media-upload.php?post_ID=1&amp;type=image&amp;TB_iframe=true');
 return false;
});
});


//FEATURED BUTTON
jQuery(document).ready(function() {

jQuery('#webfoliof_fitembutton').click(function() {
window.send_to_editor = function(html) {
 imgurl = jQuery('img',html).attr('src');
 jQuery('#webfoliof_slideimage_src').val(imgurl);
 jQuery('#webfoliof_slideimage_src_img').attr('src',imgurl);
 tb_remove();
}


tb_show('', 'media-upload.php?post_ID=1&amp;type=image&amp;TB_iframe=true');
 return false;
});
});

//PAGE HEADER IMAGE BUTTON
jQuery(document).ready(function() {

	jQuery('#webfoliopd_phitembutton').click(function() {
		window.send_to_editor = function(html) {
		 imgurl = jQuery('img',html).attr('src');
		 jQuery('#webfoliopd_phitemlink').val(imgurl);
		 jQuery('#webfoliopd_phitemlink_img').attr('src',imgurl);
		 tb_remove();
		}


		tb_show('', 'media-upload.php?post_ID=1&amp;type=image&amp;TB_iframe=true');
		return false;
	});

	jQuery('.webfoliopd_remove_image').click(function() {
		jQuery('#webfoliopd_phitemlink').val('');
		jQuery('#webfoliopd_phitemlink_img').slideUp();
		//jQuery('#webfoliopd_phitemlink_img').attr('src','');
	});
});