<?php

class ModelType{
    private $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function save(Type $type){
        //Definindo a SQL
        $sql = "INSERT INTO type (type)
                VALUES (:type)";

        //Preparando a Query
        $query = $this->pdo->prepare($sql);

        //Executando
        $query->execute([
            'type' => $type->getType(),
        ]);
    }

    public function search($id = 0){
        if($id > 0){
            return $this->search_type($id);
        }else{
            return $this->list();
        }
    }

    public function list(){
        $sql = "SELECT * FROM type";

        $result = $this->pdo->query(
            $sql,
            PDO::FETCH_CLASS,
            'Type'
        );

        $types = [];
        foreach ($result as $type){
            $types[] = $type;
        }

        return $types;
    }

    public function update(Type $type){

        $sql = "UPDATE type SET 
                type = :type
                WHERe id = :id";

        try{
            $query = $this->pdo->prepare($sql);
        }catch(PDOException $e){
            echo $e->getMessage();
        }

        $query->execute([
            'type' => $type->getType(),
            'id' => $type->getId(),
        ]);
    }

    public function delete($id){
        $sql = "DELETE FROM type WHERE id = :id";
        $query = $this->pdo->prepare($sql);
        $query->execute([
            'id' => $id,
        ]);
    }

    public function search_type($id){
        $sql = "SELECT * FROM type WHERE id = :id";
        $query = $this->pdo->prepare($sql);
        $query->execute([
            'id' => $id,
        ]);
        $type = $query->fetchObject('Type');
        return $type;
    }
}