<?php
global $post;
$twitter_user = '';
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );

    echo '<div class="social-icons social-round">
      <a class="btn-bg-facebook" href="http://www.facebook.com/sharer.php?u=' . urlencode(get_permalink()) . '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;">
        <i class="homey-icon homey-icon-social-media-facebook"></i>
      </a>
	  <a class="btn-bg-twitter" href="https://twitter.com/intent/tweet?text=' . urlencode(get_the_title()) . '&url=' .  urlencode(get_permalink()) . '&via=' . urlencode($twitter_user ? $twitter_user : get_bloginfo('name')) .'" onclick="if(!document.getElementById(\'td_social_networks_buttons\')){window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;}">
	    <i class="homey-icon homey-icon-social-media-twitter"></i>
	  </a>

	  <a class="btn-bg-pinterest" href="http://pinterest.com/pin/create/button/?url='. urlencode( get_permalink() ) .'&amp;media=' . (!empty($image[0]) ? $image[0] : '') . '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;">
	    <i class="homey-icon homey-icon-social-pinterest"></i>
	  </a>

	  <a class="btn-bg-linkedin" href="http://www.linkedin.com/shareArticle?mini=true&url='. urlencode( get_permalink() ) .'&title=' . urlencode( get_the_title() ) . '&source='.urlencode( home_url( '/' ) ).'" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;">
	    <i class="homey-icon homey-icon-professional-network-linkedin"></i>
	  </a>
	  </div>'; 
?>