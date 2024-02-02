<?php require_once __DIR__ . "/../layouts/header.php"; ?>

        
    <div class="container">
        <h2>Hír hozzáadása</h2>
        <form id="form" action="submit-hir" method="post">
            <div class="form-group">
                <label for="hir">Hír (max 300 karakter):</label>
                <textarea class="form-control" id="hir" name="hir"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Hozzáad</button>
        </form>
        <div class="hir_megjegyzes"><?= $megj1 ?></div>
        <h2>Komment hozzáadása</h2>
        <form id="form" action="submit-komment" method="post">
        <div class="form-group">
            <label for="komment">Komment (max 300 karakter):</label>
            <textarea class="form-control" id="komment" name="komment"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Hozzáad</button>
        </form>
        <div class="komment_megjegyzes"><?= $megj2 ?></div>
    </div>
    <script src="public/js/validator.js"></script>

                    

<?php require_once __DIR__ . "/../layouts/footer.php"; ?>
