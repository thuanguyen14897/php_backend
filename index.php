<?php
require_once __DIR__."/autoload/autoload.php";
if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = '';
}
$user_id = 0;
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM blog WHERE (status = '2' OR user_id = '$user_id') AND public = '1'  ";
    $blogs = $db->fetchsql($sql);
} else {
    $array = [
        'status' => 2,
        'public' => 1,
    ];
    $blogs = $db->fetch('blog', $array);
}
?>
<?php require_once __DIR__."/layout/header.php"; ?>
    <div class="main-content">
        <?php if (isset($_SESSION['user_id'])) { ?>
            <button class="add-blog"><a style="color: unset" href="add_blog.php">Thêm bài viết</a></button>
        <?php } ?>
    </div>
    <div class="main">
        <div class="content">
            <div id="result">
            </div>
            <div class="content_top">
                <div class="heading">
                    <h3>Bài viết</h3>
                </div>

                <div class="see">
                </div>
                <div class="clear"></div>
            </div>
            <?php require_once __DIR__."/error/notification.php"; ?>
            <?php if (!empty($blogs)) { ?>
                <?php foreach ($blogs as $key => $blog) { ?>
                    <?php $user = $db->fetchID('user', $blog['user_id']); ?>
                    <div class="section group">
                        <div class="wrap-bolg">
                            <div class="title-bolg">
                                <?php if ($blog['status_delete'] == 1) { ?>
                                    <a style="color: unset">
                                        <del><?= $blog['title'] ?></del>
                                    </a>
                                <?php } else { ?>
                                    <a style="color: unset"
                                       href="detail.php?blog_id=<?= $blog['id'] ?>"><?= $blog['title'] ?></a>
                                <?php } ?>
                                <?= $user_id == $blog['user_id'] && $blog['status_delete'] == 0 ? '(<a href="delete_blog.php?blog_id='.$blog['id'].'" style="color: red">Delete</a>)' : '' ?>
                            </div>
                            <div class="content-blog"><?= $blog['description'] ?></div>
                        </div>
                        <div class="fotter-bolg">
                            <div class="info-bolg"><span style="font-style: italic">Ngày đăng: <?= date('d-m-Y H:i:s',
                                        strtotime($blog['date_create'])); ?></span>
                                &nbsp;&nbsp;<span style="font-style: italic">Người đăng :<?= $user['name'] ?></span>
                            </div>
                            <?php if ($blog['status_delete'] == 1) { ?>
                                <?php $user_delete = $db->fetchID('user', $blog['user_delete']) ?>
                                <div class="delete-blog" style="font-style: italic">Người xoá
                                    : <?= $user_delete['name'] ?></div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>

<?php require_once __DIR__."/layout/footer.php" ?>