<?php 
  get_header(); ?>

<div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>)"></div>
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title">Past Events</Past></h1>
    <div class="page-banner__intro">
      <p>
        A recap of events held previsouly from today
      </p>
    </div>
  </div>
</div>
<div class="container container--narrow page-section">
  <?php 
  $today = date('Ymd');
  $pastEvents = new WP_Query(array(
    'paged' => get_query_var('paged', 1), // get the page number from the URL; if there is none, revert back to page 1
    'post_type' => 'event',
    'meta_key' => 'event_date',
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
    // filter for past events
    'meta_query' => array(
      array(
        'key' => 'event_date',
        'compare' => '<', // set filter here
        'value' => $today,
        'type' => 'numeric'
      )
    )
  ));
    while($pastEvents->have_posts()) {
      $pastEvents->the_post(); ?>
        <div class="event-summary">
          <!-- date badge -->
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
            <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title();  ?></a></h5>
            <p><?php echo wp_trim_words(get_the_content(), 18) ?><a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a></p>
          </div>
        </div>
    
  <?php }
  echo paginate_links(array(
    'total' => $pastEvents->max_num_pages
  ));  
  ?>
</div> 
<?php
  get_footer();
?>