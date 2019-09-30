<?php

function is_post(){
        if(count($_POST) > 0){
            return true;
        }
    }

function convertType($type){
    if($type == 1){
        $type = "Aluno";
    }else if($type == 2){
        $type = "Professor";
    }
    return $type;
}

function convertBook($book){
    switch($book){
        case 1:
           $book = "As cronicas de gelo e fogo";
        break;
        case 2:
            $book = "Silmarilion";
        break;
        case 3:
            $book = "O poder do habito";
        break;
        case 4:
            $book = "Harry Potter";
        break;
    }

    return $book;
}

function date_form($date_out){
    $pos = strpos($date_out, '-');
    if($pos === false ){
        $pos = strpos($date_out, '/');
        if($pos != false ){
            $date_out = implode('-', array_reverse(explode('/', $date_out)));
        }
    }else{
        $date_out = implode('/', array_reverse(explode('-', $date_out)));
    }

    return $date_out;
}