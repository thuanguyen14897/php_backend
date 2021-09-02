<?php

require_once __DIR__."/../../autoload/autoload.php";
$admin = $db->fetchAll("user");

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
        <a style="text-decoration: unset;color: unset;" href="<?= modules('admin/add.php') ?>">Thêm thành viên</a>
    </div>
    <div class="title-list">Danh sách nhân viên</div>
    <div class="table-responsive">
        <table class="table" style="width: 100%">
            <thead>
            <tr>
                <th>Stt</th>
                <th>Name</th>
                <th>Email</th>
                <th>Sex</th>
                <th>Birthday</th>
                <th>Role</th>
                <th style="width: 150px">Tác vụ</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($admin as $key => $row) : ?>
                <tr>
                    <td><?php echo(++$key) ?></td>
                    <td><?php echo $row['name'] ?>
                    </td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?= $row['sex'] == 0 ? 'Nam' : 'Nữ' ?></td>
                    <td><?php echo date('d-m-Y',
                            strtotime($row['birthday'])); ?></td>
                    <td><?= $row['role'] == 1 ? 'member' : 'admin' ?></td>
                    <td>
                        <button class="edit"><a href="<?= modules('admin/edit.php?id='.$row['id'].'') ?>">Edit</a>
                        </button>
                        <button class="delete"><a href="<?= modules('admin/delete.php?id='.$row['id'].'') ?>">Delete</a>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </div>

    <!-- /.row -->
<?php include('../../layouts/footer1.php') ?>