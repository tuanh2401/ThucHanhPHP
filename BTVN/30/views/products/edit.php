<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Sản Phẩm</title>
</head>
<body>
    <h1>Sửa Sản Phẩm</h1>
    <form method="POST" action="../../controllers/index.php?action=edit&id=<?= htmlspecialchars($_GET['id']) ?>">
        <label for="name">Name :</label>
        <input 
            type="text" 
            id="name" 
            name="name" 
            value="<?= isset($product['Name']) ? htmlspecialchars($product['Name']) : '' ?>" 
            required
        >
        <br>
        <label for="price">Price :</label>
        <input 
            type="number" 
            id="price" 
            name="price" 
            value="<?= isset($product['Price']) ? htmlspecialchars($product['Price']) : '' ?>" 
            required
        >
        <br>
        <label for="published_year">Published Year :</label>
        <input 
            type="number" 
            id="published_year" 
            name="published_yeare" 
            value="<?= isset($product['published_year']) ? htmlspecialchars($product['published_year']) : '' ?>" 
            required
        >
        <br>
        <br>
        <label for="information">Information :</label>
        <input 
            type="text" 
            id="information" 
            name="information" 
            value="<?= isset($product['information']) ? htmlspecialchars($product['information']) : '' ?>" 
            required
        >
        <br>
    
        <button type="submit">Cập nhật</button>
        <a href="index.php">Trở lại</a>
    </form>
</body>
</html>
