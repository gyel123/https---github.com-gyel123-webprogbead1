<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $ablakcim['cim'] . ((isset($ablakcim['mottó'])) ? ('|' . $ablakcim['mottó']) : '') ?></title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="public/css/style.css">
        <?php if (file_exists('public/css/'.$page.'.css')) { ?>
		    <link rel="stylesheet" href="public/css/<?= $page ?>.css" type="text/css"><?php 
        } ?>
       	<link rel="shortcut icon" href="public/pics/pizza.ico" type="image/x-icon">
    </head>
    <body class="bg-danger">
        <div id="content" class="col-md-9 wrapper">    
            <header class="container-fluid">
                <header>
                    <?php if (isset($_SESSION['login'])) { ?>Bejelentkezve: <strong><?= $_SESSION['csn'] . " " . $_SESSION['un'] . " (" . $_SESSION['login'] . ")" ?></strong><?php } ?>
                </header>
                <div class="container-fluid">
                    <aside id="nav">
                        <nav class="d-flex justify-content-end">
                            <ul id="nav-ul" class="nav flex-row">
                                <?php foreach ($oldalak as $url => $oldal) { ?>
                                    <?php if (!isset($_SESSION['login']) && $oldal['menun'][0] || isset($_SESSION['login']) && $oldal['menun'][1]) { ?>
                                        <li<?= (($oldal == $page) ? ' class="active"' : '') ?> class="nav-item">
                                            <a id="nav-link" class="nav-link" href="<?= ($url == '/') ? '' : ($url) ?>">
                                                <?= $oldal['szoveg'] ?>
                                            </a>
                                            </li>
                                        <?php } ?>
                                    <?php } ?>
                            </ul>
                        </nav>
                    </aside>
                    <div id="inner-content">