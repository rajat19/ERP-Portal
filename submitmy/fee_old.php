<h2>FEE DETAILS</h2><br>
<div class="panel panel-success" style="width:95%">
      <div class="panel-heading"><b>FEE DETAILS</b><br /></div>
      <div class="panel-body">
	  <?php 
include 'php/connect.inc.php';
$sql = "SELECT sem, currency, amount,discount,n_paid,dues FROM fee";
$result = mysqli_query($conn, $sql);
echo "
	  <table style='width:100%'>
	  <tr style='background-color:#E3CCA8;'>
	  <td>SEMESTER</td>
	  <td>Fee Currency</td>
      <td>Fee Amount</td>
	  <td>Discount</td>  
	  <td>NET PAID</td>
	  <td>Dues(if any)</td>
	  </tr>
	  ";
// if ($result->num_rows > 0) {
     // output data of each row
     while($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
	  echo"<tr>
	  <td> ". $row["sem"]. "</td><td> ". $row["currency"]. "</td><td>  <a href='#'>". $row["amount"] . "</a></td><td> ". $row["discount"] ."</td><td>". $row["n_paid"] ."</td><td>".$row["dues"]."</td></tr>
	  
	";
     }
	 echo"</table>";
// } else {
//      echo "0 results";
// }
echo"<marquee>Click on amount to view details</marquee>";
// $conn->close();
?>  


	  </div></div>