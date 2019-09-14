<?php
 get_header();?>
 <!-- site-content -->
 <div class="site-content clearfix">
 <?php if(have_posts()):
    while(have_posts()): the_post();
     the_content();   
     endwhile;
  else:
    echo '<p>No Content Found</p>';
  endif;?>
  <!-- home-column -->
  <div class="home-column clearfix">
   <!-- column1 -->
   <div class="column1">
   	<h2>Latest Opinion</h2>
   <?php 
   //opinion posts loop begin here 
   $opinionPosts = new WP_Query('cat=5&posts_per_page=2');
    if( $opinionPosts->have_posts()):
    while($opinionPosts->have_posts()): $opinionPosts->the_post();?>
         <article class="post <?php if ( has_post_thumbnail() ) { ?>has-thumbnail <?php } ?>">
   <!-- post-thumbnail -->
   <div class="post-thumbnail">  
    <a href="<?php the_permalink();?>"> <?php the_post_thumbnail('small-thumbnail');?> </a>
   </div>
   <!-- /post-thumbnail -->
         <h3><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a><span class="home-time clearfix"> <?php the_time('d/j/Y');?></span></h3>
         <?php the_excerpt(); ?></article>         
    <?php endwhile;
    else:
      echo '<p>No Content Found</p>';
    endif;
    wp_reset_postdata();?>
    <span class="horiz-center"><a href="<?php echo get_category_link(5); ?>" class="btn-a">View all Opinion Posts</a></span>
   </div><!-- /column1 -->
   <!-- column2 -->
   <div class="column2">
   	<h2>Latest News</h2>
   	<?php
     //news posts loop begin here 
  $newsPosts = new WP_Query('cat=6&posts_per_page=2');
    if( $newsPosts->have_posts()):
    while($newsPosts->have_posts()): $newsPosts->the_post();?>
      <article class="post <?php if ( has_post_thumbnail() ) { ?>has-thumbnail <?php } ?>">
   <!-- post-thumbnail -->
   <div class="post-thumbnail">  
    <a href="<?php the_permalink();?>"> <?php the_post_thumbnail('small-thumbnail');?> </a>
   </div>
   <!-- /post-thumbnail -->
         <h3><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a><span class="home-time clearfix"> <?php the_time('d/j/Y');?></span></h3>
         <?php the_excerpt(); ?></article>
    <?php endwhile;
    else:
      echo '<p>No Content Found</p>';
    endif;
    wp_reset_postdata();?>
    <span class="horiz-center"><a href="<?php echo get_category_link(6); ?>" class="btn-a">View all News Posts</a></span>
    </div><!-- /column2 -->
    </div><!-- /home-column -->
   </div><!-- /site-content -->
 <?php get_footer();
?>