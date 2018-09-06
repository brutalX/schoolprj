<?php
       require('db.php');
    $username = $_GET["username"];
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
        $sql = "Select * From signup Where username like '%" .$username . "%' and 
        lastname like '%" . $lastname . "%'";
       

        if ($connection->connect_error){
            die("Connection failed" . $connection->connect_error);
        }
        else {
            $result = mysqli_query($connection,$sql);
            echo "<table><thead><tr><th>Username</th><th>Last Name</th>
                    <th>Last Login</th></tr></thead><tbody>";
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr><td>". $row['username'] . "</td><td>" 
                .$row['lastname']."</td><td>". $row['lastlogin'] ."</td></tr>";
            }
            echo "</tbody></table>";            
            mysqli_close($connection);   
                        
            
        }
                
    ?>

    <a href="searh.php" class="roundedrectangle">Go Back to Search....</a>

</body>
</html>