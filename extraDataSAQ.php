<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8" />
</head>

<body>
    <?php
    require("dataconf.php");
    require("config.php");

    $saq = new ExtraData();
    $result = $saq->lireFichier();

    if ($result) {
        $result = $saq->traiterDonnees();
    }
    ?>
</body>

</html>