<?php
$connect= mysqli_connect('localhost','root','','dbms');
if($connect->connect_error){
    die('connection failed'); 
}
$query ="SELECT * FROM logs_update";
$retval=mysqli_query($connect,$query);
?>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/operation_style.css">
<table class="table table-hover">
  <tr>
    <th>log id</th>
    <th>Username</th>
    <th>SignUp Date & Time</th>
  </tr>
  <tr>
    <?php
                  
                  if(mysqli_num_rows($retval)>0)
                  {
                    while($row=mysqli_fetch_array($retval))
                    {  
                      
                      ?>
                     
                     <tr>
                       <td><?php echo $row['log_id']; ?> &nbsp&nbsp</td> 
                       <td><?php echo $row['uname']; ?> &nbsp&nbsp</td> 
                       <td><?php echo $row['date']; ?> &nbsp&nbsp</td>                      
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