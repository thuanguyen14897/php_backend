<?php

require_once __DIR__."/../../autoload/autoload.php";
$blog = $db->fetchAll("blog");
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
    <div class="content-top" style="margin-bottom: 10px;width: unset">
        <a style="text-decoration: unset;color: unset;" href="<?= modules('blog/add.php') ?>">Thêm bài viết</a>
    </div>
    <div class="title-list">Danh sách bài viết</div>
    <div class="table-responsive">
        <table class="table" style="width: 100%">
            <thead>
            <tr>
                <th>Stt</th>
                <th>title</th>
                <th>description</th>
                <th>Status</th>
                <th>Public</th>
                <th>User</th>
                <th>Delete</th>
                <th style="width: 150px">Tác vụ</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($blog as $key => $row) : ?>
                <tr>
                    <?php $user = $db->fetchID('user', $row['user_id']); ?>
                    <td><?php echo(++$key) ?></td>
                    <td><?php echo $row['title'] ?>
                    </td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?= $row['status'] == 1 ? 'Only-Member' : 'Public' ?></td>
                    <td><?= $row['public'] == 0 ? '<a style="color:red;text-decoration:unset" href="'.modules('blog/update_public.php?id='.$row['id'].'&public=1').'">UnPblic</a>' : '<a style="color:green;text-decoration:unset" href="'.modules('blog/update_public.php?id='.$row['id'].'&public=0').'">Public</a>' ?></td>
                    <td><?= $user['name'] ?></td>
                    <td><?= $row['status_delete'] == 1 ? 'Deleted' : 'unDelete' ?>
                        <br>
                        <?php if ($row['status_delete'] == 1) {
                            $user_delete = $db->fetchID('user', $row['user_delete']);
                            echo "Người xoá: ".$user_delete['name'];
                        } ?>
                    </td>
                    <td>
                        <button class="edit"><a href="<?= modules('blog/edit.php?id='.$row['id'].'') ?>">Edit</a>
                        </button>
                        <button class="delete"><a href="<?= modules('blog/delete.php?id='.$row['id'].'') ?>">Delete</a>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </div>

    <!-- /.row -->
<?php include('../../layouts/footer1.php') ?>