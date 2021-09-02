<?php
require_once __DIR__."/../../autoload/autoload.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$blog_id = $db->fetchID("blog", $id);
if (isset($_POST['edit'])) {
    $data =
        [
            "title" => postInput('title'),
            "description" => postInput('description'),
            "date_create" => date('Y-m-d H:i:s'),
            "status" => postInput('status'),
        ];


    $error = [];
    if (postInput('title') == '') {
        $error['title'] = "Vui lòng tiêu đề";

    }
    if (postInput('description') == '') {
        $error['description'] = 'Vui lòng nhập nội dung';

    }
    if (empty($error)) {
        $id_update = $db->update("blog", $data, array("id" => $id));
        if ($id_update > 0) {
            $_SESSION['success'] = "Cập nhập thành công";
            header("location:list.php");
        } else {
            $_SESSION['error'] = "Cập nhập thất bại";
            header("location:list.php");
        }
    }

}

?>

<?php include('../../layouts/header1.php') ?>
<!-- Page Heading Noi dung-->
<div id="page-wrapper">
    <div class="content-user">
        <div class="title-user">Sửa bài viết</div>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="label-title" for="name">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Nhập tiêu đề"
                       value="<?= $blog_id['title'] ?>">

                <?php if (isset($error['title'])): ?>
                    <div class="text-danger"> <?php echo $error['title']; ?></div>

                <?php endif; ?>
            </div>
            <div class="form-group">
                <label class="label-title" for="phone">Decription</label>

                <textarea cols="3" rows="3" name="description" class="form-control description"
                          id="description"><?= $blog_id['description'] ?></textarea>
                <?php if (isset($error['description'])): ?>
                    <div class="text-danger"> <?php echo $error['description']; ?></div>

                <?php endif; ?>
            </div>
            <div class="form-group">
                <label class="label-title" for="password">Status</label>
                <div style="text-align: end">
                    <input type="radio" name="status" class=" status" id="status1"
                           value="1" <?= $blog_id['status'] == 1 ? 'checked' : '' ?>> <label for="status1">Only
                        Member</label>
                    <input type="radio" name="status" class=" status" id="status2"
                           value="2" <?= $blog_id['status'] == 2 ? 'checked' : '' ?>> <label
                            for="status2">Public</label>
                </div>

            </div>
            <button class="btn" name="edit" value="edit">Cập nhập</button>
            <br>
            <br>
            <br>
        </form>
    </div>
</div>

<!-- /.row -->
<?php include('../../layouts/footer1.php') ?>

           
