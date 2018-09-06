
<!DOCTYPE html>
<html>
<head>
    <script src="../js/myscript.js"></script>
    <link href="../css/mycss.css" rel="stylesheet">
</head>
<body>
<form action="searchform.php" method="GET">

    <fieldset>
        <legend>
        Search Form
        </legend>
        <label> UserName:</label>
        <input type="text" name="username" placeholder="Username">
        <label> Last Name:</label>
        <input type="text" name="lastname" placeholder="Last Name">
        <input type="submit" value="Search!" name="submit">
    </fieldset>
    <a href="index.php" class="roundedrectangle">Go Back to Login ....</a>
</form>
</body>
</html>

