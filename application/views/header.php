<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"> 
        <title>Mikon ja unskan levyt!</title>

        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/styles.css" />
    </head>
    <body>
        <div class="header-bar">
            <h1>Mikon ja unskan vinskat ja vinylssonit</h1>
            <a href="<?php echo site_url('records'); ?>">Levyt</a>
            <a href="<?php echo site_url('lists'); ?>">Listat</a>

            <?php if(!$this->ion_auth->logged_in()) { ?>
                <a class="login-link" href="<?php echo site_url('auth/login'); ?>">Sisään</a>
            <?php } else { ?>
                <a class="login-link" href="<?php echo site_url('auth/logout'); ?>">Ulos</a>
            <?php } ?>
        </div>