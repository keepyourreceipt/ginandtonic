<?php
// Generate facebook access token
try {
  $facebook_access_token = file_get_contents('https://graph.facebook.com/oauth/access_token?client_id=1509875139342540&client_secret='. FACEBOOK_SECRET .'&grant_type=client_credentials');
} catch (Exception $e) {
  echo $e->getMessage();
}

// Get information from facebook API endpoint
try {
  $facebook_feed = file_get_contents( 'https://graph.facebook.com/banyantreeyoganh/posts/?' . $facebook_access_token );
} catch (Exception $e) {
  echo $e->getMessage();
}

// Save facebook feed to variable
try {
  $facebook_feed = json_decode( $facebook_feed );
} catch (Exception $e) {
  echo $e->getMessage();
}
?>
