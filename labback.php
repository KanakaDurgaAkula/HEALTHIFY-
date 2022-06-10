<?php
$server_name="localhost";
$username="root";
$password="";
$database_name="healithydb";
session_start();
$conn=mysqli_connect($server_name,$username,$password,$database_name);
//now check the connection
if(!$conn)
{
die("Connection Failed:" . mysqli_connect_error());
}
if(isset($_POST['save']))
{
    $name = $_POST['nam'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['addres'];
    $test = $_POST['test'];
    $test1=implode(",",$test);
    $sql_query = "INSERT INTO labtest (nam,phone,email,addres,test)
    VALUES ('$name','$phone','$email','$address','$test1')";
    
    if (mysqli_query($conn, $sql_query))
    {
        $receiver = $_POST['email'];
        $subject = "LAb Test conformation Mail";

       $message= "Hello $name
    Your LAb Test Booking has been done for $test1
                Our Agent will come to your location $address the following day.
                Thank you for choosing us!
                Regards:HEALTHIFY
                ";
    $sender = "FROM: kanakaakula112@gmail.com";

    if(mail($receiver,$subject,$message,$sender))
    {
    header("Location:home.html");
    }
    else{
        echo "Check internet connection or may be some issue with us email us if it is not resolved soon";
    }
}
    else
    {
    echo "Error: " . $sql . "" . mysqli_error($conn);
    }
mysqli_close($conn);
}
?>