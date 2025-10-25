<?php
require_once '../models/Feedback.php';
header('Content-Type: application/json');

$feedback = new Feedback();
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['product_id'])) {
            echo json_encode($feedback->getByProduct($_GET['product_id']));
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        $feedback->add($data['user_id'], $data['product_id'], $data['content'], $data['rating']);
        echo json_encode(['message' => 'Feedback added']);
        break;
}
?>
