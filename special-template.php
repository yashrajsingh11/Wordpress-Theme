<?php
/*
template name: Special Layout
*/
 get_header();
  if(have_posts()):
    while(have_posts()): the_post();?>
    <article class="post page">
      <h2><?php the_title();?></h2>
    <!-- info-box -->
      <div class="info-box">
       <h4>Disclaimer Title</h4>
       <p>this infirmation will be shown in an infobox on right side of the pages having special layout.</p> 
      </div>
    <!-- /info-box -->
      <?php the_content();?>
    </article>
    <?php endwhile;
  else:
    echo '<p>No Content Found</p>';
  endif;
 get_footer();
?>