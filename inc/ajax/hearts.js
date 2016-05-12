// Call the php function here
jQuery( document ).on( 'ready', function() {
  jQuery( 'button' ).on( 'click', function() {
    jQuery.post( ajax_handler.url, {
      action: 'update_hearts'
    }, function( data ) {
      alert( "Post hearts: " + data );
    });
  });
});
