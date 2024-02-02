<?php require_once __DIR__ . "/../layouts/header.php"; ?>

<main>
    <h1>Pizza History</h1>

    <form style="background-color:transparent; width: fit-content; margin-left:auto; margin-right:auto;" name="tableselect" text="Tábla választás" method="POST">
        <select style="margin-left:auto; margin-right:auto;" name="pizza" required="required" onchange="javascript:tableselect.submit();">
            <option value="">Válasszon pizzat!</option>
            <?php
            foreach ($pizzak['nev'] as $pizza) { ?>

                <option value="<?php echo $pizza['nev']; ?>" <?php if (isset($_POST['pizza']) && $_POST['pizza'] == $pizza['nev']) {
                                                                    echo "selected=selected";
                                                                } ?>><?php echo $pizza['nev']; ?></option>

            <?php echo $pizza['nev']; } ?>
        </select>
        <?= $ar ?>
            
        <br>
        <br>
        <br>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Név</th>
                    <th scope="col">Darab</th>
                    <th scope="col">Felvétel</th>
                    <th scope="col">Kiszállítás</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if (isset($_POST['pizza'])) {
                    foreach ($rendelesek["rendeles"] as $rendeles) {
                        if ($rendeles['pizzanev'] == $_POST['pizza']) { ?>
                            <tr>
                                <td><?php echo $rendeles['pizzanev'] ?></td>
                                <td><?php echo $rendeles['darab'] ?></td>
                                <td><?php echo $rendeles['felvetel'] ?></td>
                                <td><?php echo $rendeles['kiszallitas'] ?></td>
                            </tr>
                    <?php }
                    }
                } 
                ?>
            </tbody>
        </table>
    </form>
</main>
                    

<?php require_once __DIR__ . "/../layouts/footer.php"; ?>
