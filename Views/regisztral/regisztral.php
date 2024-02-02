<?php require_once __DIR__ . "/../layouts/header.php"; ?>

        
        <?php if(isset($result["uzenet"])) { ?>
            <h1><?= $result["uzenet"] ?></h1>
            <?php if($result["ujra"]) { ?>
                <a href="belepes">Próbálja újra!</a>
            <?php } ?>
        <?php } ?>

                    

<?php require_once __DIR__ . "/../layouts/footer.php"; ?>
