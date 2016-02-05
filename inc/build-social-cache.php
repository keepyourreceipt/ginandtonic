<?php
$cache_modified = filemtime( get_template_directory_uri() . '/inc/social-api.cache' );
// if modified time more than 15 minutes ago, delete the cache file contents
