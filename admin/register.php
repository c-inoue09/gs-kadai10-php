<?php
session_start();
require_once('../funcs.php');
loginCheck();

$nickname = $_POST['nickname'];
$name = $_POST['name'];
$age = $_POST['age'];
$summary = $_POST['summary'];
$occupation = $_POST['occupation'];

$workplace = $_POST['workplace'];
$annual_income = $_POST['annual_income'];
// $latest_academic_background = $_POST['latest_academic_background'];
$former_school = $_POST['former_school'];
$how_we_met = $_POST['how_we_met'];

$birthplace = $_POST['birthplace'];
$height = $_POST['height'];
$desire_for_marriage = $_POST['desire_for_marriage'];
$marital_history = $_POST['marital_history'];
$children = $_POST['children'];

$figure = $_POST['figure'];
$first_contact = $_POST['first_contact'];
$last_contact = $_POST['last_contact'];
// $first_date_place = $_POST['first_date_place'];
$img = '';


// 簡単なバリデーション処理追加。
if(trim($nickname) ==='' || trim($first_contact) ==='' || trim($last_contact) ===''){
    redirect('post.php?error');
}


// 画像がある場合は
    //imagesフォルダに画像を保存する
    //データベースにファイル名を保存する
if($_SESSION['post']['image_data']!==''){
    $img = date('YmdHis') . '_' . $_SESSION['post']['file_name'];
    file_put_contents("../images/${img}", $_SESSION['post']['image_data']);
}


//2. DB接続します
$pdo = db_conn();

//３．データ登録SQL作成
// $stmt = $pdo->prepare('INSERT INTO match_list(
//                             nickname, name, age, summary, occupation, 
//                             workplace, annual_income, latest_academic_background, former_school,  desire_for_marriage, 
//                             marital_history, children, birthplace, height, figure, 
//                             how_we_met, last_contact, first_contact, first_date_place, img
//                         )VALUES(
//                             :nickname, :name, :age, :summary, :occupation, 
//                             :workplace, :annual_income, :latest_academic_background, :former_school,  :desire_for_marriage, 
//                             :marital_history, :children, :birthplace, :height, :figure, 
//                             :how_we_met, :last_contact, :first_contact, :first_date_place, :img
//                         )');

$stmt = $pdo->prepare('INSERT INTO match_list(
                            nickname, name, age, summary, occupation, 
                            workplace, annual_income,  former_school,  desire_for_marriage, 
                            marital_history, children, birthplace, height, figure, 
                            how_we_met, last_contact, first_contact,  first_date_place, img
                        )VALUES(
                            :nickname, :name, :age, :summary, :occupation, 
                            :workplace, :annual_income,  :former_school,  :desire_for_marriage, 
                            :marital_history, :children, :birthplace, :height, :figure, 
                            :how_we_met, :last_contact, :first_contact,  :first_date_place, :img
                        )');

$stmt->bindValue(':nickname', $nickname, PDO::PARAM_STR);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':age', $age, PDO::PARAM_INT);
$stmt->bindValue(':summary', $summary, PDO::PARAM_STR);
$stmt->bindValue(':occupation',$occupation, PDO::PARAM_STR);

$stmt->bindValue(':workplace',$workplace, PDO::PARAM_STR);
$stmt->bindValue(':annual_income',$annual_income, PDO::PARAM_STR);
// $stmt->bindValue(':latest_academic_background',$latest_academic_background, PDO::PARAM_STR);
$stmt->bindValue(':former_school',$former_school, PDO::PARAM_STR);
$stmt->bindValue(':how_we_met',$how_we_met, PDO::PARAM_STR);

$stmt->bindValue(':birthplace',$birthplace, PDO::PARAM_STR);
$stmt->bindValue(':height',$height, PDO::PARAM_INT);
$stmt->bindValue(':desire_for_marriage',$desire_for_marriage, PDO::PARAM_STR);
$stmt->bindValue(':marital_history',$marital_history, PDO::PARAM_STR);
$stmt->bindValue(':children',$children, PDO::PARAM_STR);

$stmt->bindValue(':figure',$figure, PDO::PARAM_STR);
$stmt->bindValue(':last_contact', $last_contact, PDO::PARAM_STR);
$stmt->bindValue(':first_contact', $first_contact, PDO::PARAM_STR);
$stmt->bindValue(':first_date_place',$first_date_place, PDO::PARAM_STR);
$stmt->bindValue(':img', $img, PDO::PARAM_STR);

$status = $stmt->execute(); //実行

//４．データ登録処理後
if (!$status) {
    sql_error($stmt);
} else {
    $_SESSION['post'] = [] ;
    redirect('index.php');
}


