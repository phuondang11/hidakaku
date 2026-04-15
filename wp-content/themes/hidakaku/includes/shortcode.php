<?php
/* Template directory */
add_shortcode('tmpurl', 'shortcode_tmpurl');
function shortcode_tmpurl() {
	return get_bloginfo('template_url');
}

/* Site directory */
add_shortcode('siteurl', 'shortcode_siteurl');
function shortcode_siteurl() {
	return get_bloginfo('url');
}



// add video for wordpress 
add_shortcode( 'video', 'shortcode_video' );
function shortcode_video() {
	$video = '<video controls poster="'.get_bloginfo('template_url').'/images/recruit_poster.jpg">
	<source src="'.get_bloginfo('template_url').'/video/recruit_vid1.webm" type="video/webm">
	</video>';
  return $video;
}
?>