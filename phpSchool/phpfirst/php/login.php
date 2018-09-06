<?php 
    $username = $_GET['username'];
    $password  = $_GET['password'];
    $servername =  "localhost";
    $serveruser =  "root";
    $serverpw = "";
    $db = "phpprog";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/style.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../js/script.js"></script>
</head>
<body>
    <?php 

    $sql = 'SELECT * FROM signup WHERE username = "' .$username. '" and password = "' .$password. '" ';
    
   


    $connection = new mysqli($servername,$serveruser,$serverpw,$db);
        if($connection->connect_error){
            die("Connection failed". $connection->connection_error);
        }else{
          
            $result = mysqli_query($connection,$sql);
            if($row = mysqli_fetch_assoc($result)){
            echo  '<p> LOGIN SUCCESSFUL </p>';
            
            // $date = date('Y-m-d H:i:s');
            // echo $date; 
            // $sqlupdate = 'UPDATE signup SET lastlogin = "'.$date.'" WHERE username = "' .$username. '" and password = "' .$password. '" ';
            // echo $sqlupdate;
            // die();
            // mysqli_query($connection,$sqlupdate);
                
            }else{
                if (empty($username) && empty($password)){
                    echo "<script> setTimeout(func,3000);
                    function func(){
                        window.history.back();
                    }
                    </script>";
                    echo "username and password should be fill";
                }
                else{
                    echo "<script> setTimeout(func,3000);
                    function func(){
                        window.history.back();
                    }
                    </script>";
                    echo "WRONG PASSWORD";
                }
        }
  
        mysqli_close($connection);       
    }
    
    
    ?>
</body>
</html>    