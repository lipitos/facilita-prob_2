<?php

require "../model/ModelLeasing.php";
require "../model/Leasing.php";
require "../config/conn.php";

$leasing = new Leasing();
$leasing_model = new ModelLeasing($pdo);

$id = $_GET['id'];

if(isset($id) && !empty($id)){
    $leasing = $leasing_model->delete($id);
    header('Location: ../index.php');
}
