<?php
require_once '../models/Category.php';
header('Content-Type: application/json');

$category = new Category();
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            echo json_encode($category->getById($_GET['id']));
        } else {
            echo json_encode($category->getAll());
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        if ($category->create($data['name'])) {
            echo json_encode(['message' => 'Category created']);
        }
        break;

    case 'PUT':
        $data = json_decode(file_get_contents("php://input"), true);
        if ($category->update($data['id'], $data['name'])) {
            echo json_encode(['message' => 'Category updated']);
        }
        break;

    case 'DELETE':
        parse_str(file_get_contents("php://input"), $_DEL);
        if ($category->delete($_DEL['id'])) {
            echo json_encode(['message' => 'Category deleted']);
        }
        break;
}
?>
