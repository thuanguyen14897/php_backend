<?php

require_once __DIR__."/autoload/autoload.php";
if (isset($_SESSION['user_id'])) {
    echo "<script> alert('Logged');location.href='index.php' </script>";
}
$name = '';
$email = '';
$password = '';
$birthday = '';
$sex = '';
$error = [];
if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $passwordagain = md5($_POST['passwordagain']);
    $name = $_POST['name'];
    $birthday = date('Y-m-d', strtotime($_POST['birthday']));
    $sex = $_POST['sex'];


    if ($email == '') {
        $error['email'] = "Vui lòng nhập email";
    } else {
        $is_check = $db->fetchOne("user", "email='".$email."'");
        if ($is_check != null) {
            $error['email'] = "Email đã tồn tại";
        }
    }
    if ($password == '') {
        $error['password'] = "Vui lòng nhập mật khẩu";
    }
    if ($passwordagain != ($password)) {
        $error['passwordagain'] = "Mật khẩu không giống nhau";
    }
    if ($name == '') {
        $error['name'] = "Vui lòng nhập họ tên";
    }
    if ($birthday == '') {
        $error['birthday'] = "Vui lòng nhập ngày sinh";
    }

    if (empty($error)) {
        $data = [
            'name' => $name,
            'sex' => $sex,
            'email' => $email,
            'birthday' => $birthday,
            'password' => $password,
            'role' => 1,
        ];
        $insert = $db->insert('user', $data);
        $_SESSION['success'] = "Đăng ký thành công,Vui lòng đăng nhập";
        header("location:login.php");
    }
}

?>
<?php require_once __DIR__."/layout/header.php"; ?>

<div class="header_bottom_right" style="float: unset;width: 50%;margin: 0 auto;">

    <div class=" group">
        <div class="col span_2_of_3" style="width: 100%">
            <div class="contact-form">
                <h2 style="font-size: 20px" align="center">Đăng Ký Thành Viên</h2>
                <form method="post">
                    <div>
                        <span><label>E-mail</label></span>
                        <span><input type="text" class="textbox" name="email"
									<?php if (isset($_POST['email'])): ?>
                                        value="<?php echo $email ?>"
                                    <?php endif; ?>
						    		></span>
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
                        <span><label>Nhap Lai Password</label></span>
                        <span><input type="password" class="textbox" name="passwordagain"></span>
                        <?php if (isset($error['passwordagain'])): ?>
                            <p class="text-danger"><?php echo $error['passwordagain']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div>
                        <span><label>Name</label></span>
                        <span><input type="text" class="textbox" name="name" value="<?php echo $name ?>"></span>
                        <?php if (isset($error['name'])): ?>
                            <p class="text-danger"><?php echo $error['name']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div>
                        <span><label>Birthday</label></span>
                        <span><input style="width: 99%; border: 1px solid #CACACA; padding: 5px;" type="date"
                                     class="textbox" name="birthday" value="<?php echo $birthday ?>"></span>
                        <?php if (isset($error['birthday'])): ?>
                            <p class="text-danger"><?php echo $error['birthday']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div>
                        <span><label>Sex</label></span>
                        <span>
                            <input type="radio" class="textbox" name="sex" checked value="0" id="sex1">
                            <label for="sex1" style="cursor: pointer">Nam</label>
                            <input type="radio"
                                   class="textbox"
                                   name="sex" value="1" id="sex2">
                            <label for="sex2" style="cursor: pointer">Nữ</label></span>
                    </div>

                    <div class="">
                        <span><input name="register" type="submit" value="Submit" class="myButton">
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>




