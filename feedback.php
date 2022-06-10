<?php
$message1 = $_POST['message1'];
$receiver = "FROM: kanakaakula112@gmail.com";
$subject1 = "Feedback Form Submission";
$subject2 = "Submission successful";
$messagetouser = "Hello $name
Your feedback has been received.
Thank you for taking time out to give us your valuable suggestions!
Regards:HEALTHIFY
";
$messagetoadmin="Healthify you got an email and the message is $message1 Thank you";
$sender = $_POST['email'];
$emailtouser=mail($receiver,$subject1,$messagetoadmin,$sender);
$emailtoadmin=mail($sender,$subject2,$messagetouser,$receiver);
if($emailtouser && $emailtoadmin)
{
 header("Location:home.html");
}
else{
  echo "MAils are not been sent maybe internet connection problem";
}

?>