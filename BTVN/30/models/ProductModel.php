<?php

require_once 'Database.php';
class ProductModel
{
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->connect();
    }

    public function getAllProducts()
    {
        $query = "SELECT * FROM products";
        $result = $this->db->query($query);

        if (!$result) {
            die("Query Error: " . $this->db->error); // Kiểm tra lỗi trong truy vấn
        }

        return ($result->num_rows > 0) ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function insert($name, $price, $publishedYear, $information)
    {
        // Kiểm tra các tham số để đảm bảo không bị NULL
        if ($name == NULL || $price == NULL || $publishedYear == NULL || $information == NULL) {
            die("Error: All fields must be provided.");
        }
    
        // Câu truy vấn SQL
        $query = "INSERT INTO products (Name, Price, PublishedYear, Information) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
    
        if ($stmt === false) {
            die("Prepare failed: " . $this->db->error); // Kiểm tra lỗi chuẩn bị câu truy vấn
        }
    
        // Sử dụng đúng kiểu dữ liệu và tham số
        $stmt->bind_param("siss", $name, $price, $publishedYear, $information);  // s: string, d: double, i: integer
        if (!$stmt->execute()) {
            die("Execute failed: " . $stmt->error); // Kiểm tra lỗi khi thực hiện câu truy vấn
        }
        
        return true;
    }
    

    public function update($id, $price, $publishedYear, $information)
    {
        $query = "UPDATE products SET Name = ?, Price = ? , PublishedYear = ?, Information = ? WHERE ProductID = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sisii", $name, $price ,  $publishedYear, $information, $id);
        return $stmt->execute();
    }

    public function deleteProduct($id)
    {
        $query = "DELETE FROM products WHERE ProductID = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function getProductById($id)
    {
        $query = "SELECT * FROM Products WHERE ProductID = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>
