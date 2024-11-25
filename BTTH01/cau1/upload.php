<?php
if (isset($_POST['add'])) {
    $imgPaths = [];
    if (isset($_FILES['images'])) {
        $target_dir = "img/";
        foreach ($_FILES['images']['name'] as $key => $imageName) {
            if (!empty($imageName)) {
                $target_file = $target_dir . basename($imageName);
                if (move_uploaded_file($_FILES['images']['tmp_name'][$key], $target_file)) {
                    $imgPaths[] = $target_file;
                }
            }
        }
    }

    // Xác định ID lớn nhất hiện có và tăng thêm 1
    $maxId = 0;
    foreach ($flowers as $flower) {
        if (isset($flower['id']) && $flower['id'] > $maxId) {
            $maxId = $flower['id'];
        }
    }
    $newId = $maxId + 1;

    $flowers[] = [
        'id' => $newId,
        'name' => $_POST['name'],
        'des' => $_POST['description'],
        'img' => $imgPaths
    ];

    file_put_contents('flowers.php', "<?php\n\$flowers = " . var_export($flowers, true) . ";");
}




if (isset($_POST['edit'])) {
    $id = intval($_POST['id']); // Lấy ID cần sửa

    foreach ($flowers as $index => $flower) { // Dùng $index thay vì $key
        if ($flower['id'] === $id) { // Tìm phần tử có ID khớp
            $imgPaths = $flower['img']; // Giữ lại ảnh cũ
            if (isset($_FILES['images'])) {
                $target_dir = "img/";
                foreach ($_FILES['images']['name'] as $key => $imageName) { // Sử dụng $key cho $_FILES
                    if (!empty($imageName)) {
                        $target_file = $target_dir . basename($imageName);
                        if (move_uploaded_file($_FILES['images']['tmp_name'][$key], $target_file)) {
                            $imgPaths[$key] = $target_file; // Cập nhật ảnh
                        }
                    }
                }
            }

            // Cập nhật thông tin phần tử trong mảng
            $flowers[$index] = [
                'id' => $id,
                'name' => $_POST['name'],
                'des' => $_POST['description'],
                'img' => $imgPaths
            ];

            break; // Thoát khỏi vòng lặp sau khi tìm thấy phần tử
        }
    }

    file_put_contents('flowers.php', "<?php\n\$flowers = " . var_export($flowers, true) . ";");
}


if (isset($_POST['delete'])) {
    $id = intval($_POST['id']); // Chuyển ID từ chuỗi thành số nguyên

    foreach ($flowers as $key => $flower) {
        if ($flower['id'] === $id) { // Tìm phần tử có ID khớp
            unset($flowers[$key]);
            break;
        }
    }

    $flowers = array_values($flowers); // Đánh lại chỉ số mảng
    file_put_contents('flowers.php', "<?php\n\$flowers = " . var_export($flowers, true) . ";");
}


?>