<?php
require_once __DIR__."/autoload/autoload.php";
$title = '';
$description = '';
$status = '';
$error = [];
if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];


    if ($title == '') {
        $error['title'] = "Vui lòng nhập tiêu đề";
    }
    if ($description == '') {
        $error['description'] = "Vui lòng nhập miêu tả";
    }
    if (empty($error)) {
        $data = [
            'title' => $title,
            'description' => $description,
            'date_create' => date('Y-m-d H:i:s'),
            'status' => $status,
            'user_id' => $_SESSION['user_id'],
            'public' => 0,
        ];
        $insert = $db->insert('blog', $data);
        $_SESSION['success'] = "Thêm bài viết mới thành công";
        header("location:index.php");
    }
}

?>
<?php require_once __DIR__."/layout/header.php"; ?>

<div class="header_bottom_right" style="float: unset;width: 50%;margin: 0 auto;">

    <div class="group">
        <div class="col span_2_of_3" style="width: 100%">
            <div class="contact-form">
                <h2 style="font-size: 20px" align="center">Thêm bài viết mới</h2>
                <form method="post">
                    <div>
                        <span><label>Title</label></span>
                        <span><input type="text" class="textbox" name="title"
                                     value=""></span>
                        <?php if (isset($error['email'])): ?>
                            <p class="text-danger"><?php echo $error['email']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div>
                        <span><label>Description</label></span>
                        <span><textarea name="description"></textarea></span>
                        <?php if (isset($error['description'])): ?>
                            <p class="text-danger"><?php echo $error['description']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div>
                        <span><label>Status</label></span>
                        <span>
                            <input type="radio" class="textbox" name="status" checked value="1" id="status1">
                            <label for="status1" style="cursor: pointer">Only member</label>
                            <input type="radio"
                                   class="textbox"
                                   name="status" value="2" id="status2">
                            <label for="status2" style="cursor: pointer">Public</label></span>
                    </div>
                    <div class="">
                        <span><input name="add" type="submit" value="Add" class="myButton">
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>




