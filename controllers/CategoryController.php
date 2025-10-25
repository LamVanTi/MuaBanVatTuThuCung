<?php
require_once 'models/Category.php';

class CategoryController {
    private $model;

    public function __construct() {
        $this->model = new Category();
    }

    // Hiển thị tất cả danh mục
    public function index() {
        $categories = $this->model->getAll();
        include 'views/categories/list.php';
    }

    // Thêm danh mục mới
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
            $name = trim($_POST['name']);
            if (!empty($name)) {
                $this->model->create($name);
            }
            header('Location: ?controller=category&action=index');
            exit;
        }
        include 'views/categories/add.php';
    }
    public function edit() {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = intval($_GET['id']);
        $category = $this->model->getById($id); // ✅ Lấy dữ liệu cũ

        if (!$category) {
            header('Location: ?controller=category&action=index');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
            $name = trim($_POST['name']);
            if (!empty($name)) {
                $this->model->update($id, $name); // ✅ Chỉ gọi update khi có POST
            }
            header('Location: ?controller=category&action=index');
            exit;
        }

        include 'views/categories/edit.php'; // ✅ Hiển thị form chỉnh sửa
    } else {
        header('Location: ?controller=category&action=index');
        exit;
    }
}

    // Xóa danh mục
    public function delete() {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = intval($_GET['id']);
            $this->model->delete($id);
        }
        header('Location: ?controller=category&action=index');
        exit;
    }
}
?>
