<?php

/**
 * Resume kit Theme Customizer
 *
 * @package Resume kit
 */



/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function resume_kit_customize_register($wp_customize)
{

    $resume_kit_theme = wp_get_theme();
    $resume_kit_theme_slug = $resume_kit_theme->get('TextDomain');
    if ($resume_kit_theme_slug == 'resume-kit') {
        $default_blog_style = 'grid';
    } else {
        $default_blog_style = 'classic';
    }

    $wp_customize->get_setting('blogname')->transport         = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    //select sanitization function
    function resume_kit_sanitize_select($input, $setting)
    {
        $input = sanitize_key($input);
        $choices = $setting->manager->get_control($setting->id)->choices;
        return (array_key_exists($input, $choices) ? $input : $setting->default);
    }
    function resume_kit_sanitize_image($file, $setting)
    {
        $mimes = array(
            'jpg|jpeg|jpe' => 'image/jpeg',
            'gif'          => 'image/gif',
            'png'          => 'image/png',
            'bmp'          => 'image/bmp',
            'tif|tiff'     => 'image/tiff',
            'ico'          => 'image/x-icon'
        );
        //check file type from file name
        $file_ext = wp_check_filetype($file, $mimes);
        //if file has a valid mime type return it, otherwise return default
        return ($file_ext['ext'] ? $file : $setting->default);
    }

    $wp_customize->add_setting('resume_kit_site_tagline_show', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'default'       =>  '',
        'sanitize_callback' => 'absint',
        'transport'     => 'refresh',
    ));
    $wp_customize->add_control('resume_kit_site_tagline_show', array(
        'label'      => __('Hide Site Tagline Only? ', 'resume-kit'),
        'section'    => 'title_tagline',
        'settings'   => 'resume_kit_site_tagline_show',
        'type'       => 'checkbox',

    ));

    $wp_customize->add_panel('resume_kit_settings', array(
        'priority'       => 50,
        'title'          => __('Resume kit Theme settings', 'resume-kit'),
        'description'    => __('All Resume kit theme settings', 'resume-kit'),
    ));
    $wp_customize->add_section('resume_kit_header', array(
        'title' => __('Resume kit Header Settings', 'resume-kit'),
        'capability'     => 'edit_theme_options',
        'description'     => __('Resume kit theme header settings', 'resume-kit'),
        'panel'    => 'resume_kit_settings',

    ));
    $wp_customize->add_setting('resume_kit_main_menu_style', array(
        'default'        => 'style1',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'resume_kit_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('resume_kit_main_menu_style', array(
        'label'      => __('Main Menu Style', 'resume-kit'),
        'description' => __('You can set the menu style one or two. ', 'resume-kit'),
        'section'    => 'resume_kit_header',
        'settings'   => 'resume_kit_main_menu_style',
        'type'       => 'select',
        'choices'    => array(
            'style1' => __('Style One', 'resume-kit'),
            'style2' => __('Style Two', 'resume-kit'),
        ),
    ));

    //Resume Kit Home intro
    $wp_customize->add_section('resume_kit_intro', array(
        'title' => __('Portfolio Intro Settings', 'resume-kit'),
        'capability'     => 'edit_theme_options',
        'description'     => __('Portfoli profile Intro Settings', 'resume-kit'),
        'panel'    => 'resume_kit_settings',

    ));
    $wp_customize->add_setting('resume_kit_intro_img', array(
        'capability'        => 'edit_theme_options',
        'default'           => get_template_directory_uri() . '/assets/img/intro-profile.png',
        'sanitize_callback' => 'resume_kit_sanitize_image',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'resume_kit_intro_img',
        array(
            'label'    => __('Upload Profile Image', 'resume-kit'),
            'description'    => __('Image size should be 450px width & 460px height for better view.', 'resume-kit'),
            'section'  => 'resume_kit_intro',
            'settings' => 'resume_kit_intro_img',
        )
    ));
    $wp_customize->add_setting('resume_kit_intro_subtitle', array(
        'default' => __('Do you have a any project?', 'resume-kit'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('resume_kit_intro_subtitle', array(
        'label'      => __('Intro Subtitle', 'resume-kit'),
        'section'    => 'resume_kit_intro',
        'settings'   => 'resume_kit_intro_subtitle',
        'type'       => 'text',
    ));
    $wp_customize->add_setting('resume_kit_intro_title', array(
        'default' => __('Hi, I\'m Jone Doe', 'resume-kit'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('resume_kit_intro_title', array(
        'label'      => __('Intro Title', 'resume-kit'),
        'section'    => 'resume_kit_intro',
        'settings'   => 'resume_kit_intro_title',
        'type'       => 'text',
    ));
    $wp_customize->add_setting('resume_kit_intro_designation', array(
        'default' => __('a UX / UI Designer', 'resume-kit'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('resume_kit_intro_designation', array(
        'label'      => __('Designation', 'resume-kit'),
        'section'    => 'resume_kit_intro',
        'settings'   => 'resume_kit_intro_designation',
        'type'       => 'text',
    ));
    $wp_customize->add_setting('resume_kit_intro_desc', array(
        'default' => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'wp_kses_post',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('resume_kit_intro_desc', array(
        'label'      => __('Intro Description', 'resume-kit'),
        'section'    => 'resume_kit_intro',
        'settings'   => 'resume_kit_intro_desc',
        'type'       => 'textarea',
    ));
    $wp_customize->add_setting('resume_kit_btn_text_one', array(
        'default' => __('Let`s Talk', 'resume-kit'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('resume_kit_btn_text_one', array(
        'label'      => __('Button one text', 'resume-kit'),
        'section'    => 'resume_kit_intro',
        'settings'   => 'resume_kit_btn_text_one',
        'type'       => 'text',
    ));

    $wp_customize->add_setting('resume_kit_btn_url_one', array(
        'default' => '#',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('resume_kit_btn_url_one', array(
        'label'      => __('Intro Link', 'resume-kit'),
        'description'      => __('Keep url empty for hide this link', 'resume-kit'),
        'section'    => 'resume_kit_intro',
        'settings'   => 'resume_kit_btn_url_one',
        'type'       => 'url',
    ));


    //Resume Kit blog settings
    $wp_customize->add_section('resume_kit_blog', array(
        'title' => __('Resume kit Blog Settings', 'resume-kit'),
        'capability'     => 'edit_theme_options',
        'description'     => __('Resume kit theme blog settings', 'resume-kit'),
        'panel'    => 'resume_kit_settings',

    ));
    $wp_customize->add_setting('resume_kit_blog_container', array(
        'default'        => 'container',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'resume_kit_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('resume_kit_blog_container', array(
        'label'      => __('Container type', 'resume-kit'),
        'description' => __('You can set standard container or full width container. ', 'resume-kit'),
        'section'    => 'resume_kit_blog',
        'settings'   => 'resume_kit_blog_container',
        'type'       => 'select',
        'choices'    => array(
            'container' => __('Standard Container', 'resume-kit'),
            'container-fluid' => __('Full width Container', 'resume-kit'),
        ),
    ));
    $wp_customize->add_setting('resume_kit_blog_layout', array(
        'default'        => 'fullwidth',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'resume_kit_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('resume_kit_blog_layout', array(
        'label'      => __('Select Blog Layout', 'resume-kit'),
        'description' => __('Right and Left sidebar only show when sidebar widget is available. ', 'resume-kit'),
        'section'    => 'resume_kit_blog',
        'settings'   => 'resume_kit_blog_layout',
        'type'       => 'select',
        'choices'    => array(
            'rightside' => __('Right Sidebar', 'resume-kit'),
            'leftside' => __('Left Sidebar', 'resume-kit'),
            'fullwidth' => __('No Sidebar', 'resume-kit'),
        ),
    ));
    $wp_customize->add_setting('resume_kit_blog_style', array(
        'default'        => $default_blog_style,
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'resume_kit_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('resume_kit_blog_style', array(
        'label'      => __('Select Blog Style', 'resume-kit'),
        'section'    => 'resume_kit_blog',
        'settings'   => 'resume_kit_blog_style',
        'type'       => 'select',
        'choices'    => array(
            'grid' => __('Grid Style', 'resume-kit'),
            'classic' => __('Classic Style', 'resume-kit'),
        ),
    ));
    //Resume Kit page settings
    $wp_customize->add_section('resume_kit_page', array(
        'title' => __('Resume kit Page Settings', 'resume-kit'),
        'capability'     => 'edit_theme_options',
        'description'     => __('Resume kit theme blog settings', 'resume-kit'),
        'panel'    => 'resume_kit_settings',

    ));
    $wp_customize->add_setting('resume_kit_page_container', array(
        'default'        => 'container',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'resume_kit_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('resume_kit_page_container', array(
        'label'      => __('Page Container type', 'resume-kit'),
        'description' => __('You can set standard container or full width container for page. ', 'resume-kit'),
        'section'    => 'resume_kit_page',
        'settings'   => 'resume_kit_page_container',
        'type'       => 'select',
        'choices'    => array(
            'container' => __('Standard Container', 'resume-kit'),
            'container-fluid' => __('Full width Container', 'resume-kit'),
        ),
    ));
    $wp_customize->add_setting('resume_kit_page_header', array(
        'default'        => 'show',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'resume_kit_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('resume_kit_page_header', array(
        'label'      => __('Show Page header', 'resume-kit'),
        'section'    => 'resume_kit_page',
        'settings'   => 'resume_kit_page_header',
        'type'       => 'select',
        'choices'    => array(
            'show' => __('Show all pages', 'resume-kit'),
            'hide-home' => __('Hide Only Front Page', 'resume-kit'),
            'hide' => __('Hide All Pages', 'resume-kit'),
        ),
    ));




    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial(
            'blogname',
            array(
                'selector'        => '.site-title a',
                'render_callback' => 'resume_kit_customize_partial_blogname',
            )
        );
        $wp_customize->selective_refresh->add_partial(
            'blogdescription',
            array(
                'selector'        => '.site-description',
                'render_callback' => 'resume_kit_customize_partial_blogdescription',
            )
        );
        $wp_customize->selective_refresh->add_partial(
            'resume_kit_intro_title',
            array(
                'selector'        => '.home-all-content h1',
                'render_callback' => function () {
                    get_theme_mod('resume_kit_intro_title');
                },
            )
        );
    }
}
add_action('customize_register', 'resume_kit_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function resume_kit_customize_partial_blogname()
{
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function resume_kit_customize_partial_blogdescription()
{
    bloginfo('description');
}

function resume_kit_intro_title_render()
{
    get_theme_mod('resume_kit_intro_title');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function resume_kit_customize_preview_js()
{
    wp_enqueue_script('resume-kit-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('customize-preview'), RESEME_KIT_VERSION, true);
}
add_action('customize_preview_init', 'resume_kit_customize_preview_js');
