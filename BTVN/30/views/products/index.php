<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Bao gồm file mô hình
require_once '../../models/ProductModel.php'; // Điều chỉnh đường dẫn nếu cần
$productModel = new ProductModel();
$products = $productModel->getAllProducts(); // Lấy dữ liệu sản phẩm
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Sản Phẩm</title>
    <style>
        /* Reset CSS */
body, h1, table {
    margin: 0;
    padding: 0;
}

/* Thiết lập font chữ và nền */
body {
    font-family: Arial, sans-serif;
    background-color: red;
    color: #333;
    padding: 20px;
}

/* Tiêu đề */
h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #444;
}

/* Bảng */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 0 auto;
    background-color: pink;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

table th, table td {
    padding: 12px 15px;
    text-align: left;
}

table th {
    background-color: #007bff;
    color: white;
    font-weight: bold;
    text-transform: uppercase;
}

table tr:nth-child(even) {
    background-color: #f8f9fa;
}

table tr:hover {
    background-color: #e9ecef;
}

/* Liên kết */
a {
    color: black;
    text-decoration: none;
    font-weight: bold;
}

a:hover {
    text-decoration: underline;
    color: #0056b3;
}

    </style>
</head>
<body>
    <h1>Danh sách Sản Phẩm</h1>
    <div style="margin-bottom: 20px; text-align: center;">
        <a href="./create.php" style="text-decoration: none; background-color: #28a745; color: white; padding: 10px 20px; border-radius: 5px; font-weight: bold;">Thêm Sản Phẩm</a>
    </div>
    <table border="1">
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Information</th>
                <th>Function</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= htmlspecialchars($product['ProductID']) ?></td>
                        <td><?= htmlspecialchars($product['Price']) ?></td>
                        <td><?= htmlspecialchars($product['PublishedYear']) ?></td>
                        <td><?= htmlspecialchars($product['Information']) ?></td>
                        <td>
                            <a href="./edit.php?id=<?= $product['ProductID'] ?>">Sửa</a>
                            |
                            <a href="../../controllers/index.php?action=delete&id=<?= $product['ProductID'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</a>
                            </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Không có sản phẩm nào trong cơ sở dữ liệu</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
