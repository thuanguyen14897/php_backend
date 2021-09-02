<?php
require_once __DIR__."/../../autoload/autoload.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$user_edit = $db->fetchID("user", $id);

if (isset($_POST['edit'])) {

    if (postInput('password') != '') {
        $data =
            [
                "name" => postInput('name'),
                "password" => MD5(postInput('password')),
                "email" => postInput('email'),
                "sex" => postInput('sex'),
                "birthday" => date('Y-m-d', strtotime(postInput('birthday'))),
                "role" => postInput('role'),
            ];
    } else {
        $data =
            [
                "name" => postInput('name'),
                "email" => postInput('email'),
                "sex" => postInput('sex'),
                "birthday" => date('Y-m-d', strtotime(postInput('birthday'))),
                "role" => postInput('role'),
            ];
    }


    $error = [];
    if (postInput('name') == '') {
        $error['name'] = "Vui lòng nhập tên";

    }
    if (postInput('email') == '') {
        $error['email'] = "Vui lòng nhập email";
    } else {
        $is_check = $db->fetchOne("user", "email='".$data['email']."' AND id !='".$id."' ");
        if ($is_check != null) {
            $error['email'] = "email đã tồn tại";
        }
    }
    if (postInput('birthday') == '') {
        $error['birthday'] = "Vui lòng ngày sinh";
    }


    if (empty($error)) {
        $id_update = $db->update("user", $data, array("id" => $id));

        if ($id_update) {
            $_SESSION['success'] = "Cập nhập thành công";
            header("location:list_admin.php");
        } else {
            $_SESSION['error'] = "Cập nhập thất bại";
            header("location:list_admin.php");
        }
    }

}

?>

<?php include('../../layouts/header1.php') ?>
<!-- Page Heading Noi dung-->
<div id="page-wrapper">
    <div class="content-user">
        <div class="title-user">Cập thành viên</div>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="label-title" for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Nhap ho ten"
                       value="<?= $user_edit['name'] ?>">

                <?php if (isset($error['name'])): ?>
                    <div class="text-danger"> <?php echo $error['name']; ?></div>

                <?php endif; ?>
            </div>
            <div class="form-group">
                <label class="label-title" for="phone">Birthday</label>
                <input type="date" name="birthday" class="form-control birthday" id="birthday" placeholder=""
                       value="<?php echo date('Y-m-d',
                           strtotime($user_edit['birthday'])) ?>">
                <?php if (isset($error['birthday'])): ?>
                    <div class="text-danger"> <?php echo $error['birthday']; ?></div>

                <?php endif; ?>
            </div>
            <div class="form-group">
                <label class="label-title" for="email">Email</label>
                <input type="text" name="email" class="form-control email" id="email" placeholder="Nhap email"
                       value="<?= $user_edit['email'] ?>">
                <?php if (isset($error['email'])): ?>
                    <div class="text-danger"> <?php echo $error['email']; ?></div>

                <?php endif; ?>
            </div>
            <div class="form-group">
                <label class="label-title" for="password">Password</label>
                <input type="password" name="password" class="form-control password" id="password"
                       placeholder="Nhap password"
                       value="">
            </div>
            <div class="form-group">
                <label class="label-title" for="password">Sex</label>
                <div style="text-align: end">
                    <input type="radio" <?= $user_edit['sex'] == 0 ? 'checked' : '' ?> name="sex" class=" sex" id="sex1"
                           value="0" checked> <label for="sex1">Nam</label>
                    <input type="radio" <?= $user_edit['sex'] == 1 ? 'checked' : '' ?> name="sex" class=" sex" id="sex2"
                           value="1"> <label for="sex2">Nữ</label>
                </div>

            </div>
            <br>
            <div class="form-group">
                <label class="label-title" for="role">Role</label>
                <select name="role" class="form-control" id="role">
                    <option <?= $user_edit['role'] == 1 ? 'selected' : '' ?> value="1">Member</option>
                    <option <?= $user_edit['role'] == 2 ? 'selected' : '' ?> value="2">Admin</option>
                </select>

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

           
