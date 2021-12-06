<?php
get_header();
require get_template_directory() . '/inc/section_vars.php';
?>

<div class="navbar" id="namefont">Jennifer Weir</div>

<div class="navbar">
  <a class="navbar" href="#about_me_link">ABOUT ME</a>
  <a class="navbar" href="#projects_link">PROJECTS</a>
  <a class="navbar" href="#experience_link">EXPERIENCE</a>
  <a class="navbar" href="#contact_link">CONTACT</a>
</div>

<div class="flex-container">
  <body class="background">
  <img class="box-image" src="<?php echo get_theme_mod($home_top_img) ?>" alt="">
  <div class="font-location">
    <p class="font" id="hi-im"> Hi, I'm Jennifer</p>
    <p class="font">&nbsp and I'm studying Computer Science at <br> the University of Michigan</p>
  </div>
  </body>
</div>

<!-- inheritance starts with the most important in most encompassing section-format then page-font-->
<div class="section-format">
<a id="about_me_link"></a>
  <p>About Me</p>
    <div class="page-font">
        <div class="flex-container">
  <!-- the php tag below is a replacement for a file path-->
        <img class="location-image" src="<?php echo get_theme_mod('location_img') ?>" alt="">
        <p class="margin"></P>
        <p class="info-spacing">I'm from Washington Twp., MI and my projected<br> graduation is May 2024. Some of my hobbies include<br>going to hot yoga and cooking.
          As a result, I love<br>healthy eating and trying new recipes!<p>
      </div>
    </div>
</div>

<div class="section-format">
  <a id="projects_link"></a>
    <p>Projects</p>
      <div class="flex-projects">
        <?php 
    // everything we had before from repeater is stored in projects_data
          $projects_data = get_projects_data('project_repeater_setting');
          if (!empty($projects_data)) {
        //for each item in the repeater
              foreach ( $projects_data as $k => $f ) {
                  $project_img = '';
                //if image field exists
                  if ($f['project_img']) {
                  // the period . is php's way of concatenation
                    $project_img = '<img src="'.esc_url(get_media_url( $f['project_img'])).'">';
                  }
        ?>
        <div>
          <div class="page-font"><?php echo $f['project_title'] ?></div>
          <div class="descr" class="info-spacing"><?php echo $f['project_descr'] ?></div>
          <a class="descr" href="<?php echo $f['project_link'] ?>"></a>
          <div class="flex-container"><?php echo $project_img ?></div>
        </div>
        <?php 
                  }
                  }
        ?>
    </div>
</div>

<div class="section-format">
  <a id="experience_link"></a>
    <p> Experience</p>
    <?php 
      $experience_data = get_projects_data('experience_repeater_setting');
      if (!empty($experience_data)) {
        //for each item in the repeater
          foreach ( $experience_data as $k => $f ) {
              $experience_img = '';
              //if image field exists
              if ($f['experience_img']) {
                // the period . is php's way of concatenation
                $experience_img = '<img src="'.esc_url(get_media_url( $f['experience_img'])).'">';
              }
    ?>
                <div class="page-font"><?php echo $f['experience_title'] ?></div>
                <div class="descr"><?php echo $f['experience_descr'] ?></div>
            <a href="<?php echo $f['experience_link'] ?>">
              <div class="flex-container">
                <div class="experience-image"><?php echo $experience_img ?></div>
              </div>
            </a>
  <?php
              }
          }
  ?>
</div>

<!--make sure argument matches up exactly with setting in register-settings-->
<div class="section-format"><?php echo get_theme_mod('project_title') ?></div>
<div><?php echo get_theme_mod('project_description')?></div>
<!-- usually a link would go in the quotations of the href below--> 
<a href="<?php echo get_theme_mod('project_link') ?>" > <!--write things here so they show up as the hyperlink text--> </a> 

<div>
<a id="contact_link"></a>
  <iframe class="survey-form" src="https://docs.google.com/forms/d/e/1FAIpQLSe_hVKd3-PxVeALMDXSIAoRqEknoaHDaKMu1jKvdkJokgzvMw/viewform?embedded=true" >Loading…</iframe>
</div>

<hr>

<div>
  <?php get_footer(); ?>
  <footer>
    <div>
      <h6 class="social-heading">Add me on Social Media!</h6>
        <div class="flex-container">
          <div>
            <a href="http://www.linkedin.com/in/jennifer-weir-jw1127">
              <img class="location-image" src="<?php echo get_theme_mod('social_img1') ?>" alt="">
            </a>
          </div>
          <div>
            <a href="https://www.instagram.com/jenn.w27/">
              <img class="location-image" src="<?php echo get_theme_mod('social_img2') ?>" alt="">
            </a>
          </div>
          <div>
            <a href="https://www.facebook.com/jennifer.weir.714">
              <img class="location-image" src="<?php echo get_theme_mod('social_img3') ?>" alt="">
            </a>
          </div>
          <p class="space-bottom"></p>
        </div>
    </div>
  </footer>
</div>

