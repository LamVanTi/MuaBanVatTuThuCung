<?php
require_once 'models/Product.php';

class ProductController {
    private $model;

    public function __construct() {
        $this->model = new Product();
    }

    public function index() {
        $products = $this->model->getAll();
        include 'views/products/list.php';
    }

    public function show($id) {
        $product = $this->model->getById($id);
        include 'views/products/detail.php';
    }// Hiển thị chi tiết sản phẩm

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $image = $_POST['image'];
            $category_id = $_POST['category_id'];
            $description = $_POST['description'];

            $this->model->create($name, $price, $image, $category_id, $description);
            header('Location: ?controller=product&action=index');
            exit();
        }
        include 'views/products/add.php';
    }// Thêm sản phẩm mới

    public function edit($id) {
        $product = $this->model->getById($id);
        if (!$product) {
            header('Location: ?controller=product&action=index');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $image = $_POST['image'];
            $category_id = $_POST['category_id'];
            $description = $_POST['description'];

            $this->model->update($id, $name, $price, $image, $category_id, $description);
            header('Location: ?controller=product&action=index');
            exit();
        }
        include 'views/products/edit.php';
    }// Chỉnh sửa sản phẩm

    public function delete($id) {
        $this->model->delete($id);
        header('Location: ?controller=product&action=index');
        exit();
    }// Xóa sản phẩm


    public function search() {
        $query = isset($_GET['q']) ? trim($_GET['q']) : '';
        $products = $this->model->search($query);
        include 'views/products/list.php';
    }// Tìm kiếm sản phẩm 

    public function filterByCategory($category_id) {
        $products = $this->model->getByCategory($category_id);
        include 'views/products/list.php';
    }// Lọc sản phẩm theo danh mục

    public function filterByPriceRange($min_price, $max_price) {
        $products = $this->model->getByPriceRange($min_price, $max_price);
        include 'views/products/list.php';
    }// Lọc sản phẩm theo khoảng giá

    public function featured() {
        $products = $this->model->getFeatured();
        include 'views/products/list.php';
    }// Hiển thị sản phẩm nổi bật

    public function latest() {
        $products = $this->model->getLatest();
        include 'views/products/list.php';
    }// Hiển thị sản phẩm mới nhất

    public function byPriceRange($min_price, $max_price) {
        $products = $this->model->getByPriceRange($min_price, $max_price);
        include 'views/products/list.php';
    }// Hiển thị sản phẩm theo khoảng giá

    public function byCategory($category_id) {
        $products = $this->model->getByCategory($category_id);
        include 'views/products/list.php';
    }// Hiển thị sản phẩm theo danh mục

    public function bySearch($keyword) {
        $products = $this->model->search($keyword);
        include 'views/products/list.php';
    }// Hiển thị sản phẩm theo từ khóa

    public function details($id) {
        $product = $this->model->getById($id);
        include 'views/products/detail.php';
    }// Hiển thị chi tiết sản phẩm theo id

    
}
?>
