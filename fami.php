<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Family Tree</title>
    <link href="css/fami.css" rel="stylesheet">
</head>

<body>
    <div class="tree">
        <ul>
            <li>
                <a href="#">祖父A</a>
                <a href="#" class="spouse"></a> <!-- 配偶者同士の線 -->
                <a href="#">祖母A</a>
                <ul>
                    <li>
                        <a href="#">父A</a>
                        <a href="#" class="spouse"></a> <!-- 配偶者同士の線 -->
                        <a href="#">母A</a>
                        <ul>
                            <li>
                                <a href="#">私</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">兄A</a>
                    </li>
                    <li>
                        <a href="#">妹A</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">祖父B</a>
                <a href="#" class="spouse"></a> <!-- 配偶者同士の線 -->
                <a href="#">祖母B</a>
                <ul>
                    <li>
                        <a href="#">父B</a>
                        <a href="#" class="spouse"></a> <!-- 配偶者同士の線 -->
                        <a href="#">母B</a>
                        <ul>
                            <li>
                                <a href="#">兄B</a>
                            </li>
                            <li>
                                <a href="#">妹B</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">兄C</a>
                    </li>
                    <li>
                        <a href="#">妹C</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</body>

</html>