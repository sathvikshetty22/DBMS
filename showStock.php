<?php
$connect= mysqli_connect('localhost','root','','dbms');
if($connect->connect_error){
    die('connection failed'); 
}
$query ="SELECT * FROM bicycle";
$retval=mysqli_query($connect,$query);
?>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/operation_style.css">
<table class="table table-hover">
  <tr>
    <th>BId</th>
    <th>Bicycle Name</th>
    <th>Price(per 30 Min)</th>
    <th>Gear</th>
    <th>Stock</th>
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
<form action="oppage.html" method="POST">
    <input type="submit" class="button" value="Back" name="submit">
</form>
<?php
mysqli_close($connect); 
?>