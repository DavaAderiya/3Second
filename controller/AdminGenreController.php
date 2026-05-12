<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../model/Genre.php';


class AdminGenreController {

    private $db;
    private $genre;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->genre = new Genre($this->db);
    }

    public function index() {
        $result = $this->genre->read();
        include __DIR__ . '/../page/admin/page/view_genre.php';
    }

    public function create() {
        include __DIR__ . '/../page/admin/page/input_genre.php';
    }

    public function store() {
        $nama = $_POST['nama_genre'];

        if ($this->genre->create($nama)) {
            header("Location: index.php?page=genre&action=index");
            exit;
        } else {
            echo "Gagal menambah genre!";
        }
    }

    public function edit($id) {
        $data = $this->genre->getById($id);
        include __DIR__ . '/../page/admin/page/input_genre.php';
    }

    public function update($id) {
        $nama = $_POST['nama_genre'];

        if ($this->genre->update($id, $nama)) {
            header("Location: index.php?page=genre&action=index");
            exit;
        } else {
            echo "Gagal update genre!";
        }
    }

    public function delete($id) {
        if ($this->genre->delete($id)) {
            header("Location: index.php?page=genre&action=index");
            exit;
        } else {
            echo "Gagal menghapus genre!";
        }
    }
}
