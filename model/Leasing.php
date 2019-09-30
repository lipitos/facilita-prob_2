<?php

class Leasing {
    private $id;
    private $id_book;
    private $id_type;
    private $date;

    public function getId(){
        return $this->id;
    }
    public function getId_book(){
        return $this->id_book;
    }
    public function getId_type(){
        return $this->id_type;
    }
    public function getDate(){
        return $this->date;
    }

    public function setId($id){
        $this->id = $id;
    }
    public function setId_book($id_book){
        $this->id_book = $id_book;
    }
    public function setId_type($id_type){
        $this->id_type = $id_type;
    }
    public function setDate($date){
        $this->date= $date;
    }    
}