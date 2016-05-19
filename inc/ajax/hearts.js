// Call the php function here
jQuery( document ).on( 'ready', function() {
  jQuery( '.heart-post' ).on( 'click', function() {
    var postID = jQuery(this).data('post-id');
    var postHeartsLabel = jQuery(this).next('span');
    var postHeartIcon = jQuery(this);
    jQuery.post( ajax_handler.url, {
      action: 'update_hearts',
      postID: postID,
    }, function( data ) {
      if( data.length ) {
        postHeartsLabel.text( data );
        postHeartIcon.removeClass('fa-heart-o').addClass('fa-heart');
      }
    });
  });
});
