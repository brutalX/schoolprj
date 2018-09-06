<!DOCTYPE html>
<html>
<head>
    <script src="../js/myscript.js"></script>
    <link href="../css/mycss.css" rel="stylesheet">
</head>
<body>
<form action="signupform.php" method="GET">
    <fieldset>
        <legend>
        Signup Form
        </legend>
        <label> UserName:</label>
        <input type="text" name="username" placeholder="username">
        <label> Password:</label>
        <input type="password" name="password" placeholder="password"><br>
        <label> First name:</label>
        <input type="text" name="name" placeholder="First name">
        <label> Last name:</label>
        <input type="text" name="lastname" placeholder="Last Name"><br>
        <input type="submit" value="Signup!" name="submit">
       
    </fieldset>
    <a href="index.php" class="roundedrectangle">Go Back to Login ....</a>
</form>
</body>
</html>
