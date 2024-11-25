<?php include 'header.php'; ?>
<?php
include 'flowers.php'; //
?>
<?php include 'upload.php' ?>
<main>
    <div class="table-title">
        <div class="row ">
            <div class="col-sm-6 addButton">
                <a href="#addFlowerModal" class="btn btn-success" data-toggle="modal"><i
                        class="material-icons">&#xE147;</i> <span>Thêm hoa</span></a>
            </div>
        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên hoa</th>
                <th>Mô tả</th>
                <th>Ảnh</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
    <?php if (empty($flowers)): ?>
        <tr>
            <td colspan="5">Không có hoa nào.</td>
        </tr>
    <?php else: ?>
        <?php foreach ($flowers as $flower): ?>
            <tr>
                <td><?= htmlspecialchars($flower['id']) ?></td>
                <td><?= htmlspecialchars($flower['name']) ?></td>
                <td><?= htmlspecialchars($flower['des']) ?></td>
                <td>
                    <?php foreach ($flower['img'] as $img): ?>
                        <img src="<?= htmlspecialchars($img) ?>" alt="Ảnh hoa" style="width: 100px; height: auto;">
                    <?php endforeach; ?>
                </td>
                <td>
                    <a href="#editFlowerModal" class="edit"
                        data-id="<?= htmlspecialchars($flower['id']) ?>"
                        data-name="<?= htmlspecialchars($flower['name']) ?>"
                        data-description="<?= htmlspecialchars($flower['des']) ?>"
                        data-images='<?= json_encode($flower['img']) ?>'
                        data-toggle="modal">
                        <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                    </a>
                    <a href="#deleteFlowerModal" class="delete"
                        data-id="<?= htmlspecialchars($flower['id']) ?>"
                        data-toggle="modal">
                        <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</tbody>



    </table>
</main>

<!-- Add Flower Modal -->
<div id="addFlowerModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm hoa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tên hoa</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea name="description" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Ảnh 1</label>
                        <input type="file" name="images[]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Ảnh 2</label>
                        <input type="file" name="images[]" class="form-control">
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


<!-- Edit Flower Modal -->
<div id="editFlowerModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Sửa hoa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit-id">
                    <div class="form-group">
                        <label>Tên hoa</label>
                        <input type="text" name="name" id="edit-name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea name="description" id="edit-description" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Ảnh hiện tại</label>
                        <div id="current-images">
                            <!-- Hiển thị ảnh hiện tại ở đây -->
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Ảnh 1 (Tùy chọn)</label>
                        <input type="file" name="images[]" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Ảnh 2 (Tùy chọn)</label>
                        <input type="file" name="images[]" class="form-control">
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


<!-- Delete Flower Modal -->
<div id="deleteFlowerModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST">
                <input type="hidden" name="id" id="delete-id">
                <div class="modal-header">
                    <h4 class="modal-title">Xóa hoa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc muốn xóa hoa này?</p>
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


<script>
    $(document).on("click", ".edit", function() {
        var id = $(this).data("id");
        var name = $(this).data("name");
        var description = $(this).data("description");
        var images = $(this).data("images");

        $("#edit-id").val(id);
        $("#edit-name").val(name);
        $("#edit-description").val(description);

        var imageContainer = $("#current-images");
        imageContainer.empty();
        if (images && images.length > 0) {
            images.forEach(function(img) {
                var imgTag = '<img src="' + img + '" alt="Ảnh hiện tại" style="width: 100px; margin-right: 10px;">';
                imageContainer.append(imgTag);
            });
        }

        $("#editFlowerModal").modal("show");
    });

    $(document).on("click", ".delete", function() {
        var id = $(this).data("id");
        $("#delete-id").val(id);
        $("#deleteFlowerModal").modal("show");
    });
</script>

<?php include 'footer.php'; ?>