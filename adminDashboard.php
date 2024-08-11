<?php
session_start();

include 'backend/connection.php';

$users =0;
$paid = 0;
$unpaid=0;
$overDue=0;


$ContactNumber = array();
$FirstName = array();
$LastName = array();
$CustomerID = array();
$Address = array();



$sql = "SELECT * FROM customers";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {

    $users = $users+1;

    array_push($FirstName,$row["FirstName"]);
    array_push($LastName,$row["LastName"]);
    array_push($Address,$row["Address"]);
    array_push($CustomerID,$row["CustomerID"]);
    array_push($ContactNumber,$row["ContactNumber"]);

    }
  }

  $sql = "SELECT * FROM bills";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
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
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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



<!--table using bootstrap-->
<table class="table table-secondary table-striped"  id="table"style="width: 90%;" >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Customer ID</th>
      <th scope="col">First Name </th>
      <th scope="col">Last Name </th>
      <th scope="col">Address</th>
      <th scope="col">Contact Number</th>
      
    </tr>
  </thead>
  <tbody>

    <!--for loop for getting data from database and displaying in table form-->
  <?php

for($x  =0 ; $x < sizeof($FirstName);$x++)
{

?>
    <tr>
      <th scope="row"> <?php echo $x;?> </th>
      <td> <?php echo $CustomerID[$x]; ?></td>
      <td> <?php echo $FirstName[$x]; ?></td>
      <td> <?php echo $LastName[$x]; ?></td>
      <td> <?php echo $Address[$x]; ?></td>
      <td> <?php echo $ContactNumber[$x]; ?></td>
      
    </tr>

    <?php
}
?>
    </tbody>
</table>

<div
id="myChart" style="width:100%;max-width:100%; height:600px;">
</div>



<!--a pie chart using google visuals api-->
<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
const data = google.visualization.arrayToDataTable([
  ['Status', 'number'],
  ['Paid',<?php echo $paid;?>],
  ['UnPaid',<?php echo $unpaid;?>],
  ['Overpaid',<?php echo $overDue;?>]
]);

const options = {
  title:'Status',
  is3D:true,
  backgroundColor: '#dfecff',
  colors: ['#f2c6de','#c934de','#fd8a8a']

};

const chart = new google.visualization.PieChart(document.getElementById('myChart'));
  chart.draw(data, options);
}
</script>

</div>

</body>
</html>
