<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?></title>
    <style>
        /* Set the iframe size */
        iframe {
            width: 100%;
            height: 100%;
            border: none;
        }
    </style>
</head>
<body>
<h1 class="text-center text-lg-start mt-4 pt-2">
    Hi, this is a sample of home page with iframe
</h1>
<div class="text-center text-lg-start mt-4 pt-2">
    <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="<?php echo App\Route\RouteRegistry::getRegisteredRoute('register') ?>" class="link-danger">Register</a></p>
</div>
<div class="text-center text-lg-start mt-4 pt-2">
    <p class="small fw-bold mt-2 pt-1 mb-0">Or just log in <a href="<?php echo App\Route\RouteRegistry::getRegisteredRoute('login') ?>" class="link-danger">Login</a></p>
</div>
<br>
<br>
<br>
<iframe src="https://en.wikipedia.org/wiki/PHP" title="Embedded Website"></iframe>
</body>
</html>
