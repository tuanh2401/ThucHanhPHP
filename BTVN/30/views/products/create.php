<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm</title>
</head>
<body>
    <h1>Thêm Sản Phẩm Mới</h1>
    <form method="POST" action="../../controllers/index.php?action=create">
        <label for="name">Name :</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="price">Price :</label>
        <input type="number" id="price" name="price" required>
        <br>
        <label for="published_year">Published Year :</label>
        <input type="number" id="published_year" name="published_year" required>
        <br>
        <label for="information">Information :</label>
        <input type="text" id="information" name="information" required>
        <br>
        <button type="submit">Thêm Sản Phẩm</button>
        <a href="index.php">Trở lại</a>
    </form>
</body>
</html>
