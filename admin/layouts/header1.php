<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <link href="<?php echo base_url() ?>public/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .header {
            text-transform: uppercase;
            margin: 0 auto;
            width: 80%;
            padding: 10px;
            color: chocolate;
            text-align: center;
            font-size: 20px;
            background-color: antiquewhite;
            display: flex;
            justify-content: space-between;
        }

        #page-wrapper {
            width: 80%;
            margin: 0 auto;
            margin-top: 20px;
        }

        .footer {
            width: 80%;
            margin: 0 auto;
            color: chocolate;
            text-align: center;
            font-size: 20px;
            background-color: antiquewhite;
            padding: 10px;
        }

        .content-top {
            float: right;
            padding: 8px;
            border: 1px solid red;
            border-radius: 50px;
            color: red;
            /* background: firebrick; */
            cursor: pointer;
            font-style: italic;
            margin-left: 10px;
            text-align: center;
            width: 60px;

        }
    </style>
    <style>
        .success {
            background: green;
            color: white;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 5px;
        }

        .error {
            background: red;
            color: white;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            overflow: hidden;

        }

        td, th {
            border-top: 1px solid #ECF0F1;
            padding: 10px;
        }

        td {
            border-left: 1px solid #ECF0F1;
            border-right: 1px solid #ECF0F1;
        }

        th {
            background-color: antiquewhite;
        }

        tr:nth-of-type(even) td {
            background-color: lighten(#4ECDC4, 35%);
        }

        .edit {
            border-radius: 10px;
            color: green;
            border: 1px solid green;
            background: white;
            padding: 5px 10px 5px 10px;
            font-size: 15px;
            cursor: pointer;
        }

        .edit:hover {
            background: green;
            color: white;
        }

        .edit > a {
            text-decoration: unset;
            color: unset;
        }

        .delete {
            color: red;
            background: white;
            border: 1px solid red;
            border-radius: 10px;
            padding: 5px 10px 5px 10px;
            font-size: 15px;
            cursor: pointer;
        }

        .delete:hover {
            background: red;
            color: white;
        }

        .delete > a {
            text-decoration: unset;
            color: unset;
        }

    </style>
    <style>
        .content-user {
            width: 50%;
            text-align: center;
            margin: 0 auto;
        }

        .title-user {
            color: brown;
            margin-bottom: 10px;
            font-size: 20px;
        }


        .label-title {
            width: 25%;
            height: 30px;
            line-height: 30px;
            float: left;
        }

        .form-group {
            margin-bottom: 10px;
        }

        .form-control {
            width: 70%;
            border: 1px solid #eee;
            padding: 8px;
            border-radius: 10px;
        }

        .btn {
            color: red;
            border: 1px solid;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 50px;
            background-color: unset;
            cursor: pointer;
            float: right;
        }

        .btn:hover {
            background-color: red;
            color: white;
        }

        .text-danger {
            color: red;
            font-style: italic;
        }
    </style>
</head>
<body>

<div id="wrapper">
    <div class="header">
        <div><a style="text-decoration: unset;color: unset" href="<?= base_url() ?>/admin">Admin Blog</a></div>
        <?php if (isset($_SESSION['admin_id'])) { ?>
            <div>Xin chào : <?= $_SESSION['admin_name'] ?> - <span style="color: blueviolet"><a
                            href="../logout_admin.php">Logout</a></span></div>
        <?php } ?>
    </div>