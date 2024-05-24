<?php
session_start();

    if(! isset($_SESSION['sucess'])){
        die("<p>You aren´t logged in</p>");
    }
    echo "<p style=color:green>".htmlentities($_SESSION['sucess'])."</p>";
    unset($_SESSION['sucess']);
    echo "<h1>Welcome</h1>";

?>
<html>
    <body>
    <p><a href="viewCar.php">Go to the View Car</a></p>
    <p><a href="addCar.php">Go to the Add Car </a></p>
    <p><a href="logOut.php">Log Out </a></p>
    </body>
</html>