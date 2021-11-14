<?php
  get_header();
// same loop but removed <a> </a>
while (have_posts()) {
  the_post(); ?>
  <div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>)"></div>
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title"><?php the_title() ?></h1>
    <div class="page-banner__intro">
      <p>
        Don't forget to replace me later.
      </p>
    </div>
  </div>
</div>
<div class="container container--narrow page-section">   
  <div class="metabox metabox--position-up metabox--with-home-link">
    <p><a class="metabox__blog-home-link" href="<?php echo site_url('/blog');?>">
      <i class="fa fa-home" aria-hidden="true"></i>
      Blog Home </a>
      <span class="metabox__main">Posted By <?php the_author_posts_link(); echo " on "; the_time('n.j.Y'); echo " in "; echo get_the_category_list(', '); ?></span>
    </p>
  </div><!-- close metabox -->

  <div class="generic-content">
    <?php the_content(); ?>
  </div><!-- close generic content -->
</div><!-- close container -->  
<?php 
} // closing while loop
get_footer();
?>