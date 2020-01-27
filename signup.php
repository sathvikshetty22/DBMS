<?php

$connect= mysqli_connect('localhost','root','','dbms');
if($connect->connect_error){
    die('connection failed'); 
}
     if(isset($_POST['submit']))
     {
        $username= $_POST['uname'];
        $password= $_POST['password'];
        $name= $_POST['name'];
        $phno= $_POST['phno'];
        $add= $_POST['add'];
        $id= $_POST['id'];
        $sql="SELECT * from login_info where uname='$username'";
        $result = mysqli_query($connect,$sql);        
        if ($result-> num_rows>0)
        { 
            echo "<script>alert('Username already exists');
            window.location.href='signup.html';</script>";
        }
        else
        {
               
        $sq = "INSERT INTO login_info(uname,password) values('$username','$password')";
        mysqli_query($connect,$sq); 
        $sql = "INSERT INTO customer_details(uname,Name,phno,Address,ID_Proof) values('$username','$name','$phno','$add','$id')";     
        mysqli_query($connect,$sql);
        echo "<script>window.location.href='index.html';</script>";
        }
     }

 
?>
