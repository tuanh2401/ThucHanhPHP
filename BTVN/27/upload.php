<?php
 //Nút Add
    if (isset($_POST['add'])) {
        // Xử lý ảnh tải lên
        $imagePath = '';
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {//kiểm tra người dùng đã tải lên ảnh hay chưa
            $target_dir = "img/"; //chỉ dịnh nơi lưu chữ các tập tin vào thư mục img
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $imagePath = $target_file; // sau đó sẽ lưu vào biến image path để có thể lưu vào csdl hoặc hiển thị lên trang web
            }
        }
    
        // Thêm sản phẩm vào mảng
        $products[] = [
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'image' => $imagePath
        ];
    
        // Lưu mảng sản phẩm vào file
        file_put_contents('products.php', "<?php\n\$products = " . var_export($products, true) . ";");
    }
    //Nút edit
    if (isset($_POST['edit'])) {
        $id = $_POST['id'];
        
        // Xử lý ảnh tải lên
        $imagePath = $products[$id]['image']; // Dùng ảnh cũ nếu không thay đổi
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $target_dir = "img/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $imagePath = $target_file;
            }
        }
    
        // Cập nhật thông tin sản phẩm
        $products[$id] = [
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'image' => $imagePath
        ];
    
        // Lưu mảng sản phẩm vào file
        file_put_contents('products.php', "<?php\n\$products = " . var_export($products, true) . ";");
    }
    //Nút delete
    if (isset($_POST['delete'])) {
        $id = $_POST['id']; //xóa sản phẩm có id tương ứng và hàm unset sẽ loại chúng khỏi mảng
        unset($products[$id]);
        $products = array_values($products);
        file_put_contents('products.php', "<?php\n\$products = " . var_export($products, true) . ";"); // sau đó sẽ lưu lại vào file
    }
?>