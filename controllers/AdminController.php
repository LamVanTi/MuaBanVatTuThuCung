<?php
require_once 'models/Product.php';
require_once 'models/Category.php';
require_once 'models/User.php';
require_once 'models/Order.php';
require_once 'models/Supplier.php';
require_once 'models/Promotion.php';
require_once 'models/Feedback.php';
require_once 'models/Wishlist.php';

class AdminController {
    private $productModel;
    private $categoryModel;
    private $userModel;
    private $orderModel;
    private $supplierModel;
    private $promotionModel;
    private $feedbackModel;
    private $wishlistModel;

    public function __construct() {
        $this->productModel = new Product();
        $this->categoryModel = new Category();
        $this->userModel = new User();
        $this->orderModel = new Order();
        $this->supplierModel = new Supplier();
        $this->promotionModel = new Promotion();
        $this->feedbackModel = new Feedback();
        $this->wishlistModel = new Wishlist();
    }

    // 🏠 Trang tổng quan quản trị
    public function dashboard() {
        $stats = [
            'total_products' => count($this->productModel->getAll()),
            'total_users' => count($this->userModel->getAll()),       // ✅ thêm hàm getAll() trong model User
            'total_orders' => count($this->orderModel->getAll()),
            'total_suppliers' => count($this->supplierModel->getAll()),
            'total_promotions' => count($this->promotionModel->getAll()),
            'total_feedbacks' => count($this->feedbackModel->getAll()), // ✅ thêm hàm getAll() trong model Feedback
            'total_wishlists' => count($this->wishlistModel->getAll()), // ✅ thêm hàm getAll() trong model Wishlist
        ];

        include 'views/admin/dashboard.php';
    }

    public function products() {
        $products = $this->productModel->getAll();// Lấy tất cả sản phẩm
        include 'views/admin/products.php';
    }

    public function users() {
        $users = $this->userModel->getAll(); // ✅
        include 'views/admin/users.php';// Lấy tất cả người dùng
    }

    public function orders() {
        $orders = $this->orderModel->getAll();// Lấy tất cả đơn hàng
        include 'views/admin/orders.php';
    }

    public function suppliers() {
        $suppliers = $this->supplierModel->getAll();// Lấy tất cả nhà cung cấp
        include 'views/admin/suppliers.php';
    }

    public function promotions() {
        $promotions = $this->promotionModel->getAll();// Lấy tất cả khuyến mãi
        include 'views/admin/promotions.php';
    }

    public function feedbacks() {
        $feedbacks = $this->feedbackModel->getAll(); // ✅
        include 'views/admin/feedbacks.php';// Lấy tất cả phản hồi
    }

    public function wishlists() {
        $wishlists = $this->wishlistModel->getAll(); // ✅//    Lấy tất cả mục yêu thích
        include 'views/admin/wishlists.php';
    }
}
?>
