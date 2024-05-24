<?php
    require_once "/xampp/htdocs/demo/Michigan/thirdWeek/chalenge/pdo.php";
    session_start();
    if(! isset($_SESSION['email'])){
        echo "<p> Login First</p>";
        header('location: login.php');
    }
    else{
        $sql = 'SELECT * FROM cars';
        $stmt = $pdo->query($sql);
    };
?>
<html>
    <body>
        <table>
        <?php         
        while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>";
            echo ($row['make']);
            echo ("</td><td>");
            echo ($row['year']);
            echo ("</td><td>");
            echo ($row['mileage']);
            echo ("</td><td>");
            echo "<a href=".$row['url_car'].">Site OF ".$row['make']."</a>";
        }    
?>
        </table>
    </body>
</html>