<?php 
   session_start();
   if(strpos($_SERVER['HTTP_REFERER'], 'form.php') != false){
       if(session_status() == 2){
           session_destroy();
           echo '<script>document.write(\'<span class="greenspan"> Logged out</span>\')</script>';
       } 
   }
   else if(session_status() == 2){
        echo '<script>document.write(\'<span class="greenspan">Logged out!</span>\');
            </script>';
   }
?>

<!DOCTYPE html>

<html>
<head>
    <script src="../js/myscript.js"></script>
    <link href="../css/mycss.css" rel="stylesheet">
</head>
<body>
<form action="form.php" method="GET">

    <fieldset>
        <legend>
        Login Form
        </legend>
        <label> UserName:</label>
        <input type="text" name="username" placeholder="username">
        <label> Password:</label>
        <input type="password" name="password" placeholder="password">
        <input type="submit" value="Login!" name="submit">
       
    </fieldset>
     
        <a href="signup.php" class="roundedrectangle" >Sign Up</a>
        <a href="search.php" class="roundedrectangle" >Search Up</a>
</form>
</body>
</html>

