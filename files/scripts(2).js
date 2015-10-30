jQuery(function($){

	$( 'body' ).on( 'submit', '.builder-contact', function(){
		var form = $( this );

		if( form.hasClass( 'sending' ) ) {
			return false;
		}
		form.addClass( 'sending' );
		form.find( '.contact-message' ).fadeOut();

		send_form( form );

		return false;
	} );

	function send_form( form ) {
		
		/*var data = {
			action : 'builder_contact_send',
			'contact-name' : $( '[name="contact-name"]', form ).val(),
			'contact-email' : $( '[name="contact-email"]', form ).val(),
			'contact-subject' : $( '[name="contact-subject"]', form ).val(),
			'contact-message' : $( '[name="contact-message"]', form ).val(),
			'contact-sendcopy' : $( '[name="send-copy"]', form ).val(),
			'contact-settings' : $( '.builder-contact-form-data', form ).html()
		};*/
		
		   
		
		$.ajax({
			url : 'php/worker.php',
			method : 'POST',
			data : {email:$( '[name="contact-email"]', form ).val(), message:$( '[name="contact-message"]', form ).val(), name:$( '[name="contact-name"]', form ).val()},
			success : function( data ) {
				form.find( '.contact-message' ).html( data ).fadeIn();
				form.removeClass( 'sending' );
				form[0].reset();
			}
		});
	}
});