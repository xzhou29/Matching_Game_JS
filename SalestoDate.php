<!DOCTYPE html>
<html>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cosc3380";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM SalestoDate";
$result = $conn->query($sql);

?>  

	 <div><h2>Sales to Date Report</h2> 
   <TABLE BORDER="1" BGCOLOR="CCFFFF" width='50%' cellspacing='1' cellpadding='0' bordercolor="black" border='1'>
            <TR>
             
                <TH bgcolor='#DAA520'> <font size='2'/>Product ID </TH>
                <TH bgcolor='#DAA520'><font size='2'/>Product Description</TH>
                <TH bgcolor='#DAA520'><font size='2'/>Ordered Quantity</TH>
            
            </TR>
             <?php 
                if ($result->num_rows > 0) {
     // output data of each row
			     while($row = $result->fetch_assoc()) {
                 ?> 
            <TR>
                <TD> <font size='2'/><center>
               <?php  echo "<br> ". $row["ProductID"] . "<br>"; ?>
                 </center></TD>

                <TD> <font size='2'/><center>
	 				<?php  echo "<br> ". $row["P_Name"] . "<br>"; ?>
                </center></TD>
                <TD> <font size='2'/><center>
                	 <?php  echo $row["OrderedQuantity"] ?>
                </center></TD>

            </TR>
            <?php
       			 }
       			}
	 		?>


        </TABLE>
<?php 
$conn->close();
?>   
</body>
</html>