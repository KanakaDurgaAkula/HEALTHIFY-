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
	 $pname2 = $_POST['pname2'];
	 $email = $_POST['email'];
	 $phone = $_POST['phone'];
	 $address2 = $_POST['address2'];
   $stomach = $_POST['stomach'];
   $kidney = $_POST['kidney'];
   $children = $_POST['children'];
   $eyes = $_POST['eyes'];
	 $dates =date('Y-m-d',strtotime($_POST['dates']));
   $gender = $_POST['gender'];
   $pregnancy = $_POST['pregnancy'];
	 
	 $sql_query = "INSERT INTO hos_app2 (pname2,email,phone,address2,stomach,kidney,children,eyes,dates,gender,pregnancy)
	 VALUES ('$pname2','$email','$phone','$address2','$stomach','$kidney','$children','$eyes','$dates','$gender','$pregnancy')";
   $query_run=mysqli_query($conn, $sql_query);
	 if($query_run)
    {
       $receiver = $_POST['email'];
        $subject = "Booking conformation from Janaki Hospital";
     if($kidney !='select')
      {
        $message = "Hello $pname1
      Your Appointment Booking has been done with NEPHROLOGIST for $dates during $kidney
      Kindly Stick to schedule if not contact for cancelation by emailing to
      kanakaakula112@gmail.com or by calling 9391364348
      Thank you for choosing us!
      Regards:HEALTHIFY";
      }
      else if($stomach !='select')
      {
        $message = "Hello $pname1
      Your Appointment Booking has been done with GASTROENTEROLOGY for $dates during $stomach
      Kindly Stick to schedule if not contact for cancelation by emailing to
      kanakaakula112@gmail.com or by calling 9391364348
      Thank you for choosing us!
      Regards:HEALTHIFY";
      }
      else if($childern !='select')
      {
        $message = "Hello $pname1
      Your Appointment Booking has been done with PEDIATRICIAN $dates for $children
      Kindly Stick to schedule if not contact for cancelation by emailing to
      kanakaakula112@gmail.com or by calling 9391364348
      Thank you for choosing us!
      Regards:HEALTHIFY";
      }
      else if($eyes !='select')
      {
        $message = "Hello $pname1
      Your Appointment Booking has been done for OPHTHAMOLOGIST $dates for $eyes
      Kindly Stick to schedule if not contact for cancelation by emailing to
      kanakaakula112@gmail.com or by calling 9391364348
      Thank you for choosing us!
      Regards:HEALTHIFY";
      }
      else{
        $message = "Hello $pname1
        Your Appointment Booking has been done for GYENACOLOGY $dates for $pregnancy
        Kindly Stick to schedule if not contact for cancelation by emailing to
      kanakaakula112@gmail.com or by calling 9391364348
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