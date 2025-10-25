<?php
require_once '../models/Wishlist.php';
header('Content-Type: application/json');

$wishlist = new Wishlist();
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['user_id'])) {
            echo json_encode($wishlist->getByUser($_GET['user_id']));
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        $wishlist->add($data['user_id'], $data['product_id']);
        echo json_encode(['message' => 'Added to wishlist']);
        break;

    case 'DELETE':
        parse_str(file_get_contents("php://input"), $_DEL);
        $wishlist->remove($_DEL['user_id'], $_DEL['product_id']);
        echo json_encode(['message' => 'Removed from wishlist']);
        break;
}
?>
