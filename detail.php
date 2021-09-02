<?php
require_once __DIR__."/autoload/autoload.php";
$blog_id = -1;
if (isset($_GET['blog_id'])) {
    $blog_id = $_GET['blog_id'];
}
if ($blog_id != -1) {
    $blog = $db->fetchID('blog', $blog_id);
}
if (empty($blog)) {
    echo "<script> alert('Không có bài viết');location.href='index.php' </script>";
}
$user_id = 0;
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}

$sql = "SELECT * FROM comment  WHERE blog_id = $blog_id AND status = 2";
$comments = $db->fetchsql($sql);
?>
<?php require_once __DIR__."/layout/header.php"; ?>
    <style>
        .detail-title {

            font-size: 20px;
            color: blueviolet;
        }

        .wrap-detail-title {
            margin-top: 10px;
            margin-bottom: 8px;
        }

        .detail-content {
            margin-top: 10px;
        }

        .comment {
            float: right;
            width: 40%;
        }

        .detail-blog {
            float: left;
            width: 60%;
        }

        .user-comment {
            float: left;
            width: 70%;
            margin-bottom: 10px;
        }

        .date-comment {
            float: right;
            width: 30%;
            margin-bottom: 10px;
        }

        .content-comment {
            margin-top: 10px;
        }
    </style>
    <div class="main-content">
    </div>
    <div class="main">
        <div class="content">
            <div id="result">
            </div>
            <div class="content_top">
                <div class="heading">
                    <h3>Chi tiết bài viết</h3>
                </div>

                <div class="see">
                </div>
                <div class="clear"></div>
            </div>
            <div class="detail-blog">
                <?php $user = $db->fetchID('user', $blog['user_id']); ?>
                <div class="wrap-detail-title"><span class="detail-title"><?= $blog['title'] ?></span>
                    <span style="font-style: italic">Người đăng : <?= $user['name'] ?> </span></div>
                <div style="font-style: italic">Ngày đăng : <?= date('d-m-Y H:i:s',
                        strtotime($blog['date_create'])); ?></div>
                <div class="detail-content"><?= $blog['description'] ?></div>

                <div class="list-comment" style="margin-top: 20px;width: 95%">
                    <h3 style="font-weight: bold">Danh sách bình luận</h3>
                    <?php require_once __DIR__."/error/notification.php"; ?>

                    <?php if (!empty($comments)) { ?>
                        <?php foreach ($comments as $key => $value) { ?>
                            <?php
                            if ($value['user_id'] == 0) {
                                $title = 'Người ẩn danh';
                            } else {
                                $user = $db->fetchID('user', $value['user_id']);
                                $title = $user['name'];
                            }
                            ?>
                            <div style="margin-top: 10px; margin-bottom: 8px; border: 1px solid #CACACA; width: 95%;padding: 5px;">
                                <?php
                                $delete = '';
                                if ($user_id != 0) {
                                    if ($value['user_id'] == $user_id) {
                                        $delete = '<a href="delete_comment.php?id_comment='.$value['id'].'&blog_id='.$blog_id.'">(Delete)</a>';
                                    }
                                }
                                ?>
                                <div class="user-comment"><?= $title ?> <?= $delete ?></div>
                                <div class="date-comment">Ngày : <?= date('d-m-Y H:i:s',
                                        strtotime($value['date_create'])); ?></div>
                                <div class="content-comment"><?= $value['content'] ?></div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
            <div class="comment">
                <div class="comment-write">
                    <div class="col " style="width: 100%">
                        <div class="contact-form">
                            <form method="post" action="comment.php">
                                <input type="hidden" name="blog_id" value="<?= $blog_id ?>">
                                <div>
                                    <span><label>Comment</label></span>
                                    <span><textarea name="content"></textarea></span>
                                </div>
                                <div class="">
                                    <input name="comment" type="submit" value="Comment" class="myButton">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once __DIR__."/layout/footer.php" ?>