<?php
session_start();

include 'backend/connection.php';

$users =0;
$paid = 0;
$unpaid=0;
$overDue=0;

$Amount = array();
$BillDate = array();
$DueDate = array();
$CustomerID = array();
$Status = array();


$sql = "SELECT * FROM bills";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {

        $users++;

    array_push($Amount,$row["Amount"]);
    array_push($BillDate,$row["BillingDate"]);
    array_push($DueDate,$row["DueDate"]);
    array_push($CustomerID,$row["CustomerID"]);
    array_push($Status,$row["Status"]);

    if(strcmp($row["Status"],"Paid") == 0)
    {
        $paid++;
    }else if (strcmp($row["Status"],"Unpaid") == 0)
    {
        $unpaid++;
    }else{
        $overDue++;
    }

    }
  }
  $conn->close();
  

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    

    <link rel="stylesheet" href="css/notification.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script>
		$(document).ready(function(){
			$(".profile .icon_wrap").click(function(){
			  $(this).parent().toggleClass("active");
			  $(".notifications").removeClass("active");
			});

			$(".notifications .icon_wrap").click(function(){
			  $(this).parent().toggleClass("active");
			   $(".profile").removeClass("active");
			});

			$(".show_all .link").click(function(){
			  $(".notifications").removeClass("active");
			  $(".popup").show();
			});

			$(".close").click(function(){
			  $(".popup").hide();
			});
		});
	</script>
    



</head>
<body>


<div class="wrapper">
<?php

include 'includes/navbar.php';



?>
<div class="chip">
  <img src="images/user.png" alt="Person" width="96" height="96">
  Users : <?php echo $users; ?>
</div>
<div class="chip">
  <img src="images/user.png" alt="Person" width="96" height="96">
  Unpaid : <?php echo $unpaid; ?>
</div>
<div class="chip">
  <img src="images/user.png" alt="Person" width="96" height="96">
  Paid : <?php echo $paid; ?>
</div>
<div class="chip">
  <img src="images/user.png" alt="Person" width="96" height="96">
  Over Due : <?php echo $overDue; ?>
</div>

<table class="table table-secondary table-striped"  id="table"style="width: 90%;" >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Customer ID</th>
      <th scope="col">Billing Date </th>
      <th scope="col">Due Date </th>
      <th scope="col">Amount</th>
      <th scope="col">Status </th>
      
    </tr>
  </thead>
  <tbody>
  <?php

for($x  =0 ; $x < sizeof($CustomerID);$x++)
{

?>
    <tr>
      <th scope="row"> <?php echo $x;?> </th>
      <td> <?php echo $CustomerID[$x]; ?></td>
      <td> <?php echo $BillDate[$x]; ?></td>
      <td> <?php echo $DueDate[$x]; ?></td>
      <td> R<?php echo $Amount[$x]; ?></td>
      <td> <?php echo $Status[$x]; ?></td>
      
    </tr>

    <?php
}
?>
    </tbody>
</table>




</div>
</body>
</html>
