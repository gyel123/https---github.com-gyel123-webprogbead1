<div class="container mt-5">
    <h2 class="mb-4">Nemzeti parkok kezelése</h2>

    <div id="tablazat" class="mb-3">
        <button class="btn btn-primary" onclick="fetchAndDisplayRecords()">Frissítés</button>
    </div>

    <div class="mb-3">
        <h4>Új Rekord Beszúrása</h4>
        <div class="form-row">
            <div class="col-4 mb-3">
                <input type="text" id="newRecordName" class="form-control" placeholder="Név">
            </div>
            <div class="col mb-3">
                <button class="btn btn-success" onclick="insertRecord()">Beszúrás</button>
            </div>
        </div>
    </div>

    <div id="recordsTable"></div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
    function fetchAndDisplayRecords() {
        $.ajax({
            type: 'GET',
            url: "http://localhost/beadando2/includes/rest_server.inc.php/",
            success: function(data) {
                document.getElementById("recordsTable").innerHTML = data;
                attachEventHandlers();
            },
            error: function(error) {
                console.log('Hiba a kérés során:', error);
                alert('Hiba a kérés során. Ellenőrizd a konzolt a részletekért.');
            }
        });
    }

    function insertRecord() {
        var newName = $('#newRecordName').val();

        if (newName.trim() !== '') {
            $.ajax({
                url: "http://localhost/beadando2/includes/rest_server.inc.php/",
                method: 'POST',
                data: {
                    nev: newName
                },
                success: function(data) {
                    alert("Sikeres beillesztés. Azonosító: " + data);
                    fetchAndDisplayRecords();
                }
            });
        } else {
            alert('A név mező nem lehet üres!');
        }
    }

    function attachEventHandlers() {
        $('.updateButton').off('click').on('click', function() {
            var id = $(this).data('id');
            updateRecord(id);
        });

        $('.deleteButton').off('click').on('click', function() {
            var id = $(this).data('id');
            deleteRecord(id);
        });
    }

    function updateRecord(id) {
        var updatedName = prompt("Adja meg az új nevet:");

        if (updatedName !== null) {
            $.ajax({
                url: "http://localhost/beadando2/includes/rest_server.inc.php/",
                method: 'PUT',
                data: {
                    id: id,
                    nev: updatedName
                },
                success: function(data) {
                    alert("Sikeres módosítás: " + data);
                    fetchAndDisplayRecords();
                }
            });
        }
    }

    function deleteRecord(id) {
        if (confirm("Biztosan törölni szeretné ezt a rekordot?")) {
            $.ajax({
                url: "http://havasimatebead2.nhely.hu//beadando2/includes/rest_server.inc.php/",
                method: 'DELETE',
                data: {
                    id: id
                },
                success: function(data) {
                    alert("Sikeres törlés: " + data);
                    fetchAndDisplayRecords();
                }
            });
        }
    }


    $(document).ready(function() {
        fetchAndDisplayRecords();
    });
</script>