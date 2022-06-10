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
	 $pname1 = $_POST['pname1'];
	 $email = $_POST['email'];
	 $phone = $_POST['phone'];
	 $address1 = $_POST['address1'];
   $heart = $_POST['heart'];
   $kidney = $_POST['kidney'];
   $bones = $_POST['bones'];
   $eye = $_POST['eye'];
	 $dates =date('Y-m-d',strtotime($_POST['dates']));
   $gender = $_POST['gender'];
   $pregnancy = $_POST['pregnancy'];
	 
	 $sql_query = "INSERT INTO hos_app1 (pname1,email,phone,address1,heart,kidney,bones,eye,dates,gender,pregnancy)
	 VALUES ('$pname1','$email','$phone','$address1','$heart','$kidney','$bones','$eye','$dates','$gender','$pregnancy')";

    $query_run=mysqli_query($conn, $sql_query);

	 if($query_run)
    {
      $receiver = $_POST['email'];
      $subject = "Booking conformation from JANAKI Hospital";
      if($heart !='select')
      {
        $message = "Hello $pname1
      Your Appointment Booking has been done with CARDIOLOGIST for  $dates during $heart
      Kindly Stick to the schedule if not contact for cancelation by emailing to
      kanakaakula112@gmail.com or by calling 91+9391364348
      Thank you for choosing us!
      Regards:HEALTHIFY";
      }
       else if($eye !='select')
      {
        $message = "Hello $pname1
      Your Appointment Booking has been done with NEPHROLOGIST for $dates during $eye
      Kindly Stick to the schedule if not contact for cancelation by emailing to
      kanakaakula112@gmail.com or by calling 91+9391364348
      Thank you for choosing us!
      Regards:HEALTHIFY";
      }
      else if($bones !='select')
      {
        $message = "Hello $pname1
      Your Appointment Booking has been done with ORTHOPEDIC $dates for $bones
      Kindly Stick to the schedule if not contact for cancelation by emailing to
      kanakaakula112@gmail.com or by calling 91+9391364348
      Thank you for choosing us!
      Regards:HEALTHIFY";
      }
      else if($kidney !='select')
      {
        $message = "Hello $pname1
      Your Appointment Booking has been done for OPHTHAMOLOGIST $dates for $kidney
      Kindly Stick to the schedule, if not contact for cancelation by emailing to kanakaakula112@gmail.com or by calling 91+9391364348
      Thank you for choosing us!
      Regards:HEALTHIFY";
      }
       else if($pregnancy !='select')
      {
        $message = "Hello $pname1
        Your Appointment Booking has been done for GYENACOLOGY $dates for $pregnancy
        Kindly Stick to schedule if not contact for cancelation by emailing to
      kanakaakula112@gmail.com or by calling 91+9391364348
        Thank you for choosing us!
      Regards:HEALTHIFY";
      }
      
      $sender = "FROM: kanakaakula112@gmail.com";
      if(mail($receiver,$subject,$message,$sender))
      {
        header("Location:home.html");
      }
      else{
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