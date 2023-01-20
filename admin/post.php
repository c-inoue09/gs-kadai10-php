<?php
session_start();
require_once('../funcs.php');
require_once('../common/head_parts.php');
require_once('../common/nav.php');

loginCheck();

$nickname = '';
$name = '';
$age = '';
$summary = '';

$occupation ='';
$workplace ='';
$annual_income ='';
$latest_academic_background ='';
$former_school ='';
$how_we_met = '';
$birthplace ='';
$height ='';
$desire_for_marriage = '';
$marital_history = '';
$children = '';
$figure = '';
$first_date_place = '';

$first_contact = '';
$last_contact = '';


?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <?= head_parts('マッチング管理')?>
</head>

<body class = "bg-light vsc-initialized">
    <header>
    <?= nav_parts()?>
    </header>

    <?php if(isset($_GET['error'])) : ?>
        <!-- ifがtrueの場合の処理 -->
        <p class= 'text-danger'>記入内容を確認してください</p>
        <?php endif ?>

    <div class = "row">
    <div class ="col-md-8 order-md-1 p-5">

    <form method="POST" action="confirm.php" enctype="multipart/form-data">
        <div class="mb-3 col-md-6">
            <label for="title" class="form-label">登録名 <span class="form-text">※入力必須</span></label>
            <input type="text" class="form-control" name="nickname" id="nickname" aria-describedby="nickname" value = "<?= $nickname?>">
        </div>

        <div class="mb-3 col-md-6">
            <label for="name" class="form-label">本名</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="name" rows="4" cols="40" ><?= $name?></textArea>
        </div>

        <div class="mb-3 col-md-6">
            <label for="age" class="form-label">年齢</label>
            <input type="text" class="form-control" name="age" id="age" aria-describedby="age" rows="4" cols="40" ><?= $age?></input>
        </div>

        <div class="mb-3 col-md-6">
            <label for="summary" class="form-label">自己紹介文サマリ</label>
            <textArea type="text" class="form-control" name="summary" id="summary" aria-describedby="summary" rows="4" cols="40" ><?= $summary?></textArea>
        </div>


        <div class="mb-3 col-md-6">
            <label for="occupation" class="form-label">職種</label>
            <input type="text" class="form-control" name="occupation" id="occupation" aria-describedby="occupation" rows="4" cols="40"  value ="<?=$occupation?>">
        </div>

        <div class="mb-3 col-md-6">
            <label for="workplace" class="form-label">勤務</label>
            <input type="text" class="form-control" name="workplace" id="workplace" aria-describedby="workplace" rows="4" cols="40"  value ="<?=$workplace?>">
        </div>

        <div class="mb-3 col-md-6">
            <label for="annual_income" class="form-label">年収</label>
            <input type="text" class="form-control" name="annual_income" id="annual_income" aria-describedby="annual_income" rows="4" cols="40"  value ="<?=$annual_income?>">
        </div>
        
        <div class="mb-3 col-md-6">
            <label for="latest_academic_background" class="form-label">最終学歴</label>
            <input type="text" class="form-control" name="latest_academic_background" id="latest_academic_background" aria-describedby="latest_academic_background" rows="4" cols="40"  value ="<?=$latest_academic_background?>">
        </div>

        <div class="mb-3 col-md-6">
            <label for="former_school" class="form-label">学校名</label>
            <input type="text" class="form-control" name="former_school" id="former_school" aria-describedby="former_school" rows="4" cols="40"  value ="<?=$former_school?>">
        </div>

        <div class="mb-3 col-md-6">
            <label for="desire_for_marriage" class="form-label">結婚願望</label>
            <select class= "custom-select d-block w-100" name="desire_for_marriage" value = <?=$desire_for_marriage?>>
                <option value="未選択" selected hidden>--選択してください--</option>
                <option value="すぐにでも" >すぐにでも</option>
                <option value="2~3年以内にしたい" >2~3年以内にしたい</option>
                <option value="4~5年以内にしたい" >4~5年以内にしたい</option>
                <option value="期限はないが結婚はしたい" >期限はないが結婚はしたい</option>
                <option value="まだわからない" >まだわからない</option>
            </select>
        </div>

        <div class="mb-3 col-md-6">
            <label for="marital_history" class="form-label">結婚歴</label>
            <select class= "custom-select d-block w-100" name="marital_history" value = <?=$marital_history?>>
                <option value="未選択" selected hidden>--選択してください--</option>
                <option value="未婚">未婚</option>
                <option value="離婚">離婚</option>
                <option value="死別">死別</option>
            </select>
        </div>

        <div class="mb-3 col-md-6">
            <label for="children" class="form-label">子ども願望</label>
            <select class= "custom-select d-block w-100" name="children" value = <?=$children?>>
                <option value="未選択" selected hidden>--選択してください--</option>
                <option value="絶対にほしい">絶対にほしい</option>
                <option value="できればほしい">できればほしい</option>
                <option value="相手と相談して決める">相手と相談して決める</option>
                <option value="子どもはほしくない">子どもはほしくない</option>
            </select>
        </div>

        <div class="mb-3 col-md-6">
            <label for="birthplace" class="form-label">出身</label>
            <input type="text" class="form-control" name="birthplace" id="birthplace" aria-describedby="birthplace" rows="4" cols="40"  value ="<?=$birthplace?>">
        </div>

        <div class="mb-3 col-md-6">
            <label for="height" class="form-label">身長(cm)</label>
            <input type="number" class="form-control" name="height" id="height" aria-describedby="height" rows="4" cols="40"  value ="<?=$height?>">
        </div>

        <div class="mb-3 col-md-6">
            <label for="figure" class="form-label">体型</label>
            <select class= "custom-select d-block w-100" name="figure" value = <?=$figure?>>
                <option value="未選択" selected hidden>--選択してください--</option>
                <option value="スリム">スリム</option>
                <option value="やや細め">やや細め</option>
                <option value="普通">普通</option>
                <option value="筋肉質">筋肉質</option>
                <option value="ややぽっちゃり">ややぽっちゃり</option>
                <option value="太め">太め</option>
            </select>
        </div>

        <div class="mb-3 col-md-6">
            <label for="how_we_met" class="form-label">出会いのきっかけ</label>
            <input type="text" class="form-control" name="how_we_met" id="how_we_met" aria-describedby="how_we_met" rows="4" cols="40"  value ="<?=$how_we_met?>">
        </div>

        <div class="mb-3 col-md-6">
            <label for="last_contact" class="form-label">直近コンタクト<span class="form-text">※入力必須</span></label>
            <input type="date" class="form-control" name="last_contact" id="last_contact" aria-describedby="last_contact" rows="4" cols="40" ><?= $last_contact?></input>
        </div>

        <div class="mb-3 col-md-6">
            <label for="first_contact" class="form-label">初回コンタクト<span class="form-text">※入力必須</span></label>            
            <input type="date" class="form-control" name="first_contact" id="first_contact" aria-describedby="first_contact" rows="4" cols="40" ><?= $first_contact?></input>

        </div>

        <div class="mb-3 col-md-6">
            <label for="first_date_place" class="form-label">初回食事場所</label>
            <input type="text" class="form-control" name="first_date_place" id="first_date_place" aria-describedby="first_date_place" rows="4" cols="40"  value ="<?=$first_date_place?>">
        </div>

        <div class="mb-3 col-md-6">
        <label for="img" class="form-label">画像投稿</label>
        <input type="file" name="img">
     </div>

        <button type="submit" class="btn btn-primary">投稿する</button>
    </form>
    </div>
    </div>
</body>

</html>