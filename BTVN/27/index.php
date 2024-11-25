<?php include 'header.php'; ?>

<?php
include 'product.php'; ?>
<?php
include 'upload.php'; ?>
<main>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Manage Products</h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i
                                class="material-icons">&#xE147;</i> <span>Thêm Loài Hoa Mới</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Giá</th>
                        <th>Ảnh Sản Phẩm</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody id="product-list">
                    <?php if (empty($products)): ?>
                        <tr>
                            <td colspan="5">Không có sản phẩm nào.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($products as $index => $product): ?>
                            <tr>
                                <td><?= $index ?></td>
                                <td><?= htmlspecialchars($product['name']) ?></td>

                                <!-- Đặt cột giá lên trước -->
                                <td><?= htmlspecialchars($product['price']) ?></td>

                                <!-- Cột ảnh sản phẩm được đặt sau -->
                                <td><img src="<?= htmlspecialchars($product['image']) ?>" alt="Ảnh sản phẩm"
                                        style="width: 300px; height: auto;"></td>

                                <td>
                                    <a href="#editEmployeeModal" class="edit" data-id="<?= $index ?>"
                                        data-name="<?= htmlspecialchars($product['name']) ?>"
                                        data-price="<?= htmlspecialchars($product['price']) ?>" data-toggle="modal">
                                        <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                                    </a>
                                    <a href="#deleteEmployeeModal" class="delete" data-id="<?= $index ?>" data-toggle="modal">
                                        <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </tbody>
                <!-- Add Product Modal -->
                <div id="addEmployeeModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="modal-header">
                                    <h4 class="modal-title">Thêm Sản Phẩm</h4>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Tên Sản Phẩm</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Giá</label>
                                        <input type="text" name="price" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Ảnh Sản Phẩm</label>
                                        <input type="file" name="image" class="form-control" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Hủy">
                                    <input type="submit" name="add" class="btn btn-success" value="Thêm">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Edit Product Modal -->
                <div id="editEmployeeModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="modal-header">
                                    <h4 class="modal-title">Sửa sản phẩm</h4>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="id" id="edit-id">
                                    <div class="form-group">
                                        <label>Tên Sản Phẩm </label>
                                        <input type="text" name="name" id="edit-name" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Giá</label>
                                        <input type="number" name="price" id="edit-price" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Ảnh Sản Phẩm</label><input type="file" name="image" class="form-control">
                                        <!-- Hiển thị ảnh cũ nếu có -->
                                        <img src="<?= htmlspecialchars($product['image']) ?>" alt="Ảnh sản phẩm"
                                            style="width: 100px; height: auto;">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Hủy">
                                    <input type="submit" name="edit" class="btn btn-info" value="Lưu">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Delete -->
                <div id="deleteEmployeeModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST">
                                <input type="hidden" name="id" id="delete-id">
                                <div class="modal-header">
                                    <h4 class="modal-title">Xóa sản phẩm</h4>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <p>Bạn có chắc muốn xóa sản phẩm này?</p>
                                    <p class="text-warning"><small>Hành động này không thể hoàn tác.</small></p>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Hủy">
                                    <input type="submit" name="delete" class="btn btn-danger" value="Xóa">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </table>
</main>
<?php include 'footer.php'; ?>