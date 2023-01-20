<?php

session_start();

require_once('../funcs.php');
loginCheck();

$id = $_POST['id'];
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
$img = '';


// imgがある場合
if (isset($_FILES['img']['name'])) {
    $fileName = $_FILES['img']['name'];
    $img = date('YmdHis') . '_' . $_FILES['img']['name'];
}


// 簡単なバリデーション処理。
if(trim($nickname) ==='' || trim($first_contact) ==='' || trim($last_contact) ===''){
    redirect('post.php?error');
}

if (!empty($fileName)) {
    $check =  substr($fileName, -3);
    if ($check != 'jpg' && $check != 'gif' && $check != 'png') {
        $err[] = '写真の内容を確認してください。';
    }
}

// もしerr配列に何か入っている場合はエラーなので、redirect関数でindexに戻す。その際、GETでerrを渡す。
if (isset($err) && count($err) > 0) {
    redirect('post.php?error=1');
}

/**
 * (1)$_FILES['img']['tmp_name']... 一時的にアップロードされたファイル
 * (2)'../picture/' . $image...写真を保存したい場所。先にフォルダを作成しておく。
 * (3)move_uploaded_fileで、（１）の写真を（２）に移動させる。
 */
if (isset($_FILES['img']['name'])) {
    move_uploaded_file($_FILES['img']['tmp_name'], '../images/' . $img);
}


//2. DB接続します
$pdo = db_conn();

//３．データ登録SQL作成
if (isset($_FILES['img']['name'])) {
    $stmt = $pdo->prepare('UPDATE match_list
                        SET
                        nickname = :nickname,
                        name = :name,
                        age = :age,
                        summary = :summary,
                        occupation = :occupation,
                        
                        workplace = :workplace,
                        annual_income = :annual_income,
                        former_school = :former_school,
                        how_we_met = :how_we_met,

                        birthplace = :birthplace,
                        height = :height,
                        desire_for_marriage = :desire_for_marriage,
                        marital_history = :marital_history,
                        children = :children,
                        
                        figure = :figure,
                        last_contact = :last_contact,
                        first_contact = :first_contact,
                        first_date_place = :first_date_place,
                        img = :img
                        WHERE id = :id;');
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
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    
} else {
    //  画像がない場合imgは省略する。
    $stmt = $pdo->prepare('UPDATE match_list
                        SET
                        nickname = :nickname,
                        name = :name,
                        age = :age,
                        summary = :summary,
                        last_contact = :last_contact,
                        first_contact = :first_contact,
                        WHERE id = :id;');
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
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
}


$status = $stmt->execute(); //実行

//４．データ登録処理後
if (!$status) {
    sql_error($stmt);
} else {
    redirect('index.php');
}
