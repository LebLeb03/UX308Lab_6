<?php
/*
*
* Home intro section for portfolix section
*
*
*/



function resume_kit_intro_section_output()
{
  $resume_kit_dfimgh = get_template_directory_uri() . '/assets/img/intro-profile.png';
  $resume_kit_intro_img = get_theme_mod('resume_kit_intro_img', $resume_kit_dfimgh);
  $resume_kit_intro_subtitle = get_theme_mod('resume_kit_intro_subtitle', __('Do you have a any project?', 'resume-kit'));
  $resume_kit_intro_title = get_theme_mod('resume_kit_intro_title', __('Hi, I\'m Jone Doe', 'resume-kit'));
  $resume_kit_intro_designation = get_theme_mod('resume_kit_intro_designation', __('a UX / UI Designer', 'resume-kit'));
  $resume_kit_intro_desc = get_theme_mod('resume_kit_intro_desc');
  $resume_kit_btn_text_one = get_theme_mod('resume_kit_btn_text_one', __('Let`s Talk', 'resume-kit'));
  $resume_kit_btn_url_one = get_theme_mod('resume_kit_btn_url_one', '#');

?>
  <!-- home -->
  <section class="home" id="home">
    <div class="container">
      <div class="home-all-content">
        <div class="row">
          <div class="col-lg-6">

            <div class="content">

              <?php if ($resume_kit_intro_title) : ?>
                <h1><?php
                    echo wp_kses(resume_kit_add_span_to_first_word($resume_kit_intro_title), array(
                      'span' => array(
                        'class' => array()
                      )
                    )); ?> <br><span id="type1"><?php echo esc_html($resume_kit_intro_designation); ?></span></h1>
              <?php endif; ?>
              <?php if ($resume_kit_intro_desc) : ?>
                <p><?php echo esc_html($resume_kit_intro_desc); ?></p>
              <?php endif; ?>
              <?php if ($resume_kit_intro_subtitle) : ?>
                <h5>
                  <?php echo esc_html($resume_kit_intro_subtitle); ?>
                  <?php if ($resume_kit_btn_url_one) : ?>
                    <a href="<?php echo esc_url($resume_kit_btn_url_one); ?>" class="btn-hero"><?php echo esc_html($resume_kit_btn_text_one); ?></a>
                  <?php endif; ?>
                </h5>
              <?php endif; ?>

            </div>

          </div>

          <div class="col-lg-6">
            <?php if ($resume_kit_intro_img) : ?>
              <div class="hero-img">
                <img src="<?php echo esc_url($resume_kit_intro_img); ?>" alt="<?php esc_attr($resume_kit_intro_title); ?>">
              <?php else : ?>
                <div class="hero-img px-noimg">
                <?php endif; ?>
                </div>

              </div>

          </div>
        </div>
      </div>
  </section>

<?php
}
add_action('resume_kit_profile_intro', 'resume_kit_intro_section_output');
