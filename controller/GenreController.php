<?php
class GenreController{
    private $db;
    private $genre;

    public function __construct(){
        $dbase = new Database();
        $this->db = $dbase->getConnection();
        $this->genre = new Genre($this->db);
    }

    public function index(){
        try{
            $stmt = $this->genre->read();

            if(!($stmt)) throw new \Exception($stmt->error);

            $result = $stmt->get_result();

            if(!($result)) throw new \Exception($result->error);

            $genres = $result->fetch_all(MYSQLI_ASSOC);

            include "page/genre_all.php";
        }
        catch(\Exception $e){
            echo $e->getMessage();
        }

        
    }

}