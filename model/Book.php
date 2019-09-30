<?php

class Book{
    private $id;
    private $name;
    private $author;
    
    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getAuthor(){
        return $this->author;
    }
    
    public function setId($id){
        $this->id = $id;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function setAuthor($author){
        $this->author = $author;
    }
}