<?php
function my_cpt_template_redirect()
{
  if( get_post_type() == 'websites' )
  {
    $id = get_the_id();
    $url=get_field("image_link",$id);
    if($url) {
      wp_redirect( $url );
      die;
    }else{
      $url=site_url();
      wp_redirect( $url );
      die;
    }
  }
}
add_action( 'template_redirect', 'my_cpt_template_redirect' );