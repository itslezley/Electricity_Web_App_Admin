
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



<div class="centre">
    <h2> Update</h2>
<form action="backend/createBill.php" method="POST">
<div class="text">
            <input type="text" id="id" name="id" required>
            <span></span>
            <label for="id">Customer ID:</label>
            </div>
    
            <div class="text">
                <input type="text" id="amount" name="amount" required>
                <span></span>
                <label for="amount">Amount to pay:</label>
                </div>
        
                <div class="text">
                    <input type="text" id="billDate" name="billDate" required>
                    <span></span>
                    <label for="billDate">Bill Date:</label>
                    </div>
        
                    <div class="text">
                        <input type="text" id="dueDate" name="dueDate" required>
                        <span></span>
                        <label for="dueDate">Due Date:</label>
                        </div>

        
        <div class="text">
            <input type="text" id="status" name="status" required>
            <span></span>
            <label for="status">Status :</label>
            </div>
    
            
            <input type="submit" value="Update">

</form>
</div>

</div>

</body>
</html>
