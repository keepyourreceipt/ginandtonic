<?php
$current_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$instagram = new Andreyco\Instagram\Client(array(
   'apiKey'      => '07dc1988bef3459f968d222796d85a56',
   'apiSecret'   => INSTAGRAM_SECRET,
   'apiCallback' => $current_link,
   'scope'       => array('basic'),
 ));
?>
