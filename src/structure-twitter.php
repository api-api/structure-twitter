<?php
/**
 * Structure loader.
 *
 * @package APIAPI\Structure_Twitter
 * @since 1.0.0
 */

if ( ! function_exists( 'apiapi_register_structure_twitter' ) ) {

	/**
	 * Registers the structure for Twitter.
	 *
	 * It is stored in a global if the API-API has not yet been loaded.
	 *
	 * @since 1.0.0
	 */
	function apiapi_register_structure_twitter() {
		if ( function_exists( 'apiapi_manager' ) ) {
			apiapi_manager()->structures()->register( 'twitter', 'APIAPI\Structure_Twitter\Structure_Twitter' );
			apiapi_manager()->authenticators()->register( 'twitter-oauth1', 'APIAPI\Structure_Twitter\Authenticator_Twitter_OAuth1' );
		} else {
			if ( ! isset( $GLOBALS['_apiapi_structures_loader'] ) ) {
				$GLOBALS['_apiapi_structures_loader'] = array();
			}

			$GLOBALS['_apiapi_structures_loader']['twitter'] = 'APIAPI\Structure_Twitter\Structure_Twitter';

			if ( ! isset( $GLOBALS['_apiapi_authenticators_loader'] ) ) {
				$GLOBALS['_apiapi_authenticators_loader'] = array();
			}

			$GLOBALS['_apiapi_authenticators_loader']['twitter_oauth1'] = 'APIAPI\Structure_Twitter\Authenticator_Twitter_OAuth1';
		}
	}

	apiapi_register_structure_twitter();

}
