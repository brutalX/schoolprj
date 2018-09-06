<?php
    require('db.php');
    $username = $_GET["username"];
    $password = $_GET["password"];
    $name = $_GET["name"];
    $lastname = $_GET["lastname"];
    
?>

<!DOCTYPE html>
<html>
<head>
    <script src="../js/myscript.js"></script>
    <link href="../css/mycss.css" rel="stylesheet">
</head>
<body>  
    <?php
            if (empty($username) || empty($password) 
            || empty($name) || empty($lastname))
            {
                echo '<script> setTimeout(func,6000);
                var countDownInterval = setInterval(countDownFunc,1000);
                var counter = 5;
                function countDownFunc(){
                    document.getElementById("countDown").innerHTML = counter--;
                }
                function func(){
        window.history.back(); }</script>
        
        <p>At least one of the fields is empty going back in <span id="countDown">6</span></p>';
             
            }
            else {
   
                if ($connection->connect_error){
                    die("Connection failed" . $connection->connect_error);
                }

                $timestamp = time();
                $dateTimeFormat = 'Y-m-d H:i:s';
                $date = new \DateTime();
                $date->setTimestamp($timestamp);

                $sql = "Insert into signup(username,password,name,lastname,lastlogin)
                            values('" . $username ."','" . $password ."','" . $name 
                            ."','" . $lastname ."' ,'".$date->format($dateTimeFormat)
                            ."')";
                
                if (mysqli_query($connection,$sql)){
                    echo 'Successfully signed up!<br>
                         <a href="signup.php" class="roundedrectangle">Go back</a>';
                }else {
                    echo '<script> setTimeout(func,3000);
                    var countDownInterval = setInterval(countDownFunc,1000);
                    var counter = 2;
                    function countDownFunc(){
                        document.getElementById("countDown").innerHTML = counter--;
                    }
                    function func(){
                        window.history.back(); 
                    }</script>
            
                        <p>Username <span class="bluespan">' . $username . '</span>
                         has been taken... going back in <span id="countDown">3</span></p>';
                 
                }
                mysqli_close($connection);
                // ready to connect to database;
            }
    ?>
</body>
</html>