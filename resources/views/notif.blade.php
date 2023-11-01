

<?php
    $mysqli = new mysqli("localhost", "galaxypay_backoffice", "galaxypay_backoffice123", "galaxypay_backoffice");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    }

    $result = $mysqli->query("SELECT * FROM notif_status WHERE read_notif = 0");
    
?>
<div id="toast-container"></div>


<script>
<?php
    $notifications = array();
    while ($row = $result->fetch_assoc()) {
        $notifications[] = $row;
    }
    $notifications_json = json_encode($notifications);
    $result->free();
    
    
    
    $upd = $mysqli->query("UPDATE notif_status SET read_notif = 1 WHERE read_notif = 0");
    
    
    
    $mysqli->close();
    

?>
var notifications = <?php echo $notifications_json; ?>;
var index = 0;
var colorr  = notifications[index].status;
var usecolor;

if(colorr == "Disabled"){
    var usecolor = "red";
}
else{
     var usecolor = "green";
}
    
    function showToast(message) {
    var toastContainer = document.getElementById("toast-container");

    var toast = document.createElement("div");
    toast.className = "toast";
    toast.textContent = message;
    toastContainer.appendChild(toast);
    toast.classList.add("show");
    toast.style.backgroundColor = usecolor;

    setTimeout(function() {
        toastContainer.removeChild(toast);
    }, 8000);
}



function displayNotifications() {
    if (index < notifications.length) {
        showToast(notifications[index].message);
        index++;
  
    }
}

// Display the notifications immediately when the script is executed
displayNotifications();

// Set up the interval to display notifications every 3 seconds
setInterval(displayNotifications, 1000);
</script>


    <style>
        /*Notification Alert*/
#toast-container {
    position: fixed;
    top: 60px;
    right: 10px;
    z-index: 999999999;
}
.toast {
    /* background: #F22125;
   background: linear-gradient(135deg, #F22125, #EA708B);*/
    /*background: #0BDA51;*/
    color: #fff;
    padding: 10px;
    border-radius: 4px;
    margin-bottom: 10px;
    opacity: 0;
    animation: fade-in 0.3s ease-in-out forwards;
}
.toast.show {
    opacity: 1;
}
@keyframes fade-in {
  0% {
    opacity: 0;
    transform: translateX(30px);
  }
  100% {
    opacity: 1;
    transform: translateX(0);
  }
}
    </style>
