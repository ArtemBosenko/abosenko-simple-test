<h1>Welcome to Amin page!</h1>
<h2>Here the list of app Users!</h2>
<ul>
    <?php
    foreach ($users as $user) :?>
        <li>UserName: <?= $user['name']?>, UserSurname: <?= $user['surname']?>, UserSurname: <?= $user['mobile_phone']?></li>
    <?php endforeach;?>
</ul>
