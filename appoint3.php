<?php
$server_name="localhost";
$username="root";
$password="";
$database_name="healithydb";
$conn=mysqli_connect($server_name,$username,$password,$database_name);
//now check the connection
if(!$conn)
{
	die("Connection Failed:" . mysqli_connect_error());
}
if(isset($_POST['save']))
{	
	 $pname3 = $_POST['pname3'];
	 $email = $_POST['email'];
	 $phone = $_POST['phone'];
	 $address3 = $_POST['address3'];
   $heart = $_POST['heart'];
   $nerves = $_POST['nerves'];
   $bones = $_POST['bones'];
   $skin = $_POST['skin'];
	 $dates =date('Y-m-d',strtotime($_POST['dates']));
   $gender = $_POST['gender'];
   $pregnancy = $_POST['pregnancy'];
	 
	 $sql_query = "INSERT INTO hos_app3 (pname3,email,phone,address3,heart,nerves,bones,skin,dates,gender,pregnancy)
	 VALUES ('$pname3','$email','$phone','$address3','$heart','$nerves','$bones','$skin','$dates','$gender','$pregnancy')";

    $query_run=mysqli_query($conn, $sql_query);

	 if($query_run)
    {   
      $receiver = $_POST['email'];
      $subject = "Booking conformation from Ashwini Hospital";
      if($nerves !='select')
      {
        $message = "Hello $pname1
      Your Appointment Booking has been done with NEUROLOGIST for $dates during $nerves
      Kindly Stick to schedule if not contact for cancelation by emailing to
      kanakaakula112@gmail.com or by calling 9391364348
      Thank you for choosing us!
      Regards:HEALTHIFY";
      }
      else if($heart !='select')
      {
        $message = "Hello $pname1
      Your Appointment Booking has been done with  CARDIOLOGIST $dates for $heart
      Kindly Stick to schedule if not contact for cancelation by emailing to
      kanakaakula112@gmail.com or by calling 9391364348
      Thank you for choosing us!
      Regards:HEALTHIFY";
      }
     
      else if($bones !='select')
      {
        $message = "Hello $pname1
      Your Appointment Booking has been done with ORTHOPEDIC $dates for $bones
      Kindly Stick to schedule if not contact for cancelation by emailing to
      kanakaakula112@gmail.com or by calling 9391364348
      Thank you for choosing us!
      Regards:HEALTHIFY";
      }
      else if($skin !='select')
      {
        $message = "Hello $pname1
      Your Appointment Booking has been done for DERMATOLOGIST $dates for $skin
      Kindly Stick to schedule if not contact for cancelation by emailing to
      kanakaakula112@gmail.com or by calling 9391364348
      Thank you for choosing us!
      Regards:HEALTHIFY";
      }
      else{
        $message = "Hello $pname1
        Your Appointment Booking has been done for GYENACOLOGY $dates for $pregnancy
        Thank you for choosing us!
      Regards:HEALTHIFY";
      }
      $sender = "FROM: kanakaakula112@gmail.com";
      if(mail($receiver,$subject,$message,$sender))
      {
         header("Location:home.html");
      }
      else
      {
          echo "some inconvinence has happened";
      }
  }
else
{
    echo "Error: " . $sql . "" . mysqli_error($conn);
} 
   	mysqli_close($conn);
}
?>