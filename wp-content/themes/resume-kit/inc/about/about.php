<?php

/**
 * About setup
 *
 * @package Resume Kit
 */

require_once trailingslashit(get_template_directory()) . 'inc/about/class.about.php';

if (!function_exists('resume_kit_about_setup')) :

	/**
	 * About setup.
	 *
	 * @since 1.0.0
	 */
	function resume_kit_about_setup()
	{
		$theme = wp_get_theme();
		$xtheme_name = $theme->get('Name');
		$xtheme_domain = $theme->get('TextDomain');
		if ($xtheme_domain == 'x-magazine') {
			$theme_slug = $xtheme_domain;
		} else {
			$theme_slug = 'resume-kit';
		}



		$config = array(
			// Menu name under Appearance.
			'menu_name'               => sprintf(esc_html__('%s Info', 'resume-kit'), $xtheme_name),
			// Page title.
			'page_name'               => sprintf(esc_html__('%s Info', 'resume-kit'), $xtheme_name),
			/* translators: Main welcome title */
			'welcome_title'         => sprintf(esc_html__('Welcome to %s! - Version ', 'resume-kit'), $theme['Name']),
			// Main welcome content
			// Welcome content.
			'welcome_content' => sprintf(esc_html__('%1$s is now installed and ready to use. We want to make sure you have the best experience using the theme and that is why we gathered here all the necessary information for you. Thanks for using our theme!', 'resume-kit'), $theme['Name']),

			// Tabs.
			'tabs' => array(
				'getting_started' => esc_html__('Getting Started', 'resume-kit'),
				'recommended_actions' => esc_html__('Recommended Actions', 'resume-kit'),
				'useful_plugins'  => esc_html__('Useful Plugins', 'resume-kit'),
				'free_pro'  => esc_html__('Free Vs Pro', 'resume-kit'),
			),

			// Quick links.
			'quick_links' => array(
				'xmagazine_url' => array(
					'text'   => esc_html__('UPGRADE RESUME KIT PRO', 'resume-kit'),
					'url'    => 'https://wpthemespace.com/product/resume-kit-pro/?add-to-cart=11849',
					'button' => 'danger',
				),
				'update_url' => array(
					'text'   => esc_html__('RESUME KIT PRO Video', 'resume-kit'),
					'url'    => 'https://www.youtube.com/watch?v=fVGCrbOWGz4',
					'button' => 'danger',
				),

			),

			// Getting started.
			'getting_started' => array(
				'one' => array(
					'title'       => esc_html__('Demo Content', 'resume-kit'),
					'icon'        => 'dashicons dashicons-layout',
					'description' => sprintf(esc_html__('Demo content is pro feature. To import sample demo content, %1$s plugin should be installed and activated. After plugin is activated, visit Import Demo Data menu under Appearance.', 'resume-kit'), esc_html__('One Click Demo Import', 'resume-kit')),
					'button_text' => esc_html__('UPGRADE For  Demo Content', 'resume-kit'),
					'button_url'  => 'https://wpthemespace.com/product/resume-kit-pro/?add-to-cart=11849',
					'button_type' => 'primary',
					'is_new_tab'  => true,
				),

				'two' => array(
					'title'       => esc_html__('Theme Options', 'resume-kit'),
					'icon'        => 'dashicons dashicons-admin-customizer',
					'description' => esc_html__('Theme uses Customizer API for theme options. Using the Customizer you can easily customize different aspects of the theme.', 'resume-kit'),
					'button_text' => esc_html__('Customize', 'resume-kit'),
					'button_url'  => wp_customize_url(),
					'button_type' => 'primary',
				),
				'three' => array(
					'title'       => esc_html__('Show Video', 'resume-kit'),
					'icon'        => 'dashicons dashicons-layout',
					'description' => sprintf(esc_html__('You may show Resume Kit short video for better understanding', 'resume-kit'), esc_html__('One Click Demo Import', 'resume-kit')),
					'button_text' => esc_html__('Show video', 'resume-kit'),
					'button_url'  => 'https://www.youtube.com/watch?v=fVGCrbOWGz4',
					'button_type' => 'primary',
					'is_new_tab'  => true,
				),
				'five' => array(
					'title'       => esc_html__('Set Widgets', 'resume-kit'),
					'icon'        => 'dashicons dashicons-tagcloud',
					'description' => esc_html__('Set widgets in your sidebar, Offcanvas as well as footer.', 'resume-kit'),
					'button_text' => esc_html__('Add Widgets', 'resume-kit'),
					'button_url'  => admin_url() . '/widgets.php',
					'button_type' => 'link',
					'is_new_tab'  => true,
				),
				'six' => array(
					'title'       => esc_html__('Theme Preview', 'resume-kit'),
					'icon'        => 'dashicons dashicons-welcome-view-site',
					'description' => esc_html__('You can check out the theme demos for reference to find out what you can achieve using the theme and how it can be customized. Theme demo only work in pro theme', 'resume-kit'),
					'button_text' => esc_html__('View Demo', 'resume-kit'),
					'button_url'  => 'https://joy.wpteamx.com/demos/',
					'button_type' => 'link',
					'is_new_tab'  => true,
				),
				'seven' => array(
					'title'       => esc_html__('Contact Support', 'resume-kit'),
					'icon'        => 'dashicons dashicons-sos',
					'description' => esc_html__('Got theme support question or found bug or got some feedbacks? Best place to ask your query is the dedicated Support forum for the theme.', 'resume-kit'),
					'button_text' => esc_html__('Contact Support', 'resume-kit'),
					'button_url'  => 'https://wpthemespace.com/support/',
					'button_type' => 'link',
					'is_new_tab'  => true,
				),
			),

			'useful_plugins'        => array(
				'description' => esc_html__('Theme supports some helpful WordPress plugins to enhance your site. But, please enable only those plugins which you need in your site. For example, enable WooCommerce only if you are using e-commerce.', 'resume-kit'),
				'already_activated_message' => esc_html__('Already activated', 'resume-kit'),
				'version_label' => esc_html__('Version: ', 'resume-kit'),
				'install_label' => esc_html__('Install and Activate', 'resume-kit'),
				'activate_label' => esc_html__('Activate', 'resume-kit'),
				'deactivate_label' => esc_html__('Deactivate', 'resume-kit'),
				'content'                   => array(
					array(
						'slug' => 'magical-addons-for-elementor',
						'icon' => 'svg',
					),
					array(
						'slug' => 'magical-products-display'
					),
					array(
						'slug' => 'magical-posts-display'
					),
					array(
						'slug' => 'click-to-top'
					),
					array(
						'slug' => 'gallery-box',
						'icon' => 'svg',
					),
					array(
						'slug' => 'magical-blocks'
					),
					array(
						'slug' => 'easy-share-solution',
						'icon' => 'svg',
					),
					array(
						'slug' => 'wp-edit-password-protected',
						'icon' => 'svg',
					),
				),
			),
			// Required actions array.
			'recommended_actions'        => array(
				'install_label' => esc_html__('Install and Activate', 'resume-kit'),
				'activate_label' => esc_html__('Activate', 'resume-kit'),
				'deactivate_label' => esc_html__('Deactivate', 'resume-kit'),
				'content'            => array(
					'magical-blocks' => array(
						'title'       => __('Magical Addons', 'resume-kit'),
						'description' => __('Now you can add or update your site elements very easily by Magical Products Display. Supercharge your Elementor block with highly customizable Magical Blocks For WooCommerce.', 'resume-kit'),
						'plugin_slug' => 'magical-addons-for-elementor',
						'id' => 'magical-addons-for-elementor'
					),
					'go-pro' => array(
						'title'       => '<a target="_blank" class="activate-now button button-danger" href="https://wpthemespace.com/product/resume-kit-pro/?add-to-cart=11849">' . __('UPGRADE Resume Kit PRO', 'resume-kit') . '</a>',
						'description' => __('You will get more frequent updates and quicker support with the Pro version.', 'resume-kit'),
						//'plugin_slug' => 'x-instafeed',
						'id' => 'go-pro'
					),

				),
			),
			// Free vs pro array.
			'free_pro'                => array(
				'free_theme_name'     => $xtheme_name,
				'pro_theme_name'      => $xtheme_name . __(' Pro', 'resume-kit'),
				'pro_theme_link'      => 'https://wpthemespace.com/product/resume-kit-pro',
				/* translators: View link */
				'get_pro_theme_label' => sprintf(__('Get %s', 'resume-kit'), 'Resume Kit Pro'),
				'features'            => array(
					array(
						'title'       => esc_html__('Daring Design for Devoted Readers', 'resume-kit'),
						'description' => esc_html__('Resume Kit\'s design helps you stand out from the crowd and create an experience that your readers will love and talk about. With a flexible home page you have the chance to easily showcase appealing content with ease.', 'resume-kit'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Mobile-Ready For All Devices', 'resume-kit'),
						'description' => esc_html__('Resume Kit makes room for your readers to enjoy your articles on the go, no matter the device their using. We shaped everything to look amazing to your audience.', 'resume-kit'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Home slider', 'resume-kit'),
						'description' => esc_html__('Resume Kit gives you extra slider feature. You can create awesome home slider in this theme.', 'resume-kit'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Widgetized Sidebars To Keep Attention', 'resume-kit'),
						'description' => esc_html__('Resume Kit comes with a widget-based flexible system which allows you to add your favorite widgets over the Sidebar as well as on offcanvas too.', 'resume-kit'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Auto Set-up Feature', 'resume-kit'),
						'description' => esc_html__('You can import demo site only one click so you can setup your site like demo very easily.', 'resume-kit'),
						'is_in_lite'  => 'ture',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Multiple Header Layout', 'resume-kit'),
						'description' => esc_html__('Resume Kit gives you extra ways to showcase your header with miltiple layout option you can change it on the basis of your requirement', 'resume-kit'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('One Click Demo install', 'resume-kit'),
						'description' => esc_html__('You can import demo site only one click so you can setup your site like demo very easily.', 'resume-kit'),
						'is_in_lite'  => 'ture',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Extra Drag and drop support', 'resume-kit'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Advanced Portfolio Filter', 'resume-kit'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Testimonial Carousel', 'resume-kit'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Diffrent Style Blog', 'resume-kit'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Flexible Home Page Design', 'resume-kit'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Pro Service Section', 'resume-kit'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Animation Home Text', 'resume-kit'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Advance Customizer Options', 'resume-kit'),
						'description' => esc_html__('Advance control for each element gives you different way of customization and maintained you site as you like and makes you feel different.', 'resume-kit'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Advance Pagination', 'resume-kit'),
						'description' => esc_html__('Multiple Option of pagination via customizer can be obtained on your site like Infinite scroll, Ajax Button On Click, Number as well as classical option are available.', 'resume-kit'),
						'is_in_lite'  => 'ture',
						'is_in_pro'   => 'true',
					),

					array(
						'title'       => esc_html__('Premium Support and Assistance', 'resume-kit'),
						'description' => esc_html__('We offer ongoing customer support to help you get things done in due time. This way, you save energy and time, and focus on what brings you happiness. We know our products inside-out and we can lend a hand to help you save resources of all kinds.', 'resume-kit'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('No Credit Footer Link', 'resume-kit'),
						'description' => esc_html__('You can easily remove the Theme: Resume Kit by Resume Kit copyright from the footer area and make the theme yours from start to finish.', 'resume-kit'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
				),
			),

		);

		resume_kit_About::init($config);
	}

endif;

add_action('after_setup_theme', 'resume_kit_about_setup');

/**
 * Pro notice text
 *
 */
function resume_kit_pnotice_output()
{

?>
	<div class="mgadin-hero">
		<div class="mge-info-content">
			<div class="mge-info-hello">
				<?php
				$current_theme = wp_get_theme();
				$current_theme_name = $current_theme->get('Name');
				$current_user = wp_get_current_user();

				$demo_link = esc_url('https://wpthemespace.com/product/resume-kit-pro/');
				$pro_link = esc_url('https://wpthemespace.com/product/resume-kit-pro/?add-to-cart=11849');
				$vid_link = esc_url('https://www.youtube.com/watch?v=fVGCrbOWGz4');

				esc_html_e('Hello, ', 'resume-kit');
				echo esc_html($current_user->display_name);
				?>

				<?php esc_html_e('👋🏻', 'resume-kit'); ?>
			</div>
			<div class="mge-info-desc">
				<div><?php printf(esc_html__('Now You are using the Free version of %s theme. Resume Kit PRO version is now available with one click setup feature!! Only active the theme and follow auto-setup then your site will be ready with lots of advanced features. Now create your site like a pro with only a few clicks!!!! So why late get pro now', 'resume-kit'), $current_theme_name); ?></div>
				<div class="mge-offer"><?php printf(esc_html__('Don\'t miss out on these incredible features - upgrade to Resume Kit Pro now! ', 'resume-kit'), $current_theme_name); ?></div>
			</div>
			<div class="mge-info-actions">
				<a href="<?php echo esc_url($pro_link); ?>" target="_blank" class="button button-primary upgrade-btn">
					<?php esc_html_e('Upgrade Pro', 'resume-kit'); ?>
				</a>
				<a href="<?php echo esc_url($demo_link); ?>" target="_blank" class="button button-primary demo-btn">
					<?php esc_html_e('Pro Details', 'resume-kit'); ?>
				</a>
				<a href="<?php echo esc_url($vid_link); ?>" target="_blank" class="button button-primary demo-btn">
					<?php esc_html_e('Watch Video', 'resume-kit'); ?>
				</a>
				<button class="button-info btnend"><?php esc_html_e('Dismiss this notice', 'resume-kit') ?></button>
			</div>

		</div>

	</div>
<?php
}


//Admin notice 
function resume_kit_new_optins_texts()
{
	$hide_date = get_option('resume_kit_info_text');
	if (!empty($hide_date)) {
		$clickhide = round((time() - strtotime($hide_date)) / 24 / 60 / 60);
		if ($clickhide < 30) {
			return;
		}
	}
?>
	<div class="mgadin-notice notice notice-success mgadin-theme-dashboard mgadin-theme-dashboard-notice mge is-dismissible meis-dismissible">
		<?php resume_kit_pnotice_output(); ?>
	</div>
<?php

}
add_action('admin_notices', 'resume_kit_new_optins_texts');


function resume_kit_new_optins_texts_init()
{

	if (isset($_GET['xbnotice']) && $_GET['xbnotice'] == 1) {
		update_option('resume_kit_info_text', current_time('mysql'));
	}
}
add_action('init', 'resume_kit_new_optins_texts_init');
