<html>
    <head>
        <meta charset="utf-8" />
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" />
    </head>

    <?php
    if(!isset($_SESSION)){
        session_start();
    }
        require_once('controller/dispatcher.php');
    ?>
</html>