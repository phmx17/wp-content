<?php 
function university_files() {
  wp_enqueue_script('main-university-js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, '1.0', true); // true refers to loading at the bottom section which is better for performance
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('university_main_styles', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'university_files'); // js start script u_f

// wp will generate a title tage for each page
function university_features() {
  // not using dynamic menus anymore; using static and this was just to demonstrate other way of doing things
  // register_nav_menu('headerMenuLocation', 'Header Menu Location'); // custom title and custom actual display of the title
  // register_nav_menu('footerLocationOne', 'Footer Location One'); // custom title and custom actual display of the title
  // register_nav_menu('footerLocationTwo', 'Footer Location Two'); // custom title and custom actual display of the title
  add_theme_support('title-tag');
}
add_action('after_setup_theme', 'university_features'); // hook this onto event 'after_setup_theme'
// the events were added in the mu-plugins (must use plugins) folder, because they would go away on theme change.
?>