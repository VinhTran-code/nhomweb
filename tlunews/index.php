<?php
require './controllers/newcontroller.php';

$controller = new NewsController();
$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'add':
        $controller->add();
        break;
    case 'edit':
        $id = $_GET['id'] ?? null;
        $controller->edit($id);
        break;
    case 'delete':
        $id = $_GET['id'] ?? null;
        $controller->delete($id);
        break;
    default:
        $controller->index();
        break;
}
?>