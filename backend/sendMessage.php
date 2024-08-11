<?php
session_start();
include 'connection.php';


   $CustomerID = 1111;
   $msg = $_POST['message'];
   $receiver = $_SESSION["CustomerID"];

   
        $sql = "INSERT  INTO query(messages,receiver,CustomerID) values('$msg','$receiver','$CustomerID')";
		
		if($conn->query($sql)===TRUE){
            header("Location: ../notifications.php");	
			 
		}else{
			$_SESSION['status'] = "Error Inserting Message";
			header("Location: ../error.php");			
		}
	

    ?>