<?php
require_once __DIR__."/autoload/autoload.php";
if (!isset($_SESSION['user_id'])) {
    echo "<script> alert('Plase Logged');location.href='index.php' </script>";
}
$name = '';
$email = '';
$password = '';
$birthday = '';
$sex = '';
$error = [];
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $user = $db->fetchID('user', $user_id);
}
if (isset($_POST['update'])) {
    $email = $_POST['email'];
    if ($_POST['password'] != '') {
        $password = md5($_POST['password']);
        $passwordagain = md5($_POST['passwordagain']);
        if ($password == '') {
            $error['password'] = "Vui lòng nhập mật khẩu";
        }
        if ($passwordagain != ($password)) {
            $error['passwordagain'] = "Mật khẩu không giống nhau";
        }
    }
    $name = $_POST['name'];
    $birthday = date('Y-m-d', strtotime($_POST['birthday']));
    $sex = $_POST['sex'];


    if ($email == '') {
        $error['email'] = "Vui lòng nhập email";
    } else {
        $is_check = $db->fetchOne("user", "email='".$email."' AND id !='".$user_id."' ");
        if ($is_check != null) {
            $error['email'] = "Email đã tồn tại";
        }
    }
    if ($name == '') {
        $error['name'] = "Vui lòng nhập họ tên";
    }
    if ($birthday == '') {
        $error['birthday'] = "Vui lòng nhập ngày sinh";
    }

    if (empty($error)) {
        if ($password != '') {
            $data = [
                'name' => $name,
                'sex' => $sex,
                'email' => $email,
                'birthday' => $birthday,
                'password' => $password,
                'role' => 1,
            ];
        } else {
            $data = [
                'name' => $name,
                'sex' => $sex,
                'email' => $email,
                'birthday' => $birthday,
                'role' => 1,
            ];
        }
        $insert = $db->update('user', $data, array("id" => $user_id));
        if ($insert) {
            echo "<script> alert('Cập nhập thông tin thành công');location.href='profile.php' </script>";
        }
    }
}


?>
<?php require_once __DIR__."/layout/header.php"; ?>

<div class="header_bottom_right" style="float: unset;width: 50%;margin: 0 auto;">

    <div class="group">
        <div class="col span_2_of_3" style="width: 100%">
            <div class="contact-form">
                <?php require_once __DIR__."/error/notification.php"; ?>
                <h2 style="font-size: 20px" align="center">Thông tin cá nhân</h2>
                <form method="post">
                    <div>
                        <span><label>E-mail</label></span>
                        <span><input type="text" class="textbox" name="email"
									<?php if (isset($user)): ?>
                                        value="<?php echo $user['email'] ?>"
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
                        <span><input type="text" class="textbox" name="name"
                                <?php if (isset($user)): ?>
                                    value="<?php echo $user['name'] ?>"
                                <?php endif; ?>></span>
                        <?php if (isset($error['name'])): ?>
                            <p class="text-danger"><?php echo $error['name']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div>
                        <span><label>Birthday</label></span>
                        <span><input style="width: 99%; border: 1px solid #CACACA; padding: 5px;" type="date"
                                     class="textbox" name="birthday"
                                <?php if (isset($user)): ?>
                                    value="<?php echo date('Y-m-d',
                                        strtotime($user['birthday'])) ?>"
                                <?php endif; ?>></span>
                        <?php if (isset($error['birthday'])): ?>
                            <p class="text-danger"><?php echo $error['birthday']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div>
                        <span><label>Sex</label></span>
                        <span>
                            <input type="radio" class="textbox" name="sex"
                                   <?= isset($user) ? $user['sex'] == 0 ? 'checked' : '' : '' ?> value="0" id="sex1">
                            <label for="sex1" style="cursor: pointer">Nam</label>
                            <input type="radio"
                                   class="textbox"
                                   name="sex" value="1" <?= isset($user) ? $user['sex'] == 1 ? 'checked' : '' : '' ?>
                                   id="sex2">
                            <label for="sex2" style="cursor: pointer">Nữ</label></span>
                    </div>

                    <div class="">
                        <span><input name="update" type="submit" value="Submit" class="myButton">
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>




