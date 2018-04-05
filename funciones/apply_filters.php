<?php
	function apply_filters( $tag, $value ) {
    global $wp_filter, $wp_current_filter;
 
    $args = array();
 
    // Do 'all' actions first.
    if ( isset($wp_filter['all']) ) {
        $wp_current_filter[] = $tag;
        $args = func_get_args();
        _wp_call_all_hook($args);
    }
 
    if ( !isset($wp_filter[$tag]) ) {
        if ( isset($wp_filter['all']) )
            array_pop($wp_current_filter);
        return $value;
    }
 
    if ( !isset($wp_filter['all']) )
        $wp_current_filter[] = $tag;
 
    if ( empty($args) )
        $args = func_get_args();
 
    // don't pass the tag name to WP_Hook
    array_shift( $args );
 
    $filtered = $wp_filter[ $tag ]->apply_filters( $value, $args );
 
    array_pop( $wp_current_filter );
 
    return $filtered;
}


	function is_email( $email, $deprecated = false ) {
	        if ( ! empty( $deprecated ) )
	                _deprecated_argument( __FUNCTION__, '3.0.0' );
	
	        // Test for the minimum length the email can be
	        if ( strlen( $email ) < 6 ) {

	                return apply_filters( 'is_email', false, $email, 'email_too_short' );

	        }
	
	        // Test for an @ character after the first position
	        if ( strpos( $email, '@', 1 ) === false ) {
	                /** This filter is documented in wp-includes/formatting.php */
	                return apply_filters( 'is_email', false, $email, 'email_no_at' );
	        }
	
	        // Split out the local and domain parts
	        list( $local, $domain ) = explode( '@', $email, 2 );
	
	        // LOCAL PART
	        // Test for invalid characters
	        if ( !preg_match( '/^[a-zA-Z0-9!#$%&\'*+\/=?^_`{|}~\.-]+$/', $local ) ) {
	                /** This filter is documented in wp-includes/formatting.php */
	                return apply_filters( 'is_email', false, $email, 'local_invalid_chars' );
	        }
	
	        // DOMAIN PART
	        // Test for sequences of periods
	        if ( preg_match( '/\.{2,}/', $domain ) ) {
	                /** This filter is documented in wp-includes/formatting.php */
	                return apply_filters( 'is_email', false, $email, 'domain_period_sequence' );
	        }
	
	        // Test for leading and trailing periods and whitespace
	        if ( trim( $domain, " \t\n\r\0\x0B." ) !== $domain ) {
	                /** This filter is documented in wp-includes/formatting.php */
	                return apply_filters( 'is_email', false, $email, 'domain_period_limits' );
	        }
	
	        // Split the domain into subs
	        $subs = explode( '.', $domain );
	
	        // Assume the domain will have at least two subs
	        if ( 2 > count( $subs ) ) {
	                /** This filter is documented in wp-includes/formatting.php */
	                return apply_filters( 'is_email', false, $email, 'domain_no_periods' );
	        }
	
	        // Loop through each sub
	        foreach ( $subs as $sub ) {
	                // Test for leading and trailing hyphens and whitespace
	                if ( trim( $sub, " \t\n\r\0\x0B-" ) !== $sub ) {
	                        /** This filter is documented in wp-includes/formatting.php */
	                        return apply_filters( 'is_email', false, $email, 'sub_hyphen_limits' );
	                }
	
	                // Test for invalid characters
	                if ( !preg_match('/^[a-z0-9-]+$/i', $sub ) ) {
	                        /** This filter is documented in wp-includes/formatting.php */
	                        return apply_filters( 'is_email', false, $email, 'sub_invalid_chars' );
	                }
	        }
	
	        // Congratulations your email made it!
	        /** This filter is documented in wp-includes/formatting.php */
	        return apply_filters( 'is_email', $email, $email, null );
	}


	function alphaSpace($var){
		$Asunto= trim($var);
		$Asunto= explode(" ", $var);
		$Longitud= count($Asunto);

		for ($i=0; $i < $Longitud ; $i++) { 
			if (ctype_alpha($Asunto[$i])) {
				echo strtoupper($Asunto[$i]." ");
			}
		}
	}


?>