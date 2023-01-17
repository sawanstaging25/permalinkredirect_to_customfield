<?php
function my_cpt_template_redirect()
{
  if( get_post_type() == 'websites' )
  {
    $id = get_the_id();
    $url=get_field("image_link",$id);
    if($url && $url!="#") {
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
add_filter('post_type_link', function ($post_link, $post, $leavename, $sample) {
  if ($post->post_type == 'websites') {
        $id = $post->ID;
        $url=get_field("image_link",$id);
        if($url) { $post_link=$url; }else{ $post_link="javascript:void(0);"; } 
  }
  return $post_link;
}, 999, 4);



