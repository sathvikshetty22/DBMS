<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Select</title>
    <style type="text/css">
.right {text-align: right;
}
</style>
<form align="right" name="form1" method="post" action="index.html">
  <label class="logout_lb">
<input type="submit" name="submit1" value="log out">
</label>
</form>
<h2>Select your Bicycle</h2>
</head>
<body bgcolor="#FFFF" center>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/operation_style.css"><br>
<form action="" method="POST" onsubmit="return ValidateForm(this);">
<script type="text/javascript">
function ValidateForm(frm) {
if (frm.Time.value == "") { alert('Select Time.'); frm.Time.focus(); return false; }
return true; }
</script>
<label><b>Bicycle Name: Hercules</b></label><br />
<table border="0" cellpadding="5" cellspacing="0">
  <tr> <td colspan="2">
    <label for="Gear"><b>Gears*</b></label><br />
    <input name="Gear" type="radio" class="from-control" value="Yes" checked="checked" /> Gear
    <input name="Gear" type="radio" class="from-control" value="No" /> Non-Gear
  </td> </tr>
  <tr> <td colspan="2">
    <label for="Time"><b>Time*</b></label><br />
    <select name="Time" class="form-control">
      <option value="30">30</option>
      <option value="60">60</option>
      <option value="90">90</option>
      <option value="120">120</option>
    </select>
  </td> </tr>
</table>
<input type="submit" class="button" value="submit" name="submit">
</form>
</div>
</body>
</html>
<?php
$connect= mysqli_connect('localhost','root','','dbms');
if($connect->connect_error){
  die('connection failed'); 
}
$sql ='SELECT * FROM bicycle';
$retval = mysqli_query($connect,$sql);
if(! $retval )
{
  die('Could not get data: ' . mysqli_error());
}

?>
  <h2>Bicycle Menu</h2>
<table class="table table-hover">
  <tr>
    <th>Bicycle Name</th>
    <th>Price(30 min)</th>
    <th>Gears</th>
    <th>Stock</th>
  </tr>
  <tr>
    <?php
                  
                  If(mysqli_num_rows($retval)>0)
                  {
                    while($row=mysqli_fetch_array($retval))
                    {  
                      
                      ?>
                     
                     <tr>
                       
                       <td><?php echo $row['Name']; ?> &nbsp&nbsp</td> 
                       <td><?php echo $row['Price']; ?> &nbsp&nbsp</td> 
                       <td><?php echo $row['Gears']; ?> &nbsp&nbsp</td> 
                       <td><?php echo $row['Stock']; ?> &nbsp&nbsp</td> 
                       
                      </tr> 
                      
                      <?php
                
              }
            }
            ?>

</tr>
</table>
<?php
     if(isset($_POST['submit']))
     {
       $gear= $_POST['Gear'];
       $time= $_POST['Time'];
       $username = $_REQUEST['varname'];
       $sql0="SELECT * from customer_details where uname='$username'";
       $result0 = mysqli_query($connect,$sql0);
       $sql1="SELECT BId,Stock from bicycle where Name='Hercules' and Gears='$gear'";
       $result = mysqli_query($connect,$sql1);
       $sql2="SELECT rent_amt from cost where time='$time'";
       $result1 = mysqli_query($connect,$sql2);
       $row1=mysqli_fetch_array($result);      
       $row0=mysqli_fetch_array($result0);      
         $row2=mysqli_fetch_array($result1);  
         $bid=$row1['BId'];    
         $name=$row0['Name'];    
         $phno=$row0['phno'];    
         $id=$row0['ID_Proof'];    
         $stock=$row1['Stock'];
         if($stock=='Out of stock')
         {
            echo "<script>alert('Bicycle Out of Stock');</script>";
         }
         else{
            $stock=$stock-1;
            if($stock<=0)
                $stock='Out of stock';    
            $amt=$row2['rent_amt'];    
            $sq = "INSERT INTO time(uname,BId,Name,phno,ID_Proof,time,cost,Payment) values('$username','$bid','$name','$phno','$id','$time','$amt','Pending')";
            mysqli_query($connect,$sq); 
            $sql3="UPDATE bicycle set Stock='$stock' where BId='$bid'";
            mysqli_query($connect,$sql3); 
            echo "<script>window.location.href='timer.php?var=$username&t=$time';</script>";
         }
      }      
        mysqli_close($connect);
        
?>

