<?php require_once __DIR__ . "/../layouts/header3.php"; ?>

        
<div class="container">
    <h1 class="text-center mt-4 mb-0">Deviza árfolyam megtekintés egy adott időszakra</h1>

    <form class="mt-4" id="center" name="tableselect" text="Tábla választás" method="POST">
        <div class="form-group">
            <label for="datepicker1">Kezdő dátum:</label>
            <input type="text" class="form-control" name="datum1" id="datepicker1" required="required">
        </div>

        <div class="form-group">
            <label for="datepicker2">Vég dátum:</label>
            <input type="text" class="form-control" name="datum2" id="datepicker2" required="required">
        </div>

        <div class="form-group">
            <label for="penznem">Az első pénznem:</label>
            <select class="form-control" id="penznem" name="penznem" required="required">
                <option value="">Válasszon devizát!</option>
                <?= $currencies ?>
            </select>
        </div>

        <div class="form-group">
            <label for="penznem2">A második pénznem:</label>
            <select class="form-control" id="penznem2" name="penznem2" required="required">
                <option value="">Válasszon devizát!</option>
                <?= $currencies ?>
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-outline-primary btn-lg btn-block" name="kuld">Küld</button>
        </div>
    </form>

    <?php if ($currency1 != "" && $currency2 != "" && $rdate1 != "" && $rdate2 != "" && $er == 0) : ?>
        <h3 class="mt-4 mb-0 text-center">A megadott devizák árfolyama a megadott időszakban:</h3>
        <h3 class="mt-3 text-center"><?= ($currency1 . " => " . $currency2) ?></h3>

        <!-- Táblázat konténer -->
        <div class="table-container">
            <?php
            if ($eredmeny->count() > 0) {
                echo '<table border="1">';
                echo '<tr>';
                echo '<th>Dátum</th>';
                foreach ($eredmeny->Day[0]->Rate as $rate) {
                    echo '<th>' . $rate->attributes()->curr->__toString() . '</th>';
                }
                echo '</tr>';
                foreach ($eredmeny->Day as $day) {
                    echo '<tr>';
                    echo '<td>' . $day->attributes()->date->__toString() . '</td>';
                    foreach ($day->Rate as $rate) {
                        echo '<td>' . $rate->__toString() . '</td>';
                    }
                    echo '</tr>';
                }
                echo '</table>';
            }
            ?>
        </div>

        <!-- Google Chart létrehozása -->
        <div id="googleChart" style="height: 300px;"></div>
    <?php endif; ?>
</div>

<script>
    $(function() {
        $("#datepicker1, #datepicker2").datepicker({
            maxDate: "<?= $today ?>"
        });
    });

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var chartData = <?= json_encode($chartData) ?>;

        if (chartData.length > 0) {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Dátum');

            <?php 
            if($eredmeny!=""){
                foreach ($eredmeny->Day[0]->Rate as $rate) : 
            ?>
                data.addColumn('number', '<?php echo $rate->attributes()->curr->__toString(); ?>');
            <?php 
                endforeach; 
            }
            ?>

            chartData.forEach(function(rowData) {
                var chartRow = [];
                chartRow.push(rowData.Dátum);

                <?php 
                if($eredmeny!=""){
                    foreach ($eredmeny->Day[0]->Rate as $rate) : 
                ?>
                    chartRow.push(rowData.hasOwnProperty('<?php echo $rate->attributes()->curr->__toString(); ?>') ? rowData['<?php echo $rate->attributes()->curr->__toString(); ?>'] : null);
                <?php 
                    endforeach; 
                }
                ?>

                data.addRow(chartRow);
            });

            var options = {
                title: '<?= ($currency1 . " => " . $currency2) ?>',
                curveType: 'function',
                legend: { position: 'bottom' }
            };

            var chart = new google.visualization.LineChart(document.getElementById('googleChart'));
            chart.draw(data, options);
        }
    }
</script>

                    

<?php require_once __DIR__ . "/../layouts/footer3.php"; ?>
