<?php
       require('db.php');
    $username = $_GET["username"];
    $password = $_GET["password"];
  
?>

<!DOCTYPE html>
<html>
<head>
    <script src="../js/myscript.js"></script>
    <link href="../css/mycss.css" rel="stylesheet">
</head>
<body>  
        <?php 
         $sql = 'Select * From signup Where username = "' .$username . '" and 
         password = "' . $password . '"';
         
       
         if ($connection->connect_error){
            die("Connection failed" . $connection->connect_error);
        }
        else {
            $result = mysqli_query($connection,$sql);
            if ($row = mysqli_fetch_assoc($result)){
                $timestamp = time();
                $dateTimeFormat = 'Y-m-d H:i:s';
                $date = new \DateTime();
                $date->setTimestamp($timestamp);
                
                $updateTimeStampSQL ="Update signup set lastlogin='" .$date->format($dateTimeFormat)
                ."' where username='".$username ."'";
                mysqli_query($connection,$updateTimeStampSQL);
                // echo $row['last login']; 
                echo "Logged in successfully! It's been "
                . getLastLoginTime(time(),strtotime($row['lastlogin'])) ." seconds since you last logged in";
             
                session_start();
                setcookie('username',$username,strtotime('+2 minutes'),'/');

                session_set_cookie_params(2 * 60, '/');
              

            }
            else 
            {
            echo '<script> setTimeout(func,6000);
                    var countDownInterval = setInterval(countDownFunc,1000);
                    var counter = 5;
                    function countDownFunc(){
                        document.getElementById("countDown").innerHTML = counter--;
                    }
                    function func(){
            window.history.back(); }</script>
            
            <p>username and password combination is wrong going back in <span id="countDown">6</span></p>';
            }
        }
       ?>
       <br> 
        
       
       <?php
        echo '<a href="index.php" class="roundedrectangle">Logout</a>';
        session_unset();
        session_destroy();
       ?>
</body>
</html>