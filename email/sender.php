<?php
	//require_once("/mealler.php");
	// require_once("/taskEmailView.php");

	class Quote_email
	{
		public static function send($name,$subject, $title,$message, $to)
		{
			if(!empty ($to)) {
				$email = new Email();
				if($email->send_email( $name,$title." ".$subject,$to,$message)) {
					return true;
				} else {
					return false;
				}

			} else {
				return false;
			}
		}
	}



?>