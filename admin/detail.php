<?php
session_start();
require_once('../funcs.php');
require_once('../common/head_parts.php');
require_once('../common/nav.php');

loginCheck();

$id = $_GET['id'];
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM match_list WHERE id=:id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
if ($status == false) {
    sql_error($stmt);
} else {
    $row = $stmt->fetch();
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <?= head_parts('内容更新')?>
    <script type="module" script src="js/func.js"></script>
</head>
<body class="bg-light">
    <header>
    <?= nav_parts()?>
    </header>
    <?php if (isset($_GET['error'])): ?>
        <p class="text-danger">記入内容を確認してください</p>
    <?php endif;?>

    <div class = "row">
    <div class ="col-md-8 order-md-1 p-5">

    <form method="POST" action="update.php" enctype="multipart/form-data">

    <div class="mb-3">
        <label for="img" class="form-label">画像投稿</label>
        <input type="file" name="img">
        </div>
        
        <div class="mb-3">
            <label for="title" class="form-label">登録名</label>
            <input type="text" class="form-control" name="nickname" id="nickname" aria-describedby="nickname" value = "<?= $row["nickname"]?>">
            <div id="emailHelp" class="form-text">※入力必須</div>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">本名</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="name" rows="4" cols="40" value = "<?=$row["name"]?>">
        </div>

        <div class="mb-3">
            <label for="age" class="form-label">年齢</label>
            <input type="text" class="form-control" name="age" id="age" aria-describedby="age" rows="4" cols="40"  value ="<?=$row["age"]?>">
        </div>

        <div class="mb-3">
            <label for="summary" class="form-label">自己紹介文サマリ</label>
            <textArea type="text" class="form-control" name="summary" id="summary" aria-describedby="summary" rows="4" cols="40" ><?=$row["summary"]?></textArea>
        </div>










        <div class="mb-3">
            <label for="occupation" class="form-label">職種</label>
            <input type="text" class="form-control" name="occupation" id="occupation" aria-describedby="occupation" rows="4" cols="40"  value ="<?=$row["occupation"]?>">
        </div>

        <div class="mb-3">
            <label for="workplace" class="form-label">勤務</label>
            <input type="text" class="form-control" name="workplace" id="workplace" aria-describedby="workplace" rows="4" cols="40"  value ="<?=$row["workplace"]?>">
        </div>

        <div class="mb-3">
            <label for="annual_income" class="form-label">年収</label>
            <input type="text" class="form-control" name="annual_income" id="annual_income" aria-describedby="annual_income" rows="4" cols="40"  value ="<?=$row["annual_income"]?>">
        </div>
        
        <div class="mb-3">
            <label for="latest_academic_background" class="form-label">最終学歴</label>
            <input type="text" class="form-control" name="latest_academic_background" id="latest_academic_background" aria-describedby="latest_academic_background" rows="4" cols="40"  value ="<?=$row["latest_academic_background"]?>">
        </div>

        <div class="mb-3">
            <label for="former_school" class="form-label">学校名</label>
            <input type="text" class="form-control" name="former_school" id="former_school" aria-describedby="former_school" rows="4" cols="40"  value ="<?=$row["former_school"]?>">
        </div>

        <div class="mb-3">
            <label for="desire_for_marriage" class="form-label">結婚願望</label>
            <select name="desire_for_marriage" value = "<?=$row["desire_for_marriage"]?>">
                <option value="未選択" >--選択してください--</option>
                <option value="すぐにでも" <?= $row["desire_for_marriage"] == 'すぐにでも' ? 'selected' : "" ?>>すぐにでも</option>
                <option value="2~3年以内にしたい" <?= $row["desire_for_marriage"] == '2~3年以内にしたい' ? 'selected' : "" ?>>2~3年以内にしたい</option>
                <option value="4~5年以内にしたい" <?= $row["desire_for_marriage"] == '4~5年以内にしたい' ? 'selected' : "" ?>>4~5年以内にしたい</option>
                <option value="期限はないが結婚はしたい" <?= $row["desire_for_marriage"] == '期限はないが結婚はしたい' ? 'selected' : "" ?>>期限はないが結婚はしたい</option>
                <option value="まだわからない" <?= $row["desire_for_marriage"] == 'まだわからない' ? 'selected' : "" ?>>まだわからない</option>
            </select>
        </div>


        <div class="mb-3">
            <label for="marital_history" class="form-label">結婚歴</label>
            <select name="marital_history" value = "<?=$row["marital_history"]?>">
                <option value="未選択" >--選択してください--</option>
                <option value="未婚" <?= $row["marital_history"] == '未婚' ? 'selected' : "" ?>>未婚</option>
                <option value="離婚" <?= $row["marital_history"] == '離婚' ? 'selected' : "" ?>>離婚</option>
                <option value="死別" <?= $row["marital_history"] == '死別' ? 'selected' : "" ?>>死別</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="children" class="form-label">子ども願望</label>
            <select name="children" value = "<?=$row["children"]?>">
                <option value="未選択" >--選択してください--</option>
                <option value="絶対にほしい" <?= $row["children"] == '絶対にほしい' ? 'selected' : "" ?>>絶対にほしい</option>
                <option value="できればほしい" <?= $row["children"] == 'できればほしい' ? 'selected' : "" ?>>できればほしい</option>
                <option value="相手と相談して決める" <?= $row["children"] == '相手と相談して決める' ? 'selected' : "" ?>>相手と相談して決める</option>
                <option value="子どもはほしくない" <?= $row["children"] == '子どもはほしくない' ? 'selected' : "" ?>>子どもはほしくない</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="birthplace" class="form-label">出身</label>
            <input type="text" class="form-control" name="birthplace" id="birthplace" aria-describedby="birthplace" rows="4" cols="40"  value ="<?=$row["birthplace"]?>">
        </div>

        <div class="mb-3">
            <label for="height" class="form-label">身長(cm)</label>
            <input type="number" class="form-control" name="height" id="height" aria-describedby="height" rows="4" cols="40"  value ="<?=$row["height"]?>">
        </div>

        <div class="mb-3">
            <label for="figure" class="form-label">体型</label>
            <select name="figure" value = "<?=$row["figure"]?>">
                <option value="未選択" >--選択してください--</option>
                <option value="スリム" <?= $row["figure"] == 'スリム' ? 'selected' : "" ?>>スリム</option>
                <option value="やや細め" <?= $row["figure"] == 'やや細め' ? 'selected' : "" ?>>やや細め</option>
                <option value="普通" <?= $row["figure"] == '普通' ? 'selected' : "" ?>>普通</option>
                <option value="筋肉質" <?= $row["figure"] == '筋肉質' ? 'selected' : "" ?>>筋肉質</option>
                <option value="ややぽっちゃり" <?= $row["figure"] == 'ややぽっちゃり' ? 'selected' : "" ?>>ややぽっちゃり</option>
                <option value="太め" <?= $row["figure"] == '太め' ? 'selected' : "" ?>>太め</option>
    </select>
        </div>

        <div class="mb-3">
            <label for="how_we_met" class="form-label">出会いのきっかけ</label>
            <input type="text" class="form-control" name="how_we_met" id="how_we_met" aria-describedby="how_we_met" rows="4" cols="40"  value ="<?=$row["how_we_met"]?>">
        </div>


        <div class="mb-3">
            <label for="last_contact" class="form-label">直近コンタクト</label>
            <input type="date" class="form-control" name="last_contact" id="last_contact" aria-describedby="last_contact" rows="4" cols="40"  value ="<?=$row["last_contact"]?>">
            <div id="emailHelp" class="form-text">※入力必須</div>
        </div>

        <div class="mb-3">
            <label for="first_contact" class="form-label">初回コンタクト</label>
            <input type="date" class="form-control" name="first_contact" id="first_contact" aria-describedby="first_contact" rows="4" cols="40"  value ="<?=$row["first_contact"]?>">
            <div id="emailHelp" class="form-text">※入力必須</div>
        </div>


        <div class="mb-3">
            <label for="first_date_place" class="form-label">初回食事場所</label>
            <input type="text" class="form-control" name="first_date_place" id="first_date_place" aria-describedby="first_date_place" rows="4" cols="40"  value ="<?=$row["first_date_place"]?>">
        </div>

        <div class="mb-3">
        <label for="first_date_place" class="form-label">食事メモ</label>
        <div id="div2"></div>
<input type="button" value="追加" onclick="clickBtn3()" />
<input type="button" value="削除" onclick="clickBtn4()" />

<script>
  function clickBtn3() {
    const div2 = document.getElementById("div2");
    // 要素の追加
    if (!div2.hasChildNodes()) {
      const input1 = document.createElement("input");
      input1.setAttribute("type", "textarea");
      input1.setAttribute("class", "form-control");
      input1.setAttribute("value", "【YYYY年MM月YY日】");
      input1.setAttribute("rows", 6);

      div2.appendChild(input1);
    }
  }
  function clickBtn4() {
    const div2 = document.getElementById("div2");
    if (div2.hasChildNodes()) {
      div2.removeChild(div2.firstChild);
    }
  }
</script>
        </div>


        <hr>

        <input type="hidden" name="id" id="id" aria-describedby="id" value="<?= $row["id"] ?>">

        <button type="submit" class="btn btn-primary">修正</button>
    </form>
    <form method="POST" action="delete.php?id=<?= $row['id'] ?>" class="mb-3">
        <button type="submit" class="btn btn-danger">削除</button>
    </form>


</div>
</div>
    


</body>

</html>
