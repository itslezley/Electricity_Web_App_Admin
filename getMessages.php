<?php

session_start();
include 'backend/connection.php';
$arrayID =str_split($_POST['CustomerID'],12);

$CustomerID = "".$arrayID[1];
$_SESSION["CustomerID"] = $CustomerID;

$query = "SELECT * FROM query WHERE CustomerID='$CustomerID' OR receiver='$CustomerID'";
    $result = $conn->query($query);

    


?>


<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <!--things u need in every page-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/chatbot.css">
    <link rel="stylesheet" href="css/chatbot.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

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

<div class="centreChat">
<h2 >Chat with <?php echo $CustomerID?></h2>
<div class="bodyMessage">
  <?php
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
    
      if($row['receiver'] ==$CustomerID)
      {
   
?>
<div class="container" id="reciver">
  <img src="/images/admin.png" alt="Avatar" style="width:100%;">
  <p><?php echo $row['messages'];?></p>
  <span class="time-right"> <?php echo $row['date'];?> </span>
</div>


<?php
      }else{
      ?>


<div class="container darker">
  <img src="/images/user.png" alt="Avatar" class="right" style="width:100%;">
  <p><?php echo $row['messages'];?></p>
  <span class="time-left"><?php echo $row['date'];?> </span>
</div>

<?php
      }
}

}else{
?>



<?php } ?> 


</div>

<form action="backend/sendMessage.php" method="POST">
<div class="mb-2">
  <input type="text" name="message" class="form-control" id="exampleFormControlInput1" placeholder="type here.....">
  <button type="submit" class="btn" id="btnSend">Send</button>
</div> 
</form>

</div>
</div>

  <script src="javascript/chat.js"></script>

</body>
</html>
