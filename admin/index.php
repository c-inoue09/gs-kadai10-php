<?php
session_start();
require_once('../funcs.php');
require_once('../common/head_parts.php');
require_once('../common/nav.php');

loginCheck();

//２．データ登録SQL作成
$pdo = db_conn();
$stmt = $pdo->prepare('SELECT * FROM match_list');
$status = $stmt->execute();

//３．データ表示
$view = '';
if ($status == false) {
    sql_error($stmt);
} else {
    $contents = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <?= head_parts('管理画面')?>
</head>

<body id="main">
    <header>
    <?= nav_parts()?>
    </header>
    <div class="wrapper">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach ($contents as $content): ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <?php if($content['img']) : ?>
                                <!-- 画像が登録されている場合は ↓  -->
                                <img src="../images/<?= $content['img']?>" alt="" class="bd-placeholder-img card-img-top" >

                            <?php else : ?>
                                <!-- 画像が登録されていない場合は ↓  -->
                                <img src="../images/default_image/no_image_logo.png" alt="" class="bd-placeholder-img card-img-top" >
                            <?php endif ?>


                            <div class="card-body">
                                <h3><?= $content['nickname'] ?></h3>
                                <p class="card-text">
                                    【本名】 <?= nl2br($content['name']) ?>  【年齢】 <?= nl2br($content['age'])  ?> </br>
                                    【職種】 <?= nl2br($content['occupation']) ?>  【勤務先】 <?= nl2br($content['workplace'])  ?> 
                                </p>

                                <p class="card-text">
                                    【自己紹介サマリ】 </br>
                                    <?= nl2br($content['summary']) ?>
                                </p>
                                


                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">直近コンタクト:<?= $content['last_contact'] ?></small>
                                    <small class="text-muted">初回コンタクト:<?= $content['first_contact'] ?></small>
                                </div>
                                <a href="detail.php?id=<?=$content['id']?>" class="btn btn-outline-info stretched-link">詳細へ</a>
                            </div>
                        </div>
                    </div>
                <!-- </a> -->
                <?php endforeach ?>
            </div>
        </div>
    </div>
</body>
</html>
