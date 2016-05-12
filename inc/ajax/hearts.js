  // Call the php function here
  jQuery.post( ajax_handler.url, {
    action: 'update_hearts'
  }, function( data ) {
    alert( "Something" + data );
  });
