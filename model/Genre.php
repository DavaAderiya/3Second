<?php

class Genre {

    private $conn;
    private $table = "tb_genre";

    public function __construct($db) {
        $this->conn = $db;
    }

    // READ
    public function read() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY id_genre ASC";
        return $this->conn->query($query);
    }

    // GET BY ID
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id_genre = $id";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }

    // CREATE
    public function create($nama) {
        $query = "INSERT INTO " . $this->table . " (nama_genre) VALUES ('$nama')";
        $this->conn->query($query);

        // setelah insert → tidak perlu reset ID
        return true;
    }

    // UPDATE
    public function update($id, $nama) {
        $query = "UPDATE " . $this->table . " 
                  SET nama_genre='$nama' 
                  WHERE id_genre=$id";
        return $this->conn->query($query);
    }

    // DELETE + RESEQUENCE (ID URUT)
    public function delete($id) {
        // 1. Hapus berdasarkan id
        $deleteQuery = "DELETE FROM " . $this->table . " WHERE id_genre=$id";
        $this->conn->query($deleteQuery);

        // 2. Resequence ID agar kembali urut 1,2,3,...
        $this->conn->query("SET @no = 0");
        $this->conn->query("UPDATE " . $this->table . " SET id_genre = (@no := @no + 1) ORDER BY id_genre");

        // 3. Reset auto increment ke 1
        $this->conn->query("ALTER TABLE " . $this->table . " AUTO_INCREMENT = 1");

        return true;
    }
}
