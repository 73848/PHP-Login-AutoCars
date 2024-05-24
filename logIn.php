<?php
    require_once "/xampp/htdocs/demo/Michigan/thirdWeek/chalenge/pdo.php";
    session_start();
    if(isset($_POST['email']) && isset($_POST['pw']))
    {
        $sql = 'SELECT email, password FROM users WHERE email= :email AND password= :pw';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':email'=> $_POST['email'],
            ':pw'=> $_POST['pw']
        ));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row){
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['pw'] = $_POST['pw'];
            $_SESSION['sucess']= 'Sucess login';
            header('location: autoCarApp.php');
            return;
        }else{

            if(empty($_POST['email']) && empty($_POST['pw'])){
                $_SESSION['error'] = 'Email and password are required';
            }
            else if( filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)==false){
                $_SESSION['error'] = 'Email must have an at-sign (@)';
            }
            else if($_POST['pw']!=':p'){
                $_SESSION['error'] = 'Incorrect password';
            }
            else{
                $_SESSION['error'] = 'Login doesn´t exists';
            }
            }
            header('location: logIn.php');
            return;
    }
?>

<html>
    <body>
        <?php 
        if(isset($_SESSION['error'])){
            echo "<p style=color:red>".htmlentities($_SESSION['error'])."</p>";
            unset($_SESSION['error']);
        }
        ?>
        <h1>Clemerson</h1>
        <form method="post" style="margin-left: 5%;">
            <p>Email: <input type="text" name="email"></p>
            <p>Password: <input type="text" name="pw"></p>
            <input type="submit">
        </form>
        </body>
</html>