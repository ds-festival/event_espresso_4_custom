function espresso_track_successful_sale_manual( $Transaction, $status_updates ){
    


	if ($Transaction instanceof EE_Transaction) {
		$sale_amt = $Transaction->paid();
		$unique_transaction_id = $Transaction->ID();
		$Primary_Registration = $Transaction->primary_registration();
		if ($Primary_Registration instanceof EE_Registration) {
			$Attendee = $Primary_Registration->attendee();
			if ($Attendee instanceof EE_Attendee) {
				$email = $Attendee->email();
				$referrer = $_COOKIE['ap_id'];

				//throw new Exception("Sale amount: ".$sale_amt.", " .
				//	"unique_transaction_id: ".$unique_transaction_id.", " .
				//	"email: ".$email.", " .
				//	"referrer: ".$referrer.", "
				//	, 1);

				do_action('wp_affiliate_process_cart_commission', array("referrer" => $referrer, "sale_amt" =>$sale_amt, "txn_id"=>$unique_transaction_id, "buyer_email"=>$email));
			}
		}
	}
}
add_action('AHEE__EE_Transaction_Processor__manually_update_registration_statuses','espresso_track_successful_sale_manual', 20, 2);


function espresso_track_successful_sale_gateway( $Transaction, $status_updates ){
    
//throw new Exception("BROKEN");

	if ($Transaction instanceof EE_Transaction) {
		$sale_amt = $Transaction->paid();
		$unique_transaction_id = $Transaction->ID();
		$Primary_Registration = $Transaction->primary_registration();
		if ($Primary_Registration instanceof EE_Registration) {
			$Attendee = $Primary_Registration->attendee();
			if ($Attendee instanceof EE_Attendee) {
				$email = $Attendee->email();
				$referrer = $_COOKIE['ap_id'];

				//throw new Exception("Sale amount: ".$sale_amt.", " .
				//	"unique_transaction_id: ".$unique_transaction_id.", " .
				//	"email: ".$email.", " .
				//	"referrer: ".$referrer.", "
				//	, 1);

				do_action('wp_affiliate_process_cart_commission', array("referrer" => $referrer, "sale_amt" =>$sale_amt, "txn_id"=>$unique_transaction_id, "buyer_email"=>$email));
			}
		}
	}
}
add_action('AHEE__EE_Transaction_Processor__update_transaction_and_registrations_after_checkout_or_payment','espresso_track_successful_sale_gateway', 20, 2);