<?php
require_once __DIR__."/../../autoload/autoload.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$id_delete = $db->delete("user", $id);
if ($id_delete > 0) {
    $_SESSION['success'] = "Xoá thành công";
    header("location:list_admin.php");
} else {
    $_SESSION['error'] = "Xoá thất bại";
    header("location:list_admin.php");
}
?>