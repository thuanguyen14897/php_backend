<?php
require_once __DIR__."/autoload/autoload.php";
$user_id = 0;
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}
$content = '';
if (isset($_POST['comment'])) {
    $content = $_POST['content'];
    $blog_id = $_POST['blog_id'];
    if ($content == '') {
        echo "<script> alert('Vui lòng nhập nôi dung bình luận')</script>";
    } else {
        if ($user_id != 0) {
            $status = 2;
        } else {
            $status = 1;
        }
        $data = [
            'content' => $content,
            'user_id' => $user_id,
            'blog_id' => $blog_id,
            'date_create' => date('Y-m-d H:i:s'),
            'status' => $status,
        ];
        $insert = $db->insert('comment', $data);
//        header("location:detail.php?blog_id=$blog_id");
        echo "<script> alert('Bình luận thành công');location.href='detail.php?blog_id=$blog_id' </script>";
    }
}
?>