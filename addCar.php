<?php
require_once "/xampp/htdocs/demo/Michigan/thirdWeek/chalenge/pdo.php";
if (isset($_SESSION['email'])) {
    die("<p>First, Login</p>");
    header('location: login.php');
}
else{

    if (isset($_POST['make']) && isset($_POST['year']) && isset($_POST['mileage']) && isset($_POST['url_car'])) {
        $sql = "INSERT INTO cars(make, year, mileage,url_car) VALUES(:make, :year, :mileage, :url_car)";
        $stmt = $pdo->prepare($sql);
        if (filter_var($_POST['url_car'], FILTER_VALIDATE_URL) == false) {
            echo "<p>Incorrect URL</p>";
        } 
        else{
            $stmt->execute(
                array(
                    ':make' => $_POST['make'],
                    ':year' => $_POST['year'],
                    ':mileage' => $_POST['mileage'],
                    ':url_car' => $_POST['url_car']
                )
            );
            $_SESSION['success'] = "Record inserted";
            header("Location: viewCar.php");
            return;
        }
    }
}

?>

<html>

<body>
    <form method="post" style="margin-left: 10%;">
        <p>Make <input type="text" name="make"></p>
        <p>Year <input type="text" name="year"></p>
        <p>Mileage <input type="text" name="mileage"></p>
        <p>Url Car <input type="text" name="url_car"></p>
        <input type="submit">
    </form>
</body>

</html>