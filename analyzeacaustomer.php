<?php
session_start();

include 'backend/connection.php';



$id = array();
$amount = array();
$datapoints = array();


$sql = "SELECT * FROM bills";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {

  

    array_push($id,$row["CustomerID"]);
    array_push($amount,$row["Amount"]);
    array_push($datapoints,array("x"=>$row["CustomerID"],"y"=>$row["Amount"]));
    

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
    <script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary" id="nav">
    <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <img src = "images/logo.png" id="logo" class="logo" width="80" height="70"/> 
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="adminDashboard.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="backend/logout.php">Logout</a>
        </li>
        
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<script>
  window.onload = function(){

    var chart = new CanvasJS.Chart("chart",{
      animationEnabled:true,
      exportEnabled:true,
      theme:"light1",
      title:{
        text:"Line chart"
      },axisY:{
        title:"Amount"
      },
      axisX:{
        title: "Customer ID"
      },
      data: [{
        type: "line",
        dataPoints: <?php echo json_encode($datapoints,JSON_NUMERIC_CHECK);?>
      }]
    });
    chart.render();
  }
</script>



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

<div id="chart" style="width:100%;max-width:75%"></div>

<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>



</div>

</body>
</html>
