<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="POST" action="insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>個人情報登録</legend>
                <label>名前：<input type="text" name="name"></label><br>
                <label>生年月日：<input type="date" name="birth"></label><br>
                <label>出身地：<input type="text" name="hometown"></label><br>
                <label>職業：<input type="text" name="job"></label><br>
                <!-- <label><textArea name="job"></textArea></label><br> -->
                <input type="submit" value="データ登録">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->
</body>

</html>