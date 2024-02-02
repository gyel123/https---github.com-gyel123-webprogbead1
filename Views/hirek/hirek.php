<?php require_once __DIR__ . "/../layouts/header.php"; ?>

        
    <div class="container">
        <table>
            <thead><tr><th scope="col">Név</th><th scope="col">Hír</th><th scope="col">Időpont</th></tr></thead>
            <tbody>
                <?php
                    foreach($rows as $row) {
                        echo '<tr>';
                        echo '<td>' . $row['nev'] . '</td>';
                        echo '<td>' . $row['hir'] . '</td>';
                        echo '<td>' . $row['idopont'] . '</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
                    

<?php require_once __DIR__ . "/../layouts/footer.php"; ?>
