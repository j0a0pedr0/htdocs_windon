<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_FULL ?>css/style.css" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <title><?php echo self::titulo; ?></title>
</head>
<body>
<header>
    <div class="center">
        <div class="logo">
            <h2>JP-CODE</h2>
        </div><!--logo-->

        <nav class="menu">
            <?php
                foreach ($this->items as $key => $value){
                    echo '<a href="'.INCLUDE_PATH.strtolower($value).'">'.$value.'<a/>';
                }
            ?>
        </nav><!--menu-->
        <div class="clear"></div>
    </div><!--center-->
</header>