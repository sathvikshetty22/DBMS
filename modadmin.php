<html>
<body>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/operation_style.css">
<form action="" method="post">
<h2>Bicycle Name : Hercules</h2>
<table border="0" cellpadding="5" cellspacing="0">
<tr> <td style="width:40%">
<label><b>BId:</b></label>
<input class="form-control" name="BId" type="text" >
</td> </tr> <tr> <td colspan="2">
<br><br>
<label><b>Price:</b></label>
<input class="form-control" name="Price" type="text" ><br><br>
</td> </tr> <tr> <td colspan="2">
<label><b>Stocks:</b></label>
<input class="form-control" name="Stock" type="text" ><br><br>
</td> </tr> <tr> <td colspan="2">
<input class="button" name="submit" type="submit" value="submit"><br><br>
<input action="action" class="button" onclick="window.location.href='oppage.html'; return false;" type="button" value="Back" />
</form>
</body>
</html>
<?php
$connect= mysqli_connect('localhost','root','','dbms');
if($connect->connect_error){
    die('connection failed'); 
}
if(isset($_POST['submit'])){ 
    $BId = $_POST['BId'];
    $Price = $_POST['Price'];
    $Price1 = $Price*2;
    $Price2 = $Price*3;
    $Price3 = $Price*4;
    $Stock = $_POST['Stock'];
    $sql0="CALL p('$BId')";
    $retval=mysqli_query( $connect,$sql0);
    $row=mysqli_fetch_array($retval);
    $gear= $row['Gears'];
    $sql = "UPDATE bicycle SET Price='$Price',Stock='$Stock' WHERE BId='$BId'";
    mysqli_query( $connect,$sql);
    $sql1 = "UPDATE cost SET rent_amt='$Price' WHERE time=30 AND Gears='$gear'";
    mysqli_query( $connect,$sql1);
    $sql2 = "UPDATE cost SET rent_amt='$Price1' WHERE time=60 AND Gears='$gear'";
    mysqli_query( $connect,$sql2);
    $sql3 = "UPDATE cost SET rent_amt='$Price2' WHERE time=90 AND Gears='$gear'";
    mysqli_query( $connect,$sql3);
    $sql4 = "UPDATE cost SET rent_amt='$Price3' WHERE time=120 AND Gears='$gear'";
    mysqli_query( $connect,$sql4);
    echo "<script>window.location.href='oppage.html';</script>";
}
mysqli_close($connect); 
?>