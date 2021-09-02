<?php

require_once __DIR__."/autoload/autoload.php";

?>


<?php include('layouts/header1.php')
?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="content-top">
        <a style="text-decoration: unset;color: unset;" href="<?= modules('admin/list_admin.php') ?>">User</a>
    </div>
    <div class="content-top">
        <a style="text-decoration: unset;color: unset;" href="<?= modules('blog/list.php') ?>">Blog</a>
    </div>
    <div class="content-top">
        <a style="text-decoration: unset;color: unset;" href="<?= modules('comment/list.php') ?>">Comment</a>
    </div>
</div>
<br>
<br>
<br>
<!-- /#page-wrapper -->
<?php include('layouts/footer1.php') ?>
        