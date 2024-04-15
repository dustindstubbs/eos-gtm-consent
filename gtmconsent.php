<?php

/**
 * @package GTMConsent
 */

/*
Plugin Name: GTM Consent
Description: A simple solution for managing user consent for a GTM container.
Version: 0.1.0
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
		$consentDisclaimer = get_option('gtm_consent_option_name')['disclaimer_1'];

		// Generate GTM consent popup if cookie does not exist
		if ( !isset($_COOKIE['gtm-consent']) ) {
			echo "
			<div id='sc-popup' class='card sc-card position-fixed bg-dark text-light p-4 rounded start-0 bottom-0 m-sm-2'>
				<div class='card-body'>
					$consentDisclaimer
				</div>
				<div class='card-footer border-0 d-flex'>
					<button id='reject' class='sc-btn-reject flex-fill btn btn-secondary' onclick='scriptReject()' >Only Essential</button>
					<button id='accept' class='sc-btn-accept flex-fill btn btn-primary ms-2' onclick='scriptAccept()'>Accept All</button>
				</div>
			</div>
			";
		}
		
		echo "
		<!-- Google tag (gtag.js) -->
		<script async src='https://www.googletagmanager.com/gtag/js?id=$consentContainer'></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}";
			
			if (!isset($_COOKIE['gtm-consent']) || $_COOKIE['gtm-consent'] == "rejected"){
			echo "
			gtag('consent', 'default', {
				'ad_storage': 'denied',
				'ad_personalization': 'denied',
				'ad_user_data': 'denied',
				'analytics_storage': 'denied'
			});";
			}else{
			echo "
			gtag('consent', 'default', {
				'ad_storage': 'granted',
				'ad_personalization': 'granted',
				'ad_user_data': 'granted',
				'analytics_storage': 'granted'
			});";
			}

			echo "
			gtag('js', new Date());
			gtag('config', '$consentContainer');
		</script>
		";
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



