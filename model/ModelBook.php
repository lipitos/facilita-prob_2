<?php

class ModelBook{
    private $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function save(Book $book){
        //Definindo a SQL
        $sql = "INSERT INTO book (name, author)
                VALUES (:name, :author)";

        //Preparando a Query
        $query = $this->pdo->prepare($sql);

        //Executando
        $query->execute([
            'name' => $book->getName(),
            'author' => $book->getAuthor(),
        ]);
    }

    public function search($id = 0){
        if($id > 0){
            return $this->search_book($id);
        }else{
            return $this->list();
        }
    }

    public function list(){
        $sql = "SELECT * FROM book";

        $result = $this->pdo->query(
            $sql,
            PDO::FETCH_CLASS,
            'Book'
        );

        $books = [];
        foreach ($result as $book){
            $books[] = $book;
        }

        return $books;
    }

    public function update(Book $book){

        $sql = "UPDATE book SET 
                name = :name,
                author = :author
                WHERe id = :id";

        try{
            $query = $this->pdo->prepare($sql);
        }catch(PDOException $e){
            echo $e->getMessage();
        }

        $query->execute([
            'name' => $book->getName(),
            'author' => $book->getAuthor(),
            'id' => $book->getId(),
        ]);
    }

    public function delete($id){
        $sql = "DELETE FROM book WHERE id = :id";
        $query = $this->pdo->prepare($sql);
        $query->execute([
            'id' => $id,
        ]);
    }

    public function search_book($id){
        $sql = "SELECT * FROM book WHERE id = :id";
        $query = $this->pdo->prepare($sql);
        $query->execute([
            'id' => $id,
        ]);
        $book = $query->fetchObject('Book');
        return $book;
    }
}