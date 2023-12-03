<?php
$server_name="localhost";
$username="root";
$password="";
$database_name="shopping website";
$conn=mysqli_connect($server_name,$username,$password,$database_name);
if(!$conn)
{
    die("Connection failed:" . mysqli_connect_error());
}
if(isset($_POST['save'])){
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $fullname=$_POST['fullname'];
    $addresss=$_POST['addresss'];
    $city=$_POST['city'];
    $country=$_POST['country'];
    $code=$_POST['code'];
    $sql_query="INSERT INTO  finalpage(email,phone,fullname,addresss,city,country,code)
    VALUES ('$email','$phone','$fullname','$addresss','$city','$country','$code')";
    if(mysqli_query($conn,$sql_query)){
        echo "address registered successfully,proceeding to payment page...........";
        }
        else{
            echo "error:" .$sql. "".mysqli_error($conn);
        }
        mysqli_close($conn);
}
?>