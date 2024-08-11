
<?php

include 'backend/connection.php';


$query = "SELECT * FROM feedback ";
$query2 = "SELECT * FROM feedback WHERE status = 'Unread'";
    $result = $conn->query($query);
    $result2 = $conn->query($query);
    $result3 = $conn->query($query2);


    $num_rows = mysqli_num_rows($result3);
    if($num_rows > 0){
        ?>
        <script>
        
        var divide = document.getElementById("count");
         if (divide.style.display === "block") {
        divide.style.display = "block";
        } else {
         divide.style.display = "none";
  }
  
  </script>

<?php 
    }
else{

            
?> 
<script>
        
        var divide = document.getElementById("count");
         if (divide.style.display === "block") {
        divide.style.display = "block";
        } else {
         divide.style.display = "none";
  }
  
  </script>
<?php
    }
 
?>


  <div class="navbar">
    <div class="navbar_left">
      <div class="logo">
      <a href = "adminDashboard.php"> <img src = "images/logo2.png" id="logo" class="logo" width="80" height="60"/> </a>

    </div>
    </div>

    <div class="navbar_right">
    <div class="notifications"> 
        <div class="icon_wrap"><a href= "chat.php"   target="_blank">  <i class="far fa-comment-dots"><span class="count" id="count"></span></i></a></div>
    </div>
      <div class="notifications"> 
        <div class="icon_wrap"><i class="far fa-bell"><span class="count" id="count"></span></i></div>
        
        <div class="notification_dd">
            <ul class="notification_ul">
            <?php
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
    
     
?>
                <li class="starbucks success">
                    <div class="notify_icon">
                        <span class="icon"><img src="../images/profiles/<?php echo $row['profile'];?>"></span>  
                    </div>
                    <div class="notify_data">
                        <div class="title">
                           <?php echo $row['email']; ?>   
                        </div>
                        <div class="sub_title">
                        <?php echo $row['message']; ?> 
                      </div>
                    </div>
                </li>  
               
                <?php
      }
}


?>
     <li class="show_all">
                    <p class="link">Show All Activities</p>
                </li>
            </ul>
        </div>
        
      </div>
      <div class="profile">
        <div class="icon_wrap">
          <img src="images/admin.png" alt="admin">
          <span class="name">Admin</span>
          <i class="fas fa-chevron-down"></i>
        </div>

        <div class="profile_dd">
          <ul class="profile_ul">

            <li><a class="address" href="createBill.php"><span class="picon"><i class="fas fa-map-marker"></i></span>Create Bills</a></li>
            <li><a class="settings" href="viewBills.php"><span class="picon"><i class="fas fa-cog"></i></span>View Bills</a></li>
            <li><a class="settings" href="analyzeacaustomer.php"><span class="picon"><i class="fas fa-cog"></i></span>Analyze Bills</a></li>
            <li><a class="settings" href="createReading.php"><span class="picon"><i class="fas fa-cog"></i></span>Create Readings</a></li>            <li><a class="logout" href="backend/logout.php"><span class="picon"><i class="fas fa-sign-out-alt"></i></span>Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  
  <div class="popup">
    <div class="shadow"></div>
    <div class="inner_popup">
        <div class="notification_dd">
            <ul class="notification_ul">
                <li class="title">
                    <p>All Notifications</p>
                    <p class="close"><i class="fas fa-times" aria-hidden="true"></i></p>
                </li>
                
                <?php
if ($result2->num_rows > 0) {
    // output data of each row
    while($row = $result2->fetch_assoc()) 
    {
    
     
?>
                <li class="starbucks success">
                    <div class="notify_icon">
                        <span class="icon"><img src="../images/profiles/<?php echo $row['profile'];?>" height="40" width="40"></span>  
                    </div>
                    <div class="notify_data">
                        <div class="title">
                        <?php echo $row['email']; ?>   
                        </div>
                        <div class="sub_title">
                        <?php echo $row['message']; ?> 
                      </div>
                    </div>
                </li> 
     
                <?php
      }
}


?>
                            </ul>
        </div>
    </div>
  </div>
  


