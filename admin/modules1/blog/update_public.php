<?php
require_once __DIR__."/../../autoload/autoload.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
if (isset($_GET['public'])) {
    $public = $_GET['public'];
}
$blog = $db->fetchID('blog', $id);

if ($public == 0) {
    $data = [
        'public' => 0,
    ];
} elseif ($public == 1) {
    $data = [
        'public' => 1,
    ];
}

$id_delete = $db->update("blog", $data, array('id' => $id));
if ($id_delete > 0) {
    if ($public == 1) {
        $_SESSION['success'] = "Public thành công";
    } elseif ($public == 0) {
        $_SESSION['success'] = "UnPublic thành công";
    }
    header("location:list.php");
} else {
    $_SESSION['error'] = "Public thất bại";
    header("location:list.php");
}
?>