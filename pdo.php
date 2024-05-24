<?php
    $pdo = new PDO('mysql:host=localhost;port==3030;dbname=auto_car', 'thomas', 'zap');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>