<?php

	//require_once('./_lib/*');
//require './_lib/PHPMailerAutoload.php';
	foreach (glob("./_lib/*.php") as $filename)
	{
		include $filename;
	}
	class Email {

		private $mail ;

		public function __construct() {
			$this->mail = new PHPMailer();
			$this->mail->IsSMTP();
			$this->mail->Host = "mail.whcb.co.za";
			$this->mail->SMTPAuth = true;
			$this->mail->Username = 'order@whcb.co.za';
			$this->mail->Password = '2016abc';

			$this->mail->From = "no-reply@tp2.whcb.co.za";
			$this->mail->FromName = "Tp Assignment (RikiTours)";
			

		}

		public function send_email($subject,$to,$msg) {
			$this->mail->isHTML(true);
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