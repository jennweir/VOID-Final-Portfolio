<?php

function register_primary_menu() {
  register_nav_menu( 'primary', 'Primary Menu' );
}
add_action( 'after_setup_theme', 'register_primary_menu' );

/*
*
* Walker for the main menu 
*
*/
function add_arrow( $output, $item, $depth, $args ){
  //Only add class to 'top level' items on the 'primary' menu.
  if('primary' == $args->theme_location && $depth === 0 ){
      if (in_array("menu-item-has-children", $item->classes)) {
          $new_output = '<div class="sub-wrap">' . 
                          $output . 
                        '<i class="nav-icon fas fa-chevron-down down-icon" aria-hidden="true"></i></div>';
          return $new_output;
      }
  }
  return $output;
}
add_filter( 'walker_nav_menu_start_el', 'add_arrow',10,4);

// Example of how to use a repeatable box

function example_repeatable_customizer($wp_customize) {
  require 'section_vars.php';  
  require_once 'controller.php';  
  
  $wp_customize->add_section($example_section, array(
    'title' => 'Example Repeaters',
  ));
  
  $wp_customize->add_setting(
    $example_repeater,
    array(
        'sanitize_callback' => 'onepress_sanitize_repeatable_data_field',
        'transport' => 'refresh',
    ) );

  $wp_customize->add_control(
      new Onepress_Customize_Repeatable_Control(
          $wp_customize,
          $example_repeater,
          array(
              'label' 		=> esc_html__('Example Q & A Repeater'),
              'description'   => '',
              'section'       => $example_section,
              'live_title_id' => 'some_quote',
              'title_format'  => esc_html__('[live_title]'), // [live_title]
              'max_item'      => 10, // Maximum item can add
              'limited_msg' 	=> wp_kses_post( __( 'Max items added' ) ),
              'fields'    => array(
                  'some_quote'  => array(
                      'title' => esc_html__('Text'),
                      'type'  =>'text',
                  ),
                  'some_image' => array(
                    'title' => esc_html__('Image'),
                    'type'  =>'media',
                ),
              ),
          )
      )
  );
}
add_action( 'customize_register', 'example_repeatable_customizer' );

//in php all variable have a $ in front of them
function project_repeater($wp_customize) {
  //if you are using variable like $project_repeater_section from section_vars.php must use below 
  require 'section_vars.php';
  require_once 'controller.php';
    $wp_customize->add_section('project_repeater_section', array(
      'title' => 'Project Repeater',
    ));
//only thing that changes is setting name (unique to your setting)
//stuff inside the array needs to be the same every time
    $wp_customize->add_setting('project_repeater_setting', array(
      'sanitize_callback' => 'onepress_sanitize_repeatable_data_field',
      'transport' => 'refresh',
    ));

    $wp_customize->add_control(
        new Onepress_Customize_Repeatable_Control(
            $wp_customize,
            //below corresponds to sunique setting name
            'project_repeater_setting',
            array(
                'label' => esc_html__('Project Repeater'),
                'description' => '',
                'section' => 'project_repeater_section',
                'live_title_id' => 'project_title',
                'title_format' => esc_html__('[live_title]'),
                'max_item' => 5,
                'limited_msg' => wp_kses_post('Max of 5 projects met'),
                // dictates which fields are customizable within the repeater
                'fields' => array(
                    'project_title' => array(
                      //title of your field
                      'title' => esc_html__('Project Title'),
                      'type' => 'text',
                    ),
                    'project_descr' => array(
                      'title' => esc_html__('Project Description'),
                      'type' => 'textarea',
                    ),
                    'project_link' => array(
                      'title' => esc_html__('Project Link'),
                      'type' => 'text',
                    ),
                    'project_img' => array(
                      'title' => esc_html__('Project Image'),
                      'type' => 'media',
                    ),
                  ),
                ),
            ));
}
add_action('customize_register', 'project_repeater');

function experience_repeater($wp_customize) {
  //if you are using variable like $project_repeater_section from section_vars.php must use below 
  require 'section_vars.php';
  require_once 'controller.php';
    $wp_customize->add_section('experience_repeater_section', array(
      'title' => 'Experience Repeater',
    ));
//only thing that changes is setting name (unique to your setting)
//stuff inside the array needs to be the same every time
    $wp_customize->add_setting('experience_repeater_setting', array(
      'sanitize_callback' => 'onepress_sanitize_repeatable_data_field',
      'transport' => 'refresh',
    ));

    $wp_customize->add_control(
        new Onepress_Customize_Repeatable_Control(
            $wp_customize,
            //below corresponds to sunique setting name
            'experience_repeater_setting',
            array(
                'label' => esc_html__('Experience Repeater'),
                'description' => '',
                'section' => 'experience_repeater_section',
                'live_title_id' => 'experience_title',
                'title_format' => esc_html__('[live_title]'),
                'max_item' => 10,
                'limited_msg' => wp_kses_post('Max of 10 experiences met'),
                // dictates which fields are customizable within the repeater
                'fields' => array(
                    'experience_title' => array(
                      //title of your field
                      'title' => esc_html__('Experience Title'),
                      'type' => 'text',
                    ),
                    'experience_descr' => array(
                      'title' => esc_html__('Experience Description'),
                      'type' => 'textarea',
                    ),
                    'experience_link' => array(
                      'title' => esc_html__('Experience Link'),
                      'type' => 'text',
                    ),
                    'experience_img' => array(
                      'title' => esc_html__('Experience Image'),
                      'type' => 'media',
                    ),
                  ),
                ),
            ));
}
add_action('customize_register', 'experience_repeater');




function home_customizer($wp_customize) {
  require 'section_vars.php';
  $wp_customize->add_section($home_section, array(
    'title' => 'Testing Home Page',
  ));

  $wp_customize->add_setting($home_top_vid, array(
    'default' => 'https://www.youtube.com/embed/A0Wyx-OOX4A',
    'sanitize_callback' => 'sanitize_text_field',
  ));

  $wp_customize->add_control($home_top_vid, array(
    'label' => 'Top Video Embed',
    'section' => $home_section,
  ));

  $wp_customize->add_setting($home_top_img);
  $wp_customize->add_control( new WP_Customize_Image_Control( 
      $wp_customize, 
      $home_top_img, 
      array(
          'label' => 'Top Image',
          'section' => $home_section
      )
  ));
  // Top Desc
  $wp_customize->add_setting($home_top_desc);
  $wp_customize->add_control($home_top_desc, array(
      'label' => 'Top Description',
      'section' => $home_section,
      'type' => 'textarea'
  ));
}
add_action( 'customize_register', 'home_customizer' );


//added a section to our wp_customize object
function portfolio_projects_customizer($wp_customize) {
  require 'section_vars.php';
  $wp_customize->add_section($project_section, array(
    'title' => 'Projects',
  ));

  //calls setting on wp_customize object
  //dont really need a default project name, just here for format
  $wp_customize->add_setting('project_title', array(
    'default' => 'Default Project Name',
  ));

  //this control above goes to this setting
  $wp_customize->add_control('project_title', array(
    'label' => 'Project Name',
    //this string project_section must be the same as the string in add_section
    'section' => 'project_section',
  ));

  //with every new field, you need a new setting and control pair
  $wp_customize->add_setting('project_description');
  $wp_customize->add_control('project_description', array(
      'label' => 'Project Description',
      'section' => 'project_section',
      //text area option makes the client part more visible
      'type' => 'textarea', 
  ));


  $wp_customize->add_setting('project_image');
  $wp_customize->add_control( new WP_Customize_Image_Control(
      $wp_customize,
      'project_image',
      array (
          'label' => 'Project Image',
          'section' => 'project_section',
      )
  ));

  $wp_customize->add_setting('project_link', array(
    'default' => 'https://www.Google.com',
  ));
  $wp_customize->add_control('project_link', array(
    'label' => 'Project Link',
    // still want this to be in the project tab
    'section' => 'project_section',
  ));
      



}
//when this action is clicked, run my function
//when customize register is accessed(customize tab), you want to run this function portfolio_projects_customizer
add_action('customize_register', "portfolio_projects_customizer");
//each field in wordpress that you want to be cusomizable needs 
//to have a corresponding control pair (add_setting and add_control)


//added a section to our wp_customize object
function location_img_customizer($wp_customize) {
  require 'section_vars.php';
  $wp_customize->add_section($About_Me_section, array(
    'title' => 'Location Image',
  ));

  $wp_customize->add_setting('location_img');
  $wp_customize->add_control( new WP_Customize_Image_Control(
      $wp_customize,
      'location_img',
      array (
          'label' => 'Location Image',
          'section' => 'About_Me_section',
      )
  ));
}
add_action( 'customize_register', 'location_img_customizer' );


function social_img2_customizer($wp_customize) {
  require 'section_vars.php';
  $wp_customize->add_section($social_media, array(
    'title' => 'Social Icon 2',
  ));

}
add_action( 'customize_register', 'social_img2_customizer' );

function social_img_customizer($wp_customize) {
  require 'section_vars.php';
  $wp_customize->add_section($social_media, array(
    'title' => 'Social Icons',
  ));



  $wp_customize->add_setting('social_img1');
  $wp_customize->add_control( new WP_Customize_Image_Control(
      $wp_customize,
      'social_img1',
      array (
          'label' => 'Social Icon 1',
          'section' => 'Social Media',
      )
      ));

  $wp_customize->add_setting('social_img2');
  $wp_customize->add_control( new WP_Customize_Image_Control(
    $wp_customize,
    'social_img2',
    array (
            'label' => 'Social Icon 2',
            'section' => 'Social Media',
      )
      ));

  $wp_customize->add_setting('social_img3');
  $wp_customize->add_control( new WP_Customize_Image_Control(
      $wp_customize,
      'social_img3',
      array (
          'label' => 'Social Icon 3',
          'section' => 'Social Media',
      )
  ));
}
add_action( 'customize_register', 'social_img_customizer' );