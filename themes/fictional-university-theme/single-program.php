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
<!-- bread crumbs metabox --> 
  <div class="metabox metabox--position-up metabox--with-home-link">
    <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('program'); ?>">
      <i class="fa fa-home" aria-hidden="true"></i>
      All Programs </a>
      <span class="metabox__main"><?php the_title(); ?></span>
    </p>
  </div><!-- close metabox -->

  <div class="generic-content">
    <?php 
      the_content(); // display the content of the program first
    // custom Events Query; search for the most rapidly upcoming events
      $today = date('Ymd');
      $homePageEvents = new WP_Query(array(
        'posts_per_page' => 2,
        'post_type' => 'event',
        'meta_key' => 'event_date',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
        'meta_query' => array(  // meta query for filtering events
          array(
            'key' => 'event_date',
            'compare' => '>=',  // applied filter
            'value' => $today,
            'type' => 'numeric'
          ),
          array(  // this will search for events related to the current program
            'key' => 'related_programs', // check array of related_programs, look inside custom field...
            'compare' => 'LIKE', // and see if the content of that custom field....
            'value' => '"' . get_the_ID() . '"' // matches the ID of the current program post; the syntax is required in order to deal with serialization of the array; example "12" would not be found in "1200"
          )
        )
      ));

      if ($homePageEvents->have_posts()) {
        echo "<hr class='section-break'>";
      echo "<h4 class='headline headline--medium' >Upcoming ". get_the_title() ." events</h4>";
      // loop over the events found above
      while($homePageEvents->have_posts()) {
        $homePageEvents->the_post(); ?> 
          <div class="event-summary">
            <!-- Date Badges -->
            <a class="event-summary__date t-center" href="<?php the_permalink(); ?>">
              <span class="event-summary__month"><?php
              $eventDate = new DateTime(get_Field('event_date')); // getField() is access to custom field (date type)
              echo $eventDate->format('M'); //  echo the Month
              ?></span>
              <span class="event-summary__day"><?php                    
              echo $eventDate->format('d'); //  echo the day
              ?></span>  
            </a>
            <div class="event-summary__content">
              <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5> 
              <p><?php if(has_excerpt()) {
                echo get_the_excerpt(); // the_excerpt will use it's own formatting and look ugly
              } else {
                echo wp_trim_words(get_the_content(), 18);
              }?>
              <a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a></p>
            </div>
          </div>
      <?php }} ?>
      
    
  </div><!-- close generic content -->
</div><!-- close container -->  
<?php 
} // closing while loop
get_footer(); // display footer block
?>