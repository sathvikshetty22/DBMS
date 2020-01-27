<?php
$connect= mysqli_connect('localhost','root','','dbms');
if($connect->connect_error){
    die('connection failed'); 
}
$query ="SELECT * FROM time";
$retval=mysqli_query($connect,$query);
?>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/operation_style.css">
<table class="table table-hover">
  <tr>
    <th>BId</th>
    <th>Customer Name</th>
    <th>Id_Proof</th>
    <th>Phone_no</th>
    <th>Time</th>
    <th>Cost</th>
    <th>Payment</th>
  </tr>
  <tr>
    <?php
                  
                  if(mysqli_num_rows($retval)>0)
                  {
                    while($row=mysqli_fetch_array($retval))
                    {  
                      
                      ?>
                     
                     <tr>
                       
                       <td><?php echo $row['BId']; ?> &nbsp&nbsp</td> 
                       <td><?php echo $row['Name']; ?> &nbsp&nbsp</td> 
                       <td><?php echo $row['ID_Proof']; ?> &nbsp&nbsp</td> 
                       <td><?php echo $row['phno']; ?> &nbsp&nbsp</td> 
                       <td><?php echo $row['time']; ?> &nbsp&nbsp</td> 
                       <td><?php echo $row['cost']; ?> &nbsp&nbsp</td> 
                       <td><?php echo $row['Payment']; ?> &nbsp&nbsp</td> 
                       
                      </tr> 
                      
                      <?php
                
              }
            }
            ?>

</tr>
</table>
<form action="oppage.html" method="POST">
    <input type="submit" class="button" value="Back" name="submit">
</form>
<?php
mysqli_close($connect); 
?>