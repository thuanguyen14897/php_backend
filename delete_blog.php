<?php
require_once __DIR__."/autoload/autoload.php";
$blog_id = -1;
if (isset($_GET['blog_id'])) {
    $blog_id = $_GET['blog_id'];
}
if ($blog_id != -1) {
//    $blog = $db->delete('blog', $blog_id);
    $data = [
        'status_delete' => 1,
        'user_delete' => $_SESSION['user_id'],
    ];
    $blog = $db->update('blog', $data, ['id' => $blog_id]);
    if ($blog) {
        echo "<script> alert('Xoá blog thành công');location.href='index.php';</script>";
    }
} else {
    echo "<script> alert('không tồn tại blog');location.href='index.php';</script>";
}

?>