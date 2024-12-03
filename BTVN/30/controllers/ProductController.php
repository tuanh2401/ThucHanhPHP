<?php
require_once '../models/ProductModel.php';

class ProductController
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        // Lấy danh sách sản phẩm từ model
        $products = $this->productModel->getAllProducts();
        require '../views/products/index.php'; // Hiển thị danh sách sản phẩm
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // Lấy thông tin từ form
            $name = $_POST['name'];
            $price = $_POST['price'];
            $publishedYear = $_POST['published_year'];
            $information = $_POST['information'];

            // Thêm sản phẩm vào cơ sở dữ liệu
            if ($this->productModel->insert($name, $price, $publishedYear, $information)) {
                header('Location: ../views/products/index.php'); // Chuyển hướng về trang danh sách sản phẩm
                exit; // Đảm bảo không có mã nào khác được thực thi sau header
            } else {
                echo "Thêm sản phẩm không thành công.";
            }
        }
        require '../views/products/create.php'; // Hiển thị form thêm sản phẩm
    }

    public function edit($id)
    {
        // Lấy thông tin sản phẩm từ database
        $product = $this->productModel->getProductById($id);

        // Kiểm tra sản phẩm có tồn tại không
        if (!$product) {
            die("Sản phẩm không tồn tại!"); // Dừng lại nếu sản phẩm không tồn tại
        }

        // Kiểm tra nếu là yêu cầu POST và form đã được gửi
        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['name'], $_POST['price'], $_POST['published_year'], $_POST['information'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $publishedYear = $_POST['published_year'];
            $information = $_POST['information'];

            // Cập nhật sản phẩm trong cơ sở dữ liệu
            if ($this->productModel->update($id, $name, $price, $publishedYear, $information)) {
                header('Location: ../views/products/index.php'); // Chuyển hướng về trang danh sách sản phẩm
                exit;
            } else {
                echo "Cập nhật sản phẩm không thành công.";
            }
        }

        // Hiển thị form chỉnh sửa
        require '../views/products/edit.php';
    }

    public function delete($id)
    {
        // Xóa sản phẩm khỏi cơ sở dữ liệu
        if ($this->productModel->deleteProduct($id)) {
            header('Location: ../views/products/index.php'); // Chuyển hướng về trang danh sách sản phẩm
            exit;
        } else {
            echo "Xóa sản phẩm không thành công.";
        }
    }
}
?>
