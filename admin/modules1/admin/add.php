<?php

//  include('autoload/autoload.php') ;
require_once __DIR__."/../../autoload/autoload.php";
$data =
    [
        "name" => postInput('name'),
        "password" => MD5(postInput('password')),
        "email" => postInput('email'),
        "sex" => postInput('sex'),
        "birthday" => date('Y-m-d', strtotime(postInput('birthday'))),
        "role" => postInput('role'),
    ];
if (isset($_POST['add'])) {
    $error = [];
    if (postInput('name') == '') {
        $error['name'] = "Vui lòng nhập tên";

    }
    if (postInput('password') == '') {
        $error['password'] = 'Vui lòng nhập mật khẩu';

    }
    if (postInput('email') == '') {
        $error['email'] = "Vui lòng nhập email";
    } else {
        $is_check = $db->fetchOne("user", "email='".$data['email']."'");
        if ($is_check != null) {
            $error['email'] = "email đã tồn tại";
        }
    }
    if (postInput('birthday') == '') {
        $error['birthday'] = "Vui lòng ngày sinh";
    }
    if (empty($error)) {
        $id_insert = $db->insert("user", $data);
        if ($id_insert > 0) {
            $_SESSION['success'] = "Thêm mới thành công";
            header("location:list_admin.php");
        } else {
            $_SESSION['error'] = "Thêm mới thất bại";
            header("location:list_admin.php");
        }
    }

}

?>

<?php include('../../layouts/header1.php') ?>
<!-- Page Heading Noi dung-->
<div id="page-wrapper">
    <div class="content-user">
        <div class="title-user">Thêm mới thành viên</div>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="label-title" for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Nhap ho ten"
                       value="">

                <?php if (isset($error['name'])): ?>
                    <div class="text-danger"> <?php echo $error['name']; ?></div>

                <?php endif; ?>
            </div>
            <div class="form-group">
                <label class="label-title" for="phone">Birthday</label>
                <input type="date" name="birthday" class="form-control birthday" id="birthday" placeholder=""
                       value="">
                <?php if (isset($error['birthday'])): ?>
                    <div class="text-danger"> <?php echo $error['birthday']; ?></div>

                <?php endif; ?>
            </div>
            <div class="form-group">
                <label class="label-title" for="email">Email</label>
                <input type="text" name="email" class="form-control email" id="email" placeholder="Nhap email"
                       value="">
                <?php if (isset($error['email'])): ?>
                    <div class="text-danger"> <?php echo $error['email']; ?></div>

                <?php endif; ?>
            </div>
            <div class="form-group">
                <label class="label-title" for="password">Password</label>
                <input type="password" name="password" class="form-control password" id="password"
                       placeholder="Nhap password"
                       value="">
                <?php if (isset($error['password'])): ?>
                    <div class="text-danger"> <?php echo $error['password']; ?></div>

                <?php endif; ?>
            </div>
            <div class="form-group">
                <label class="label-title" for="password">Sex</label>
                <div style="text-align: end">
                    <input type="radio" name="sex" class=" sex" id="sex1"
                           value="0" checked> <label for="sex1">Nam</label>
                    <input type="radio" name="sex" class=" sex" id="sex2"
                           value="1"> <label for="sex2">Nữ</label>
                </div>

            </div>
            <br>
            <div class="form-group">
                <label class="label-title" for="role">Role</label>
                <select name="role" class="form-control" id="role">
                    <option value="1">Member</option>
                    <option value="2">Admin</option>
                </select>

            </div>
            <!--            <div class="form-group">-->
            <!--                <label class="label-title" for="address">Địa chỉ</label>-->
            <!--                <textarea cols="3" rows="3" name="address" class="form-control address" id="address"></textarea>-->
            <!--            </div>-->
            <button class="btn" name="add" value="add">Thêm</button>
            <br>
            <br>
            <br>
        </form>
    </div>
</div>
<!-- /.row -->
<?php include('../../layouts/footer1.php') ?>

           
