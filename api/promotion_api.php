<?php
require_once '../models/Promotion.php';
header('Content-Type: application/json');

$promotion = new Promotion();
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        echo json_encode($promotion->getAll());
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        $promotion->create($data['code'], $data['discount'], $data['expiry_date']);
        echo json_encode(['message' => 'Promotion created']);
        break;

    case 'DELETE':
        parse_str(file_get_contents("php://input"), $_DEL);
        $promotion->delete($_DEL['id']);
        echo json_encode(['message' => 'Promotion deleted']);
        break;
}
?>
