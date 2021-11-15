<?php
// this folder contains plugins that must alwyas get loaded, no matter the template
// this is a custom post type named 'event' it will regiater labels and also imply an archive
// create Event type and apply a dishicon; this will be visible on admin page on the left side bar
function university_post_types() {
  register_post_type('event', array(
    'show_in_rest' => true, // display in the new editor not the classic
    'supports' => array('title', 'editor', 'excerpt', 'custom-fields'),  // if 'editor' is not included then fallback to classic editor; allow these groups in the admin editor
    'rewrite' => array('slug' => 'events'), // change name of slugs to plural
    'has_archive' => true, // has it's own archive, not the generic posts archive
    'public' => true,
    'labels' => array(
      'name' => 'Events', // this label appears in the left col menu
      'show_in_rest' => true,  // will use the modern block editor; otherwise default is classic,
      'add_new_item' => 'Add New Event', // when adding new item in admin the proper label will come up
      'edit_item' => 'Edit Event',  // same as above for edit
      'all_items' => 'All Events', // add 'all' to the display in admin menu
      'singular_name' => 'Event'
    ),
    'menu_icon' => 'dashicons-calendar' // icon in left edit col of admin
  ));

  // program post type
  register_post_type('program', array(
    'show_in_rest' => true, // display in the new editor not the classic
    'supports' => array('title', 'editor'),  // if 'editor' is not included then fallback to classic editor; allow these groups in the admin editor
    'rewrite' => array('slug' => 'programs'), // change name of slugs to plural
    'has_archive' => true, // has it's own archive, not the generic posts archive
    'public' => true,
    'labels' => array(
      'name' => 'Programs', // this label appears in the left col menu
      'show_in_rest' => true,  // will use the modern block editor; otherwise default is classic,
      'add_new_item' => 'Add New Program', // when adding new item in admin the proper label will come up
      'edit_item' => 'Edit Program',  // same as above for edit
      'all_items' => 'All Programs', // add 'all' to the display in admin menu
      'singular_name' => 'Program'
    ),
    'menu_icon' => 'dashicons-awards' // icon in left edit col of admin
  ));
}
add_action('init', 'university_post_types');  // hook onto event 'init' and create new type, defined above
// the events were added in the mu-plugins (must use plugins) folder, because they would go away on theme change.

?>