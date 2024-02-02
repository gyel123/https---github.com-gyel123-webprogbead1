<?php require_once __DIR__ . "/../layouts/header2.php"; ?>

        
<div class="container">
    <h1 class="text-center mt-4 mb-0">Deviza árfolyam megtekintés egy adott napra</h1>

    <form class="mt-4" id="center" name="tableselect" text="Tábla választás" method="POST">
        <div class="form-group">
            <label for="datepicker">Dátum:</label>
            <input type="text" class="form-control" name="datum" id="datepicker" required="required">
        </div>

        <div class="form-group">
            <label for="penznem">Az első pénznem:</label>
            <select class="form-control" id="penznem" name="penznem" required="required">
                <option value="">Válasszon Devizát!</option>
                <?= $currencies ?>
            </select>
        </div>

        <div class="form-group">
            <label for="penznem2">A második pénznem:</label>
            <select class="form-control" id="penznem2" name="penznem2" required="required">
                <option value="">Válasszon Devizát!</option>
                <?= $currencies ?>
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-outline-primary btn-lg btn-block" name="kuld">Küld</button>
        </div>
    </form>

    <?php if ($currency1 != "" && $currency2 != "" && $rdate != "" && $er == 0) : ?>
    <h3 class="mt-4 mb-0 text-center">A megadott devizák atváltási aránya a megadott napon (<?php echo $rdate; ?>):</h3>
    <h3 class="mt-3 text-center"><?php echo $currency1 . " => " . $currency2; ?></h3>
    <h4 class="mb-0 pb-4 text-center"><?php echo ($foo != 0) ? $foo : $error; ?></h4>

    <!-- Chart konténer -->
    <div class="chart-container">
        <canvas id="myChart"></canvas>
    </div>

    <script>
        // Adatok előkészítése Chart.js számára
        var data = {
            labels: ["<?php echo $currency1; ?>", "<?php echo $currency2; ?>"],
            datasets: [{
                label: 'Árfolyamok',
                data: [1, <?php echo $foo; ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 1
            }]
        };

        // Chart konfiguráció
        var config = {
            type: 'bar', // vagy 'line' a vonaldiagramhoz
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Chart létrehozása
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, config);
    </script>
    <?php endif; ?>

</div>

<script>
    $(function() {
        $("#datepicker").datepicker({
            maxDate: "<?php echo $today; ?>"
        });
    });
</script>

                    

<?php require_once __DIR__ . "/../layouts/footer2.php"; ?>
