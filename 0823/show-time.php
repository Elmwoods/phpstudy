<?php
/**
 * Created by PhpStorm.
 * User: JG-XXX
 * Date: 2017/8/23
 * Time: 9:14
 */
if (!empty($_GET['type'] && $_GET['type'] == '2')) {
    $t1 = date('H:i:s');
} elseif (!empty($_GET['type'] && $_GET['type'] == '3')) {
    $t1 = date('Y年m月d日 H:i:s');
} else {
    $t1 = date('Y年m月d日');
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>显示与逻辑混合</title>
</head>
<body>
<a href="?type=1">1</a>
<a href="?type=2">2</a>
<a href="?type=3">3</a>

<h1><?php echo $t1; ?></h1>

</body>
</html>

