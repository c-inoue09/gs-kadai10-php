<?php 


function nav_parts(){
    return <<<EOM
    <header>
        <nav class="navbar navbar-expand-lg navbar-light  bg-dark ">
            <div class="container-fluid text-white">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="post.php">登録する</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="index.php">一覧</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="logout.php">ログアウト</a>
                </li>
                </ul>
            </div>
        </nav>
    </header>
    EOM;
}