<?php
/**
 * User: nicolas
 * Date: 19/08/2017
 * Time: 11:27
 */

require '../vendor/autoload.php';
$app = new \App\App();
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quel langue Apprendre</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>
<body>
<div class="container">
    <form>
        <div class=" row">
            <h5 class="page-header">Vous pouvez apprendre : </h5>
        </div>
        <div class=" row">
            <div class="col-lg-5"></div>
            <div class="col-lg-6">
                <?= $app->newLangue() ?>
            </div>
        </div>
        <div class=" row">
            <div class="col-lg-5"></div>
            <div class="col-lg-6">
                <button class="btn btn-primary"> Valider</button>
            </div>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
