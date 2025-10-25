<?php
require_once '../models/User.php';
header('Content-Type: application/json');

$user = new User();
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        if (isset($data['action']) && $data['action'] === 'register') {
            $user->register($data['username'], $data['password'], $data['email']);
            echo json_encode(['message' => 'User registered']);
        } else if (isset($data['action']) && $data['action'] === 'login') {
            $u = $user->login($data['username'], $data['password']);
            echo json_encode($u ? $u : ['error' => 'Invalid credentials']);
        }
        break;

    case 'GET':
        if (isset($_GET['id'])) {
            echo json_encode($user->getById($_GET['id']));
        }
        break;
}
?>
