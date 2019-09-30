<?php

$erros = false;
$erros_validacao = [];

$leasing = new Leasing();

if(is_post()){
    if(array_key_exists('book', $_POST) && $_POST['book'] <> 0){
        $leasing->setId_book($_POST['book']);
    }else{
        $erros = true;
        $erros_validacao['book'] = 'Selecione um livro';
    }

    if(array_key_exists('type', $_POST) && $_POST['type'] <> 0){
        $leasing->setId_type($_POST['type']);
    }else{
        $erros = true;
        $erros_validacao['type'] = 'Selecione um tipo de reserva';
    }

    $today = date('Y-m-d');

    if($_POST['type'] == 1){
        $date_out = date('Y-m-d', strtotime("+3 days",strtotime($today)));
    }else if ($_POST['type'] == 2){
        $date_out = date('Y-m-d', strtotime("+10 days",strtotime($today)));
    }

    $leasing->setDate($date_out);

    if(!$erros){
        $leasing_model->save($leasing);
        header('Location: index.php?router=leasing&view=listLeasings&aviso=ok');
    }
}

$leasings = $leasing_model->search();
require __DIR__ . "/../view/template.php";
