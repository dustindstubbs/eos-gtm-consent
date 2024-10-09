<?php

/**
 * @package GTMConsent
 */

/*
Plugin Name: GTM Consent
Description: A simple solution for managing user consent for a GTM container.
Version: 0.1.4
Author: Dustin Stubbs
License GPLv2 or later
*/

if ( ! defined( 'ABSPATH' ) ) {
	die;
}

class GTMConsent
{

	public $plugin;

	//Passing variable to __construct for classes
	function __construct() {
		$this->plugin = plugin_basename( __FILE__ );
	}

	function register() {
		// frontend css
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );

		// Add plugin page links
		add_filter( "plugin_action_links_$this->plugin", array( $this, 'settingsLink') );

		add_shortcode( 'consent_popup', array( $this, 'consentPopup' ) );

		add_shortcode( 'consent_buttons', array( $this, 'consentButtons' ) );

		add_action('wp_head', array( $this, 'headScript' ) );


	}

	function headScript(){
		$consentContainer = get_option('gtm_consent_option_name')['container_0'];
		if ( $consentContainer != null ) {
			$consentAcceptDefault = get_option('gtm_consent_option_name')['accept_by_default_1'];

			if ( $consentAcceptDefault != true ) {
				$consentAction = 'denied';
			}else{
				$consentAction = 'granted';
			}
			?>
			<!-- Google Tag Manager -->
			<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
			new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
			'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
			})(window,document,'script','dataLayer','<?php echo $consentContainer ?>');</script>
			<!-- End Google Tag Manager -->
			<script>
				window.dataLayer = window.dataLayer || [];
				function gtag(){dataLayer.push(arguments);}

				gtag('consent', 'default', {
					'ad_storage': '<?php echo $consentAction ?>',
					'ad_personalization': '<?php echo $consentAction ?>',
					'ad_user_data': '<?php echo $consentAction ?>',
					'analytics_storage': '<?php echo $consentAction ?>'
				});

				gtag('js', new Date());
				gtag('config', '<?php echo $consentContainer ?>');
			</script>
			<?php
		}
  	}

	public function editVerse() {
		$data = $_POST;
		if ($data['usage'] == 'accept') {
			echo get_option('gtm_consent_option_name')['container_0'];
		}
		die;
	}

	public function consentPopup() {
		$consentContainer = get_option('gtm_consent_option_name')['container_0'];
		if ( $consentContainer != null ) {
			$consentDisclaimer = get_option('gtm_consent_option_name')['disclaimer_2'];
			$consentBackground = get_option('gtm_consent_option_name')['background_3'];
			$text = "";

			if ( $consentDisclaimer != '' ) {
			// Generate GTM consent popup if discalimer text exists
			$text .= "
			<div id='gc-popup' class='d-none card gc-card position-fixed ".(( $consentBackground == 'light' ) ? 'bg-white text-dark' : 'bg-dark text-white')." p-3 rounded start-0 bottom-0 m-sm-2'>
				<div class='card-body'>
					$consentDisclaimer
				</div>
				<div class='border-0 d-flex'>
					<button id='reject' class='gc-btn-reject flex-fill btn btn-".(( $consentBackground == 'light' ) ? 'dark' : 'light')."' onclick='scriptReject()'>Only Essential</button>
					<button id='accept' class='gc-btn-accept flex-fill btn btn-primary ms-2' onclick='scriptAccept()'>Accept All</button>
				</div>
			</div>";
			}

			$text .= "
			<!-- Google Tag Manager (noscript) -->
			<noscript><iframe src='https://www.googletagmanager.com/ns.html?id=$consentContainer'
			height='0' width='0' style='display:none;visibility:hidden'></iframe></noscript>
			<!-- End Google Tag Manager (noscript) -->
			";

			return $text;
		}
	}

	public function consentButtons() {
		$consentContainer = get_option('gtm_consent_option_name')['container_0'];
		if ( $consentContainer != null ) {
			$consentBackground = get_option('gtm_consent_option_name')['background_3'];
			$text = "
			<div id='gc-btn-box' class='border-0 d-flex'>
				<button id='reject' class='gc-btn-reject flex-fill btn btn-".(( $consentBackground == 'light' ) ? 'dark' : 'light')."' onclick='scriptReject()'>Only Essential</button>
				<button id='accept' class='gc-btn-accept flex-fill btn btn-primary ms-2' onclick='scriptAccept()'>Accept All</button>
			</div>
			";

			return $text;
		}
	}

	public function settingsLink( $links ) {
		$settingsLink = '<a href="tools.php?page=gtm-consent">Settings</a>';
		array_push( $links, $settingsLink );
		return $links;
	}

	function activate() {
		flush_rewrite_rules();
	}

	function deactivate() {
		flush_rewrite_rules();
	}


	function enqueue() {
		//enqueue all of our scripts
		wp_enqueue_style( 'GTMConsentstyle', plugins_url( '/assets/style.css', __FILE__ ) );
		wp_enqueue_script( 'GTMConsentscript', plugins_url( '/assets/main.js', __FILE__ ) );
	}

}

if ( class_exists( 'GTMConsent' ) ) {
	$GTMConsent = new GTMConsent();
	$GTMConsent->register();
}

require_once plugin_dir_path( __FILE__ ) . 'templates/settings.php';

// activation
register_activation_hook( __FILE__, array( $GTMConsent, 'activate' ) );

// deactivation
register_deactivation_hook( __FILE__, array( $GTMConsent, 'deactivate' ) );



