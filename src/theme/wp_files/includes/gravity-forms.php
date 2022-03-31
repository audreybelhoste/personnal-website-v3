<?php

// Fix special characters in Gravity Forms mail subjects
function ci_before_email( $email ) {
	$email['subject'] = htmlspecialchars_decode($email['subject']);
	return $email;
}

// Change default Gravity Forms notification address
function ci_change_notification_email( $notification, $form, $entry ){
	$custom_email = get_field("gform_default_address", "option");
	if ( $custom_email && $notification["to"] == "{admin_email}" ) {
		$notification["to"] = get_field("gform_default_address", "option");
	}
	return $notification;
}

//Change Submit Btn
function form_submit_button( $button, $form ) {
	return "<button class='button gform_button' id='gform_submit_button_{$form['id']}'><span>".$form['button']['text']."</span></button>";
}