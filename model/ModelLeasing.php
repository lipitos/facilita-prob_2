<?php

class ModelLeasing{
    private $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function save(Leasing $leasing){
        //Definindo a SQL
        $sql = "INSERT INTO leasing (id_book, id_type, date)
                VALUES (:id_book, :id_type, :date)";

        //Preparando a Query
        $query = $this->pdo->prepare($sql);

        //Executando
        $query->execute([
            'id_book' => $leasing->getId_book(),
            'id_type' => $leasing->getId_type(),
            'date' => $leasing->getDate(),
        ]);
    }

    public function search($id = 0){
        if($id > 0){
            return $this->search_leasing($id);
        }else{
            return $this->list();
        }
    }

    public function list(){
        $sql = "SELECT * FROM leasing";

        $result = $this->pdo->query(
            $sql,
            PDO::FETCH_CLASS,
            'Leasing'
        );

        $leasings = [];
        foreach ($result as $leasing){
            $leasings[] = $leasing;
        }

        return $leasings;
    }

    public function update(Leasing $leasing){
        $date = $leasing->getDate();
        if(is_object($date)){
            $date = $date->format('Y-m-d');
        }

        $sql = "UPDATE leasing SET 
                id_book = :id_book,
                id_type = :id_type,
                date = :date
                WHERe id = :id";

        try{
            $query = $this->pdo->prepare($sql);
        }catch(PDOException $e){
            echo $e->getMessage();
        }

        $query->execute([
            'id_book' => $leasing->getId_book(),
            'id_type' => $leasing->getId_type(),
            'date' => $leasing->getDate(),
            'id' => $leasing->getId(),
        ]);
    }

    public function delete($id){
        $sql = "DELETE FROM leasing WHERE id = :id";
        $query = $this->pdo->prepare($sql);
        $query->execute([
            'id' => $id,
        ]);
    }

    public function search_leasing($id){
        $sql = "SELECT * FROM leasing WHERE id = :id";
        $query = $this->pdo->prepare($sql);
        $query->execute([
            'id' => $id,
        ]);
        $leasing = $query->fetchObject('Leasing');
        return $leasing;
    }
}