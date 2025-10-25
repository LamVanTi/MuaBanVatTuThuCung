<?php
require_once '../models/Order.php';
header('Content-Type: application/json');

$order = new Order();
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        echo json_encode($order->getAll());
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        $order->create($data['user_id'], $data['total_price'], $data['status']);
        echo json_encode(['message' => 'Order created']);
        break;

    case 'DELETE':
        parse_str(file_get_contents("php://input"), $_DEL);
        $order->delete($_DEL['id']);
        echo json_encode(['message' => 'Order deleted']);
        break;
}
?>
