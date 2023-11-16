<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="/assets/img/icons/favicon-recman2.png">
    <title><?php echo $pageTitle ?></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/styles/style.css" rel="stylesheet">
</head>
<body>
<?php
if (\App\Form\Handler\ErrorHandler::has_errors()) {
    ?>
    <div class="alert alert-danger" role="alert">
        <?php foreach (\App\Form\Handler\ErrorHandler::getErrors() as $error) :
            echo $error;
        endforeach;?>
    </div>
    <?php
}
if (isset($view)) {
    include APP_ROOT . "/views/$view.php";
}
?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
