<?php
/**
*   @package Blank
*   Secure
*/
  
// This code snippet forces login with email address
remove_filter( 'authenticate', 'wp_authenticate_username_password', 20, 3 );
add_filter( 'authenticate', 'force_email_login', 20, 3 );
// Custom function to force email login
function force_email_login( $user, $username, $password ) {
  if ( ! empty( $username ) ) {
    
    // Is there a user with the given email address?
    $user = get_user_by( 'email', str_replace( '&', '&amp;', $username ) );
    if ( ! $user ) {
      $username = 'THIS_IS_NOT_A_VALID_USERNAME_AND_LEADS_TO_AN_ERROR_WHEN_TRYING_TO_LOG_IN_WITH_THIS_SILLY_STRING';
    } else {
      $username = $user->user_login;
    }
  }
  return wp_authenticate_username_password( null, $username, $password );
}
