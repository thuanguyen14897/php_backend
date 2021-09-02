<?php
require_once __DIR__."/../../autoload/autoload.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$id_delete = $db->delete("comment", $id);
if ($id_delete > 0) {
    $_SESSION['success'] = "Xoá thành công";
    header("location:list.php");
} else {
    $_SESSION['error'] = "Xoá thất bại";
    header("location:list.php");
}
?>