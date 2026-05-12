<?php

require_once __DIR__ . '/../controller/AdminGenreController.php';

// Path folder page
$basePagePath = __DIR__ . '/../page/admin/page/';

$controller = new AdminGenreController();

// GET Parameter
$page   = $_GET['page']   ?? 'dashboard';
$action = $_GET['action'] ?? '';
$id     = isset($_GET['id']) ? intval($_GET['id']) : null;

// ---------------- ROUTING ---------------- //

switch ($page) {

    // ================= DASHBOARD =================
    case 'dashboard':
        include $basePagePath . 'dashboard.php';
        break;

    // ================= GENRE =================
    case 'genre':
        switch ($action) {

            case 'index':
                $controller->index();
                break;

            case 'create':
                $controller->create();
                break;

            case 'store':
                $controller->store();
                break;

            case 'edit':
                if ($id === null) die("ID genre tidak ditemukan (edit)");
                $controller->edit($id);
                break;

            case 'update':
                if ($id === null) die("ID genre tidak ditemukan (update)");
                $controller->update($id);
                break;

            case 'delete':
                if ($id === null) die("ID genre tidak ditemukan (delete)");
                $controller->delete($id);
                break;

            default:
                $controller->index();
        }
        break;

    // ================= DEFAULT =================
    default:
        include $basePagePath . 'dashboard.php';
        break;
}
