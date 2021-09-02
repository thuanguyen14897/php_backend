<?php
require_once __DIR__."/../../autoload/autoload.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
if (isset($_GET['public'])) {
    $public = $_GET['public'];
}
$comment = $db->fetchID('comment', $id);

if ($public == 1) {
    $data = [
        'status' => 1,
    ];
} elseif ($public == 2) {
    $data = [
        'status' => 2,
    ];
}

$id_public = $db->update("comment", $data, array('id' => $id));
if ($id_public > 0) {
    if ($public == 1) {
        $_SESSION['success'] = "Public thành công";
    } elseif ($public == 2) {
        $_SESSION['success'] = "UnPublic thành công";
    }
    header("location:list.php");
} else {
    $_SESSION['error'] = "Public thất bại";
    header("location:list.php");
}
?>