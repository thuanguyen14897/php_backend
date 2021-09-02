<?php

require_once __DIR__."/../../autoload/autoload.php";
$comment = $db->fetchAll("comment");
?>
<?php include('../../layouts/header1.php') ?>
    <style>
        .title-list {
            color: brown;
            margin-bottom: 10px;
            font-size: 20px;
        }
    </style>
    <div id="page-wrapper">
<?php include('../../../error/notification.php') ?>

    <div class="title-list">Danh sách comment</div>
    <div class="table-responsive">
        <table class="table" style="width: 100%">
            <thead>
            <tr>
                <th>Stt</th>
                <th>content</th>
                <th>Blog</th>
                <th>Public</th>
                <th>User</th>
                <th style="width: 150px">Tác vụ</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($comment as $key => $row) : ?>
                <tr>
                    <?php
                    $title = '';
                    if ($row['user_id'] == 0) {
                        $title = 'Người ẩn danh';
                    } else {
                        $user = $db->fetchID('user', $row['user_id']);
                        $title = $user['name'];
                    }
                    $blog = $db->fetchID('blog', $row['blog_id']);
                    ?>
                    <td><?php echo(++$key) ?></td>
                    <td><?php echo $row['content'] ?>
                    </td>
                    <td><?php echo $blog['title']; ?></td>
                    <td><?= $row['status'] == 1 ? '<a style="color:red;text-decoration:unset" href="'.modules('comment/update_public.php?id='.$row['id'].'&public=2').'">UnPblic</a>' : '<a style="color:green;text-decoration:unset" href="'.modules('comment/update_public.php?id='.$row['id'].'&public=1').'">Public</a>' ?></td>
                    <td><?= $title ?></td>
                    <td>
                        <?php if ($row['user_id'] == 0) { ?>
                            <button class="delete"><a
                                        href="<?= modules('comment/delete.php?id='.$row['id'].'') ?>">Delete</a>
                            </button>
                        <?php } ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </div>

    <!-- /.row -->
<?php include('../../layouts/footer1.php') ?>