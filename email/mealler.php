<?php

	//require_once('./_lib/*');
//require '/_lib/PHPMailerAutoload.php';
	//require __DIR__ .'/_lib/class.phpmailer.php';
	 
	class Email {

		private $mail ;

		public function __construct() {
			$this->mail = new PHPMailer();
			$this->mail->IsSMTP();

			$this->mail->SMTPOptions = array(
				'ssl' => array(
				    'verify_peer' => false,
				    'verify_peer_name' => false,
				    'allow_self_signed' => true
				));
			$this->mail->Host = "smtp.gmail.com";
			$this->mail->SMTPAuth = true;
			$this->mail->Username = 'ayowaberka1@gmail.com';
			$this->mail->Password = '0717253112';

			$this->mail->From = "no-reply@tp2.whcb.co.za";
			

		}

		public function send_email($name,$subject,$to,$msg) {
			$this->mail->FromName = $name;
			$this->mail->isHTML(true);
			$this->mail->WordWrap = 50;  
			$this->mail->addAddress($to);
			$this->mail->Subject = $subject;
			$this->mail->Body = $msg;
			$this->mail->AltBody = " ";

			if(!$this->mail->send()) {
			    //echo "Mailer Error: " . $this->mail->ErrorInfo;
			    return false;
			} 
			else {
				return true;
				//echo "Message has been sent successfully";
				//header("Location: ../../successfull.php");
			}
		}
	}

?>