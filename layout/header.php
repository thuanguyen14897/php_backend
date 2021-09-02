<!DOCTYPE HTML>
<html>
<title>Blog new</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<style>
    .success {
        background: green;
        color: white;
        padding: 10px !important;
        border-radius: 10px;
        margin-bottom: 5px;
    }

    .error {
        background: red;
        color: white;
        padding: 10px !important;
        border-radius: 10px;
        margin-bottom: 5px;
    }
</style>
<link href="<?php echo public_fontend() ?>css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="<?php echo public_fontend() ?>css/slider.css" rel="stylesheet" type="text/css" media="all"/>

<script type="text/javascript" src="<?php echo public_fontend() ?>js/move-top.js"></script>
<script type="text/javascript" src="<?php echo public_fontend() ?>js/easing.js"></script>
<script type="text/javascript" src="<?php echo public_fontend() ?>js/startstop-slider.js"></script>
<style type="text/css">
    #search {
        color: #fff;
        background: #383838;
        border: 1px solid #585858;
        border-radius: 5px;
        padding: 5px;
    }

    #search:hover {
        background: red;
    }

    #keyword {
        width: 300px;
        padding: 5px;
    }

    .main {
        margin-top: 30px;
    }

    .add-blog {
        float: right;
        margin-top: 10px;
        border-radius: 20px;
        padding: 8px;
        color: red;
        background: white;
        border: 1px solid;
        cursor: pointer;
    }

    .add-blog:hover {
        background: red;
        color: white;
    }

    .section {
        border: 1px solid #CECECE;
        margin-top: 10px;
        padding: 10px;
    }

    .wrap-bolg {
        width: 60%;
        float: left;
    }

    .fotter-bolg {
        float: right;
        width: 40%;
        text-align: right;
    }

    .title-bolg {
        font-style: italic;
        color: #0B86AA;
        cursor: pointer;
        margin-bottom: 8px;
    }

    .info-bolg {
        font-size: 15px
    }
</style>
</head>
<body>
<div class="wrap">
    <div class="header">
        <div class="headertop_desc">
            <div class="call" style="line-height: 30px;">
                <p><span><a href="index.php">Blog New</a></span></p>
            </div>
            <?php if (isset($_SESSION['user_id'])) { ?>
                <div class="account_desc" style="height: 30px;line-height: 30px;">
                    <ul>
                        <li style="font-size: 20px"><a>Xin chào : <?= $_SESSION['name'] ?></a></li>
                        <li style="font-size: 20px"><a href="profile.php">Thông tin cá nhân</a></li>
                        <li style="font-size: 20px"><a href="logout.php">Đăng xuất</a></li>
                    </ul>
                </div>
            <?php } else { ?>
                <div class="account_desc" style="height: 30px;line-height: 30px;">
                    <ul>
                        <li style="font-size: 20px"><a href="login.php">Đăng Nhập</a></li>
                        <li style="font-size: 20px"><a href="register.php">Đăng Ký</a></li>
                    </ul>
                </div>
            <?php } ?>
            <div class="account_desc">
                <form method="get" action="timkiem.php">
                    <input name="keyword" id="keyword" class=" " type="search" placeholder="Search"
                           aria-label="Search">
                    <button id="search" class="" type="submit">
                        Search
                    </button>
                </form>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
