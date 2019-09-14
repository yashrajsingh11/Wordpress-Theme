<?php
 function learningwordpress_resources(){
 wp_enqueue_style('style', get_stylesheet_uri(),array(),rand(111,9999));}
 add_action('wp_enqueue_scripts','learningwordpress_resources');?>
<?php add_theme_support('menus')?>
<?php
 //get top ancestor
function get_top_ancestor_id(){
 global $post;
 if ($post->post_parent){
  $ancestors= array_reverse(get_post_ancestors($post->ID));
   return $ancestors[0];}
  return $post->ID;}
// does page have children
function has_children(){
 global $post;
 $pages= get_pages('child_of='. $post->ID);
 return count($pages);
}
//customize excerpt word count length
function custom_excerpt_length(){
 return 50;
}
add_filter('excerpt_length', 'custom_excerpt_length');
//Theme setup
function learningWordPress_setup(){
  //navigation menus
 register_nav_menus( array(
  'primary' => __('Primary Menu'),
  'footer' => __('Footer Menu'),
)); 
  //add featured image support
  add_theme_support('post-thumbnails');
  add_image_size('small-thumbnail', 180/*width*/ ,120/*height*/ , true/*for hard crop*/);
  add_image_size('banner-image', 1050, 210, true);
  //Add post format support
  add_theme_support('post-formats', array('aside','gallery','link'));  
}
add_action('after_setup_theme' , 'learningWordPress_setup');
//add out widget location
 function ourWidgetsInit(){
     register_sidebar( array(
   'name' => 'Sidebar', 'id' => 'sidebar_1', 'before_widget' => '<div class="widget-item">', 'after_widget' => '</div>',
   'before_title' => '<h2 class="rounded">', 'after_title' => '</h2>', 
  ));
    register_sidebar( array(
   'name' => 'Footer area 1', 'id' => 'footer1', 'before_widget' => '<div>', 'after_widget' => '</div>',
   'before_title' => '<h2 class="rounded">', 'after_title' => '</h2>', 
  ));
    register_sidebar( array(
   'name' => 'Footer area 2', 'id' => 'footer2', 'before_widget' => '<div>', 'after_widget' => '</div>',
   'before_title' => '<h2 class="rounded">', 'after_title' => '</h2>', 
  ));
    register_sidebar( array(
   'name' => 'Footer area 3', 'id' => 'footer3', 'before_widget' => '<div>', 'after_widget' => '</div>',
   'before_title' => '<h2 class="rounded">', 'after_title' => '</h2>', 
  ));
    register_sidebar( array(
   'name' => 'Footer area 4', 'id' => 'footer4', 'before_widget' => '<div>', 'after_widget' => '</div>',
   'before_title' => '<h2 class="rounded">', 'after_title' => '</h2>', 
  ));
 }
 add_action('widgets_init' , 'ourWidgetsInit' );
// customize appearance options
 function learningwordpress_customize_register($wp_customize){
  $wp_customize->add_setting('lwp_link_color', array(
    'default' => '#006ec3',
    'transport' => 'refresh',
  ));
   $wp_customize->add_setting('lwp_button_color', array(
    'default' => '#006ec3',
    'transport' => 'refresh',
  ));
   $wp_customize->add_setting('lwp_btnhover_color', array(
    'default' => '#ECECEC',
    'transport' => 'refresh',
  ));
  $wp_customize->add_section('lwp_standard_colors', array(
    'title' => __('Standard Colors', 'learningwordpress'),
    'priority' => 30,
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lwp_link_color_control', array(
  'label' => __('Link Color', 'learningwordpress' ),
  'section' => 'lwp_standard_colors',
  'settings' => 'lwp_link_color',
  ) ) );
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lwp_button_color_control', array(
  'label' => __('Button Color', 'learningwordpress' ),
  'section' => 'lwp_standard_colors',
  'settings' => 'lwp_button_color',
  ) ) );
   $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lwp_button_hover_color_control', array(
  'label' => __('Hover Color', 'learningwordpress' ),
  'section' => 'lwp_standard_colors',
  'settings' => 'lwp_btnhover_color',
  ) ) );
 }
add_action('customize_register','learningwordpress_customize_register');
//output customize css
function lwp_customize_css(){ ?>
  	<style type="text/css">
      a:link,
      a:visited{
      	color: <?php echo get_theme_mod('lwp_link_color'); ?>;
      } 
     .site-header nav ul li.current-menu-item a:link,
     .site-header nav ul li.current-menu-item a:visited,
     .site-header nav ul li.current-page-ancestor a:link,
     .site-header nav ul li.current-page-ancestor a:visited{
        background-color: <?php echo get_theme_mod('lwp_link_color');?>;   
      }
    div.hd-search #searchsubmit{
        background-color: <?php echo get_theme_mod('lwp_button_color');?>;
      }
      .btn-a,
      .btn-a:link,
      .btn-a:visited {
      	 background-color: <?php echo get_theme_mod('lwp_button_color');?>;
      }
      .site-header nav ul li a:hover{
         background-color: <?php echo get_theme_mod('lwp_btnhover_color');?>;
      }
      .btn-a:hover {
		 background-color: <?php echo get_theme_mod('lwp_btnhover_color');?>;
	  }
    </style>
<?php }
add_action('wp_head', 'lwp_customize_css');
?>