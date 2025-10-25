<?php
require_once '../models/Product.php';
header('Content-Type: application/json');

$product = new Product();
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            echo json_encode($product->getById($_GET['id']));
        } else {
            echo json_encode($product->getAll());
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        $product->create($data['name'], $data['price'], $data['image'], $data['category_id'], $data['description']);
        echo json_encode(['message' => 'Product created']);
        break;

    case 'PUT':
        $data = json_decode(file_get_contents("php://input"), true);
        $product->update($data['id'], $data['name'], $data['price'], $data['image'], $data['category_id'], $data['description']);
        echo json_encode(['message' => 'Product updated']);
        break;

    case 'DELETE':
        parse_str(file_get_contents("php://input"), $_DEL);
        $product->delete($_DEL['id']);
        echo json_encode(['message' => 'Product deleted']);
        break;
}
?>
