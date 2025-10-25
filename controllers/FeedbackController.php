<?php
require_once 'models/Feedback.php';

class FeedbackController {
    private $model;

    public function __construct() {
        $this->model = new Feedback();// Khởi tạo mô hình Feedback
    }

    public function index() {
        $feedbacks = $this->model->getAll();
        include 'views/feedback/list.php';// Hiển thị danh sách phản hồi
    }

    public function create() {// Thêm phản hồi mới
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->add($_POST['user_id'], $_POST['product_id'], $_POST['content'], $_POST['rating']);
            header('Location: ?controller=feedback&action=index');// Chuyển hướng sau khi thêm phản hồi
        }
        include 'views/feedback/add.php';
    }

    public function delete($id) {
        $this->model->delete($id);// Xóa phản hồi theo id
        header('Location: ?controller=feedback&action=index');// Chuyển hướng sau khi xóa phản hồi
    }
}
?>
