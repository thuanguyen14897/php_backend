<?php
require_once __DIR__."/autoload/autoload.php";
$id_comment = -1;
if (isset($_GET['id_comment'])) {
    $id_comment = $_GET['id_comment'];
}
$blog_id = -1;
if (isset($_GET['blog_id'])) {
    $blog_id = $_GET['blog_id'];
}
if ($id_comment != -1) {
    $blog = $db->delete('comment', $id_comment);
    if ($blog) {
        echo "<script> alert('Xoá bình luận thành công');location.href='detail.php?blog_id=$blog_id'; </script>";
    }
} else {
    echo "<script> alert('không tồn tại bình luận')</script>";
}

?>