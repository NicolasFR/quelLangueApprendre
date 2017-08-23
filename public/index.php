<?php
/**
 * User: nicolas
 * Date: 19/08/2017
 * Time: 11:27
 */

require '../vendor/autoload.php';
$app = new \App\App();

$db = new \App\DB();

$res = $db->connect()->query("SELECT * FROM langue;");

$data = $res->fetch();

?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?= $app->newLangue() ?>
</body>
</html>
