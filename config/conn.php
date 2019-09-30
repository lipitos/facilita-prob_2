<?php
    require __DIR__ . "/init.php";

    try{
        $pdo = new PDO(BD_DSN, BD_USER, BD_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e){
        echo "Connection failed: " . $e->getMessage();
        die();
    }