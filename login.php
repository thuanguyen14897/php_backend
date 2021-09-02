<?php
require_once __DIR__."/autoload/autoload.php";
$error = [];
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    if ($email == '') {
        $error['email'] = "Vui lòng nhập email";
    }
    if ($password == '') {
        $error['ps'] = "Vui lòng nhập mật khẩu";
    }
    if (empty($error)) {
        $sql = "email = '$email' and password = '$password' and role = '1'";
        $user = $db->fetchOne('user', $sql);
        if ($user != null) {
            $_SESSION['name'] = $user['name'];
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            echo "<script> alert('Đăng nhập thành công');location.href='index.php' </script>";
        } else {
            $_SESSION['error'] = "Đăng nhập thất bại";
        }

    }
}

?>
<?php require_once __DIR__."/layout/header.php"; ?>

<div class="header_bottom_right" style="float: unset;width: 50%;margin: 0 auto;">
    <div class=" group">
        <div class="col span_2_of_3" style="width: 100%">
            <div class="contact-form">
                <?php require_once __DIR__."/error/notification.php"; ?>
                <h2 style="font-size: 20px" align="center">Đăng Nhập</h2>
                <form action="" method="post">
                    <div>
                        <span><label>Email</label></span>
                        <span><input type="text" class="textbox" name="email"></span>
                        <?php if (isset($error['email'])): ?>
                            <p class="text-danger"><?php echo $error['email']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div>
                        <span><label>Password</label></span>
                        <span><input type="password" class="textbox" name="password"></span>
                        <?php if (isset($error['password'])): ?>
                            <p class="text-danger"><?php echo $error['password']; ?></p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <span><input type="submit" value="Đăng Nhập" name="login" class="myButton"></span>
                    </div>
                    <div class="submit1">
                        <span><input type="submit" name="resgister" value="Đăng Ký " class="myButton"></span>
                    </div>
                    <div class="clear"></div>
                </form>
            </div>
        </div>
    </div>
</div>


