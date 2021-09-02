<?php

//  include('autoload/autoload.php') ;
require_once __DIR__."/../../autoload/autoload.php";
$data =
    [
        "title" => postInput('title'),
        "description" => postInput('description'),
        "date_create" => date('Y-m-d H:i:s'),
        "status" => postInput('status'),
        "user_id" => $_SESSION['admin_id'],
        "public" => 0,
    ];
if (isset($_POST['add'])) {
    $error = [];
    if (postInput('title') == '') {
        $error['title'] = "Vui lòng tiêu đề";

    }
    if (postInput('description') == '') {
        $error['description'] = 'Vui lòng nhập nội dung';

    }

    if (empty($error)) {
        $id_insert = $db->insert("blog", $data);
        if ($id_insert > 0) {
            $_SESSION['success'] = "Thêm mới thành công";
            header("location:list.php");
        } else {
            $_SESSION['error'] = "Thêm mới thất bại";
            header("location:list.php");
        }
    }

}

?>

<?php include('../../layouts/header1.php') ?>
<!-- Page Heading Noi dung-->
<div id="page-wrapper">
    <div class="content-user">
        <div class="title-user">Thêm mới bài viết</div>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="label-title" for="name">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Nhập tiêu đề"
                       value="">

                <?php if (isset($error['title'])): ?>
                    <div class="text-danger"> <?php echo $error['title']; ?></div>

                <?php endif; ?>
            </div>
            <div class="form-group">
                <label class="label-title" for="phone">Decription</label>

                <textarea cols="3" rows="3" name="description" class="form-control description"
                          id="description"></textarea>
                <?php if (isset($error['description'])): ?>
                    <div class="text-danger"> <?php echo $error['description']; ?></div>

                <?php endif; ?>
            </div>
            <div class="form-group">
                <label class="label-title" for="password">Status</label>
                <div style="text-align: end">
                    <input type="radio" name="status" class=" status" id="status1"
                           value="1" checked> <label for="status1">Only Member</label>
                    <input type="radio" name="status" class=" status" id="status2"
                           value="2"> <label for="status2">Public</label>
                </div>

            </div>
            <button class="btn" name="add" value="add">Thêm</button>
            <br>
            <br>
            <br>
        </form>
    </div>
</div>
<!-- /.row -->
<?php include('../../layouts/footer1.php') ?>

           
