<?php

/**
 * Resume kit Theme Customizer
 *
 * @package Resume kit
 */

function resume_kit_lite_customize_register($wp_customize)
{


    $wp_customize->add_setting('resume_kit_lite_intro_show', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'default'       =>  '',
        'sanitize_callback' => 'absint',
        'transport'     => 'refresh',
    ));
    $wp_customize->add_control('resume_kit_lite_intro_show', array(
        'label'      => __('Show Intro Section? ', 'resume-kit'),
        'section'    => 'resume_kit_intro',
        'settings'   => 'resume_kit_lite_intro_show',
        'type'       => 'checkbox',

    ));
}
add_action('customize_register', 'resume_kit_lite_customize_register');
