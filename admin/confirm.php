<?php
// confirm.phpの中身は、ほとんどpost.phpに似ています。

session_start();
require_once('../funcs.php');
require_once('../common/head_parts.php');
require_once('../common/nav.php');
loginCheck();

// post受け取る
$nickname = $_POST['nickname'];
$name = $_POST['name'];
$age = $_POST['age'];
$summary = $_POST['summary'];

$occupation =$_POST['occupation'];
$workplace =$_POST['workplace'];
$annual_income =$_POST['annual_income'];
$latest_academic_background =$_POST['latest_academic_background'];
$former_school =$_POST['former_school'];
$how_we_met =$_POST['how_we_met'];
$birthplace =$_POST['birthplace'];
$height =$_POST['height'];
$desire_for_marriage =$_POST['desire_for_marriage'];
$marital_history =$_POST['marital_history'];
$children =$_POST['children'];
$figure =$_POST['figure'];
$first_date_place =$_POST['first_date_place'];

$first_contact = $_POST['first_contact'];
$last_contact = $_POST['last_contact'];

    if ($_FILES['img']['name']!==''){
    $file_name = $_SESSION['post']['file_name'] = $_FILES['img']['name']; //上2つの文を1文に
    $image_data = $_SESSION['post']['image_data'] = $_FILES['img']['image_data'] = file_get_contents($_FILES['img']['tmp_name']);
    $image_type = $_SESSION['post']['image_type'] = $_FILES['img']['image_type'] = exif_imagetype($_FILES['img']['tmp_name']);
}else{
    $file_name = $_SESSION['post']['file_name'] = '';
    $image_data = $_SESSION['post']['image_data'] = '';
    $image_type = $_SESSION['post']['image_type'] = '';
}



// 簡単なバリデーション処理。
if(trim($nickname) ==='' || trim($first_contact) ==='' || trim($last_contact) ===''){
    redirect('post.php?error');
}

if (!empty($file_name)) {
    $extension = substr($file_name, -3);
    if ($extension != 'jpg' && $extension != 'gif' && $extension != 'png') {
       redirect('post.php?error');
    }
}

//セッションの中に$_POST['title']と$_POST['content']をいれる(「戻る」押したときに消える問題の対処)
$_SESSION['post']['nickname'] = $_POST['nickname'];
$_SESSION['post']['name'] = $_POST['name'];
$_SESSION['post']['age'] = $_POST['age'];
$_SESSION['post']['summary'] = $_POST['summary'];
$_SESSION['post']['occupation'] =$_POST['occupation'];

$_SESSION['post']['workplace'] =$_POST['workplace'];
$_SESSION['post']['annual_income'] =$_POST['annual_income'];
// $_SESSION['post']['latest_academic_background'] =$_POST['latest_academic_background'];
$_SESSION['post']['former_school'] =$_POST['former_school'];
$_SESSION['post']['how_we_met'] =$_POST['how_we_met'];

$_SESSION['post']['birthplace'] =$_POST['birthplace'];
$_SESSION['post']['height'] =$_POST['height'];
$_SESSION['post']['desire_for_marriage'] =$_POST['desire_for_marriage'];
$_SESSION['post']['marital_history'] =$_POST['marital_history'];
$_SESSION['post']['children'] =$_POST['children'];

$_SESSION['post']['figure'] =$_POST['figure'];
$_SESSION['post']['first_date_place'] =$_POST['first_date_place'];
$_SESSION['post']['first_contact'] = $_POST['first_contact'];
$_SESSION['post']['last_contact'] = $_POST['last_contact'];


// imgある場合

?>

<!DOCTYPE html>
<html lang="ja">

<head>
<?= head_parts('マッチング管理')?>
</head>

<body>
    <header>
        <?= nav_parts()?>
    </header>

    <!-- errorを受け取ったら、エラー文出力。 -->

    <form method="POST" action="register.php" enctype="multipart/form-data" class="mb-3">

    <div class="mb-3">
        <label for="img" class="form-label">画像投稿</label>
        <input type="hidden" name="img">
     </div>

        <?php if($image_data) :?>
            <!-- 画像を表示 -->
            <div class="mb-3">
                <img src="image.php">
            </div>
        <?php endif; ?>

    <div class="mb-3">
            <label for="title" class="form-label">登録名：<?= $nickname ?></label>
            <input type="hidden" class="form-control" name="nickname" id="nickname" aria-describedby="nickname" value = "<?= $nickname?>">
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">本名：<?= $name ?></label>
            <input type="hidden" class="form-control" name="name" id="name" aria-describedby="name" rows="4" cols="40" value = "<?= $name?>">
        </div>

        <div class="mb-3">
            <label for="age" class="form-label">年齢：<?= $age ?></label>
            <input type="hidden" class="form-control" name="age" id="age" aria-describedby="age" rows="4" cols="40" value = "<?= $age?>">
        </div>

        <div class="mb-3">
            <label for="summary" class="form-label">自己紹介文サマリ：</label>
            <p><?= $summary?></p>
            <textarea  style="display:none"  class="form-control" name="summary" id="summary" aria-describedby="summary" rows="4" cols="40"><?= $summary?></textarea>
        </div>




        <div class="mb-3">
            <label for="occupation" class="form-label">職種:<?=$occupation?></label>
            <input type="hidden" class="form-control" name="occupation" id="occupation" aria-describedby="occupation" rows="4" cols="40"  value ="<?= $occupation?>">
        </div>

        <div class="mb-3">
            <label for="workplace" class="form-label">勤務:<?=$workplace?></label>
            <input type="hidden" class="form-control" name="workplace" id="workplace" aria-describedby="workplace" rows="4" cols="40"  value ="<?=$workplace?>">
        </div>

        <div class="mb-3">
            <label for="annual_income" class="form-label">年収:<?=$annual_income?></label>
            <input type="hidden" class="form-control" name="annual_income" id="annual_income" aria-describedby="annual_income" rows="4" cols="40"  value ="<?=$annual_income?>">
        </div>
        
        <div class="mb-3">
            <label for="latest_academic_background" class="form-label">最終学歴:<?=$latest_academic_background?></label>
            <input type="hidden" class="form-control" name="latest_academic_background" id="latest_academic_background" aria-describedby="latest_academic_background" rows="4" cols="40"  value ="<?=$latest_academic_back?>">
        </div>

        <div class="mb-3">
            <label for="former_school" class="form-label">学校名:<?=$former_school?></label>
            <input type="hidden" class="form-control" name="former_school" id="former_school" aria-describedby="former_school" rows="4" cols="40"  value ="<?=$former_school?>">
        </div>

        <div class="mb-3">
            <label for="desire_for_marriage" class="form-label">結婚願望: <?=$desire_for_marriage?></label>
            <input type="hidden" class="form-control" name="desire_for_marriage" id="desire_for_marriage" aria-describedby="desire_for_marriage" rows="4" cols="40"  value ="<?=$desire_for_marriage?>">
        </div>

        <div class="mb-3">
            <label for="marital_history" class="form-label">結婚歴: <?=$marital_history?></label>
            <input type="hidden" class="form-control" name="marital_history" id="marital_history" aria-describedby="marital_history" rows="4" cols="40"  value ="<?=$marital_history?>">
            <!-- <select name="marital_history" value = >
                <option value="未選択" selected hidden>--選択してください--</option>
                <option value="未婚">未婚</option>
                <option value="離婚">離婚</option>
                <option value="死別">死別</option>
            </select> -->
        </div>

        <div class="mb-3">
            <label for="children" class="form-label">子ども願望: <?=$children?> </label>
            <input type="hidden" class="form-control" name="children" id="children" aria-describedby="children" rows="4" cols="40"  value ="<?=$children?>">
                <!-- <option value="未選択" selected hidden>--選択してください--</option>
                <option value="絶対にほしい">絶対にほしい</option>
                <option value="できればほしい">できればほしい</option>
                <option value="相手と相談して決める">相手と相談して決める</option>
                <option value="子どもはほしくない">子どもはほしくない</option> -->
            </select>
        </div>

        <div class="mb-3">
            <label for="birthplace" class="form-label">出身: <?=$birthplace?></label>
            <input type="hidden" class="form-control" name="birthplace" id="birthplace" aria-describedby="birthplace" rows="4" cols="40"  value ="<?=$birthplace?>">
        </div>

        <div class="mb-3">
            <label for="height" class="form-label">身長(cm): <?=$height?></label>
            <input type="hidden" class="form-control" name="height" id="height" aria-describedby="height" rows="4" cols="40"  value ="<?=$height?>">
        </div>

        <div class="mb-3">
            <label for="figure" class="form-label">体型: <?=$figure?> </label>
                <input type="hidden" class="form-control" name="figure" id="figure" aria-describedby="figure" rows="4" cols="40"  value ="<?=$figure?>">
                <!-- <option value="未選択" selected hidden>--選択してください--</option>
                <option value="スリム">スリム</option>
                <option value="やや細め">やや細め</option>
                <option value="普通">普通</option>
                <option value="筋肉質">筋肉質</option>
                <option value="ややぽっちゃり">ややぽっちゃり</option>
                <option value="太め">太め</option> -->
            </select>
        </div>

        <div class="mb-3">
            <label for="how_we_met" class="form-label">出会いのきっかけ: <?=$how_we_met?></label>
            <input type="hidden" class="form-control" name="how_we_met" id="how_we_met" aria-describedby="how_we_met" rows="4" cols="40"  value ="<?=$how_we_met?>">
        </div>

        <div class="mb-3">
            <label for="last_contact" class="form-label">直近コンタクト：<?= $last_contact ?></label>
            <input type="hidden" class="form-control" name="last_contact" id="last_contact" aria-describedby="last_contact" rows="4" cols="40" value = "<?= $last_contact?>">
        </div>

        <div class="mb-3">
            <label for="first_contact" class="form-label">初回コンタクト：<?= $first_contact ?></label>
            <input type="hidden" class="form-control" name="first_contact" id="first_contact" aria-describedby="first_contact" rows="4" cols="40" value = "<?= $first_contact?>">
        </div>

        <div class="mb-3">
            <label for="first_date_place" class="form-label">初回食事場所: <?=$first_date_place?></label>
            <input type="hidden" class="form-control" name="first_date_place" id="first_date_place" aria-describedby="first_date_place" rows="4" cols="40"  value ="<?=$first_date_place?>">
        </div>


        <button type="submit" class="btn btn-primary">投稿</button>
    </form>

    <a href="post.php?re-register=true">前の画面に戻る</a>
</body>
</html>
