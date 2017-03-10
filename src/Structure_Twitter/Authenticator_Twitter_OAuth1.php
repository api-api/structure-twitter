<?php
/**
 * Authenticator_Twitter_OAuth1 class
 *
 * @package APIAPIAuthenticatorDummyName
 * @since 1.0.0
 */

namespace APIAPI\Structure_Twitter;

use APIAPI\Authenticator_OAuth1\Authenticator_OAuth1;

if ( ! class_exists( 'APIAPI\Structure_Twitter\Authenticator_Twitter_OAuth1' ) ) {

	/**
	 * Authenticator implementation for Twitter's OAuth 1.
	 *
	 * Twitter handles OAuth 1 different from its standard wtf.
	 *
	 * @since 1.0.0
	 */
	class Authenticator_Twitter_OAuth1 extends Authenticator_OAuth1 {
		/**
		 * Returns protocol parameters.
		 *
		 * @since 1.0.0
		 * @access protected
		 *
		 * @param string $consumer_key      The consumer key for the API.
		 * @param array  $additional_params Additional protocol parameters to merge.
		 * @return array Array of protocol parameters.
		 */
		protected function get_protocol_params( $consumer_key, $additional_params = array() ) {
			$protocol_params = parent::get_protocol_params( $consumer_key, $additional_params );

			/* Twitter does not want this as it can be set in their app configuration. */
			if ( isset( $protocol_params['oauth_callback'] ) ) {
				unset( $protocol_params['oauth_callback'] );
			}

			return $protocol_params;
		}
	}

}
