<?php


$connect = new mysqli('localhost','root','','dbms');
if($connect->connect_error){
    die('connection failed bruh'); 
} else 
     echo 'connect worked';
   
  $username= $_POST['uname'];
  $password= $_POST['password'];

  
 
  $sql="SELECT * from login_info where uname='$username' AND password='$password'";


  $result = mysqli_query($connect,$sql);
  
  
  
    if ($result-> num_rows>0)
    { 
        $logged_in_user = mysqli_fetch_assoc($result);
        if ($logged_in_user['uname'] == 'admin') 
        {
            header('location: oppage.html');
        }
        else
        {
            header("location:select.php?varname=$username");
        }
    }
  else {
      
     echo "<script>alert('Enter valid Username or Password');
      window.location.href='login.html';</script>";
      
  }
?>